<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;

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
    public function singleStudent(){
        return view('layouts.pages.single-student');
    }
    public function documant(){
        return view('layouts.pages.documant');
    }



public function student_create(Request $request){
    // Validate the form data, including the file uploads
    $request->validate([
        'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'birth_certificate' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'nic_father' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'nic_mother' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'marriage_certificate' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'permission_letter' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'leaving_certificate' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Upload and store each document
    $profilePicturePath = $request->file('profile_picture')->store('student_documents');
    $birthCertificatePath = $request->file('birth_certificate')->store('student_documents');
    $nicFatherPath = $request->file('nic_father')->store('student_documents');
    $nicMotherPath = $request->file('nic_mother')->store('student_documents');
    $marriageCertificatePath = $request->file('marriage_certificate')->store('student_documents');
    $permissionLetterPath = $request->file('permission_letter')->store('student_documents');
    $leavingCertificatePath = $request->file('leaving_certificate')->store('student_documents');

    // Prepare data for API request
    $apiData = $request->all(); // You might need to modify this based on your API structure
    $apiData['student_documents_profile_picture_path'] = $profilePicturePath;
    $apiData['student_documents_birth_certificate'] = $birthCertificatePath;
    $apiData['student_documents_nic_father'] = $nicFatherPath;
    $apiData['student_documents_nic_mother'] = $nicMotherPath;
    $apiData['student_documents_marriage_certificate'] = $marriageCertificatePath;
    $apiData['student_documents_permission_letter'] = $permissionLetterPath;
    $apiData['student_documents_leaving_certificate'] = $leavingCertificatePath;

    // Make the API request
    $apiUrl = env('API_URL');
    
    $response = Http::post($apiUrl, $apiData);

    // Check if the request was successful
    if ($response->successful()) {
        // API request was successful
        return redirect()->back()->with('success', 'Documents uploaded successfully');
    } else {
        // API request failed
        return redirect()->back()->with('error', 'Failed to upload documents to the API');
    }
}

}
