<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\ApiService;

class CheckRoutesMiddleware
{

    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Make an API request using the ApiService
        $response = $this->apiService->makeApiRequest('GET', 'permissions');

        // Check if the API request was successful
        
        if (isset($response['status']) && $response['status'] === true) {
            return $next($request);
        } else {
            // API request failed, you can handle it here
             return response()->view('errors.401', ['exception' => new \Exception($response['message'])], 401);
        }
    }
}
