<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
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


    // Upload and store each document only if it exists
    $profilePicturePath = $request->hasFile('sd_profile_picture') ? $request->file('sd_profile_picture')->store('student_documents') : null;
    $birthCertificatePath = $request->hasFile('sd_birth_certificate') ? $request->file('sd_birth_certificate')->store('student_documents') : null;
    $nicFatherPath = $request->hasFile('sd_nic_father') ? $request->file('sd_nic_father')->store('student_documents') : null;
    $nicMotherPath = $request->hasFile('sd_nic_mother') ? $request->file('sd_nic_mother')->store('student_documents') : null;
    $marriageCertificatePath = $request->hasFile('sd_marriage_certificate') ? $request->file('sd_marriage_certificate')->store('student_documents') : null;
    $permissionLetterPath = $request->hasFile('sd_permission_letter') ? $request->file('sd_permission_letter')->store('student_documents') : null;
    $leavingCertificatePath = $request->hasFile('sd_leaving_certificate') ? $request->file('sd_leaving_certificate')->store('student_documents') : null;

    // Prepare data for API request
    $apiData = $request->all(); // You might need to modify this based on your API structure
    $apiData['sd_profile_picture'] = $profilePicturePath;
    $apiData['sd_birth_certificate'] = $birthCertificatePath;
    $apiData['sd_nic_father'] = $nicFatherPath;
    $apiData['sd_nic_mother'] = $nicMotherPath;
    $apiData['sd_marriage_certificate'] = $marriageCertificatePath;
    $apiData['sd_permission_letter'] = $permissionLetterPath;
    $apiData['sd_leaving_certificate'] = $leavingCertificatePath;

    $response = $this->apiService->makeApiRequest('POST', 'students', $apiData);
        // Make the HTTP request with the access token in the headers
      
   if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('formpage');
        } else {


            // Use SweetAlert to display a success message.
            Alert::success('Success', 'Student create successful!')->showConfirmButton('OK');

            // Redirect the user to the dashboard.
            return redirect()->route('formpage');
        }
}

}
