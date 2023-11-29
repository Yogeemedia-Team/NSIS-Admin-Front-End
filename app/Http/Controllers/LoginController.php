<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
class LoginController extends Controller
{
   
    public function userLoginForm(){
        return view('layouts.auth.login');
    }

    public function loginApi (Request $request){
        
        $email = $request->email;
        $password = $request->password;
        // Retrieve the access token from the session
        $accessToken = session()->get('token.access_token');

        // Make the HTTP request with the access token in the headers
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ])->post(env('APP_API') . '/api/login', [
            'email' => $email,
            'password' => $password
        ]);

        // Decode the response and return the result
        $result = json_decode((string) $response->getBody(), true);

if($result['status'] == false){
    return view('layouts.auth.login', ['errors' => $result['errors'], 'message' => $result['message']]);
}else{
  // Pass the access token to the view
    session(['temp_access_token' => $result['data']['access_token']]);
    return view('layouts.pages.dashboard', ['accessToken' => $result['data']['access_token']]); 
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

    public function userRegister(){

    }

    public function adminLoginForm(){
         return view('layouts.auth.admin-login');
    }


    public function adminLogin(){

    }

}
