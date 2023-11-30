<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
class LoginController extends Controller
{

    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }
   
    public function userLoginForm(){

        $response = $this->apiService->makeApiRequest('GET', 'permissions');

        if ($response['status'] === true) {

            return redirect()->route('dashboard');
         }

        return view('layouts.auth.login');
    }

  public function logOut(Request $request)
    {
    // Call makeApiRequest method to logout
    $response = $this->apiService->makeApiRequest('POST', 'logout');
    if ($response['status'] === true) {
        // Logout was successful, clear the session
        session()->forget('api_access_token');
        return view('layouts.auth.login', ['message' => $response['message']]);
    }
}




        public function loginApi (Request $request){
        
        // Call makeApiRequest method with email and password as params
        $response = $this->apiService->makeApiRequest('POST', 'login', [
            'email' => $request->email,
            'password' => $request->password,
            // Add other parameters as needed
        ]);
        
      if ($response['status'] === false) {
        
        return view('layouts.auth.login', ['errors' => $response['errors'], 'message' => $response['message']]);
    } else {
        // Store the access token in the session
        Cache::put('api_access_token', $response['data']['access_token'], now()->addMinutes(60));
        return redirect()->route('dashboard');
    }


    }

   
    public function getPermission(Request $request){
        $email = $request->email;
        $password = $request->password;
        // Retrieve the access token from the session
        $accessToken = session()->get('token.access_token');

        // Make the HTTP request with the access token in the headers
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->get(env('APP_API') . '/api/permissions');

        // Decode the response and return the result
        $result = json_decode((string) $response->getBody(), true);

    // Pass the access token to the view
        return view('layouts.pages.dashboard', ['accessToken' => $result['data']['access_token']]);
    }

    public function userRegisterForm(){
        return view('layouts.auth.register');
    }

    public function userRegister(Request $request){
        $clientSecret = Str::random(40);
         $response = $this->apiService->makeApiRequest('POST', 'register', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'user_type'=> $request->password,
            'client_secret' => $clientSecret,
            // Add other parameters as needed
            ]);
            
        if ($response['status'] === false) {
            
            return view('layouts.auth.register', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {
            // Store the access token in the session
            $user = User::create([ 'client_secret' => $clientSecret]);
            return view('layouts.auth.register', ['message' => $response['message']]);;
        }
    }

    public function adminLoginForm(){
         return view('layouts.auth.admin-login');
    }


    public function adminLogin(){

    }

}
