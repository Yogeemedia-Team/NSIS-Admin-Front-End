<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
class HomeController extends Controller
{

    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function getPermission()
    {
        // Make an API request using the ApiService
        $response = $this->apiService->makeApiRequest('GET', 'permissions');
        return response()->json($response);
    }

    public function dashboard(){
        return view('layouts.pages.dashboard');
    }
    public function formpage(){
        return view('layouts.pages.formpage');
    }
    public function students(){
        return view('layouts.pages.students');
    }
}
