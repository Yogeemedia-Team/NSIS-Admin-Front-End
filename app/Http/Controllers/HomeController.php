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

    public function dashboard()
    {
        return view('layouts.pages.dashboard');
    }
    public function formpage()
    {
        return view('layouts.pages.formpage');
    }

    public function students(Request $request)
    {
        $response = $this->apiService->makeApiRequest('GET', 'students');

        if ($response['status'] === false) {

            return view('layouts.pages.students', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $studentDetails = $response['data'];
            return view('layouts.pages.students', compact('studentDetails'));
        }
    }



    public function singleStudent($id)
    {
        // Make API request to fetch details for the specified student ID
        $endpoint = 'students/' . $id;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $studentDetails = $response;

        // Pass the student details to the view
        return view('layouts.pages.single-student', compact('studentDetails'));
    }

    public function documant()
    {
        return view('layouts.pages.documant');
    }

    public function studentDelete($id)
    {
        $endpoint = 'students/' . $id;
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);
        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }
        // Pass the student details to the view
        return redirect()->route('students');
    }


    public function student_create(Request $request)
    {
        // Validate the form data, including the file uploads


        // Upload and store each document only if it exists
        $profilePicturePath = $request->hasFile('sd_profile_picture') ? $request->file('sd_profile_picture')->store('student_documents', 'public') : null;
        $birthCertificatePath = $request->hasFile('sd_birth_certificate') ? $request->file('sd_birth_certificate')->store('student_documents', 'public') : null;
        $nicFatherPath = $request->hasFile('sd_nic_father') ? $request->file('sd_nic_father')->store('student_documents', 'public') : null;
        $nicMotherPath = $request->hasFile('sd_nic_mother') ? $request->file('sd_nic_mother')->store('student_documents', 'public') : null;
        $marriageCertificatePath = $request->hasFile('sd_marriage_certificate') ? $request->file('sd_marriage_certificate')->store('student_documents', 'public') : null;
        $permissionLetterPath = $request->hasFile('sd_permission_letter') ? $request->file('sd_permission_letter')->store('student_documents', 'public') : null;
        $leavingCertificatePath = $request->hasFile('sd_leaving_certificate') ? $request->file('sd_leaving_certificate')->store('student_documents', 'public') : null;

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
            return redirect()->route('students');
        } else {


            // Use SweetAlert to display a success message.
            Alert::success('Success', 'Student create successful!')->showConfirmButton('OK');

            // Redirect the user to the dashboard.
            return redirect()->route('students');
        }
    }


    public function StudentEdit($id)
    {
        $endpoint = 'students/' . $id;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $studentDetails = $response;

        // Pass the student details to the view
        return view('layouts.pages.edit-student', compact('studentDetails'));
    }

    public function student_update(Request $request, $studentId)
    {
        // Validate the form data, including the file uploads

        // Fetch existing student data from the API
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'students/' . $studentId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('students');
        }

        $profilePicturePath = $request->hasFile('sd_profile_picture') ? $request->file('sd_profile_picture')->store('student_documents', 'public') : $existingStudentData['data']['documents'][0]['sd_profile_picture'];
        $birthCertificatePath = $request->hasFile('sd_birth_certificate') ? $request->file('sd_birth_certificate')->store('student_documents', 'public') : $existingStudentData['data']['documents'][0]['sd_birth_certificate'];
        $nicFatherPath = $request->hasFile('sd_nic_father') ? $request->file('sd_nic_father')->store('student_documents', 'public') : $existingStudentData['data']['documents'][0]['sd_nic_father'];
        $nicMotherPath = $request->hasFile('sd_nic_mother') ? $request->file('sd_nic_mother')->store('student_documents', 'public') : $existingStudentData['data']['documents'][0]['sd_nic_mother'];
        $marriageCertificatePath = $request->hasFile('sd_marriage_certificate') ? $request->file('sd_marriage_certificate')->store('student_documents', 'public') : $existingStudentData['data']['documents'][0]['sd_marriage_certificate'];
        $permissionLetterPath = $request->hasFile('sd_permission_letter') ? $request->file('sd_permission_letter')->store('student_documents', 'public') : $existingStudentData['data']['documents'][0]['sd_permission_letter'];
        $leavingCertificatePath = $request->hasFile('sd_leaving_certificate') ? $request->file('sd_leaving_certificate')->store('student_documents', 'public') : $existingStudentData['data']['documents'][0]['sd_leaving_certificate'];

        // Update the data with the new values
        $updatedData = $request->all(); // You might need to modify this based on your form fields
        $updatedData['data']['documents'][0]['sd_profile_picture'] = $profilePicturePath;
        $updatedData['data']['documents'][0]['sd_birth_certificate'] = $birthCertificatePath;
        $updatedData['data']['documents'][0]['sd_nic_father'] = $nicFatherPath;
        $updatedData['data']['documents'][0]['sd_nic_mother'] = $nicMotherPath;
        $updatedData['data']['documents'][0]['sd_marriage_certificate'] = $marriageCertificatePath;
        $updatedData['data']['documents'][0]['sd_permission_letter'] = $permissionLetterPath;
        $updatedData['data']['documents'][0]['sd_leaving_certificate'] = $leavingCertificatePath;



        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'students/' . $studentId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('students');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Student update successful!')->showConfirmButton('OK');
            return redirect()->route('students');
        }
    }

    // Grades Controllers Here
    public function grades()
    {
        return view('layouts.pages.grades');
    }
    public function addGrade()
    {
        return view('layouts.pages.addgrade');
    }
}
