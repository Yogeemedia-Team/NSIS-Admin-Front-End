<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class ApiService
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = config('services.api.url');
    }

    public function getAccessToken()
    {
        // Check if the access token is already in the cache
        if ($token = Cache::get('api_access_token')) {
            return $token;
        }else{
            $token = null;
            return $token;
        }

    }


    


    public function makeApiRequest($method, $endpoint, $params = [])
    {

        $client = new Client();
         try {
            $response = $client->request($method, $this->apiUrl.'/'.$endpoint, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->getAccessToken(),
                ],
                'form_params' => $params,
                //'allow_redirects' => false, // Disable automatic redirects
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            
            return [
                'status' => false,
                'errors' => [],
                'message' => 'Failed to communicate with the API.',
            ];
        }
    }


    public function makeApiRequestJson($method, $endpoint, $params = [])
    {
        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Bearer ' . $this->getAccessToken(),
        ];
        $body = json_encode($params);

        try {
            $response = $client->request($method, $this->apiUrl . '/' . $endpoint, [
                'headers' => $headers,
                'body' => $body,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'status' => false,
                'errors' => [],
                'message' => $e->getMessage(),
            ];
        }
    }




}   