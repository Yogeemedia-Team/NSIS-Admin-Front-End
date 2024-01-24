<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

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
        $response_year = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        $year_grades = $response_year['data'];

        // Pass the student details to the view
        return view('layouts.pages.formpage', compact('year_grades'));
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
        $response_year = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        $year_grades = $response_year['data'];

        // Pass the student details to the view
        return view('layouts.pages.edit-student', compact('studentDetails', 'year_grades'));
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

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Grades Controllers Here
    public function grades()
    {
        $response = $this->apiService->makeApiRequest('GET', 'grade');

        if ($response['status'] === false) {

            return view('layouts.pages.grade.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $grades = $response['data'];
            return view('layouts.pages.grade.index', compact('grades'));
        }
    }

    public function addGrade()
    {
        return view('layouts.pages.grade.create');
    }

    public function createGrade(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $apiData['organization_id'] = env('ORGANIZATION_ID');

        $response = $this->apiService->makeApiRequest('POST', 'grade', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('grades');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'Grade create successful!')->showConfirmButton('OK');

            // Redirect the user to the grades.
            return redirect()->route('grades');
        }
    }

    public function editGrade($id)
    {
        $endpoint = 'grade/' . $id;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $grade = $response;

        // Pass the student details to the view
        return view('layouts.pages.grade.edit', compact('grade'));
    }

    public function updateGrade(Request $request, $gradeId)
    {
        // Validate the form data, including the file uploads

        // Fetch existing student data from the API
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'grade/' . $gradeId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('grades');
        }

        // Update the data with the new values
        $updatedData = $request->all(); // You might need to modify this based on your form fields
        $updatedData['organization_id'] = env('ORGANIZATION_ID');
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'grade/' . $gradeId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('grades');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Grade update successful!')->showConfirmButton('OK');
            return redirect()->route('grades');
        }
    }

    public function deleteGrade($id)
    {
        // Endpoint to delete a grade by ID
        $endpoint = 'grade/' . $id;

        // Make the API request to delete the grade
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'Grade deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect back to the grades page
        return redirect()->route('grades');
    }


    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    // Class Controllers Here
    public function classes()
    {
        $response = $this->apiService->makeApiRequest('GET', 'class');

        if ($response['status'] === false) {

            return view('layouts.pages.class.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $classes = $response['data'];
            return view('layouts.pages.class.index', compact('classes'));
        }
    }

    public function addClass()
    {
        return view('layouts.pages.class.create');
    }

    public function createClass(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $apiData['organization_id'] = env('ORGANIZATION_ID');

        $response = $this->apiService->makeApiRequest('POST', 'class', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('classes');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'Class create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('classes');
        }
    }

    public function editClass($id)
    {
        $endpoint = 'class/' . $id;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $class = $response;

        // Pass the student details to the view
        return view('layouts.pages.class.edit', compact('class'));
    }

    public function updateClass(Request $request, $classId)
    {
        // Validate the form data, including the file uploads

        // Fetch existing student data from the API
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'class/' . $classId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('classes');
        }

        // Update the data with the new values
        $updatedData = $request->all(); // You might need to modify this based on your form fields
        $updatedData['organization_id'] = env('ORGANIZATION_ID');
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'class/' . $classId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('classes');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Class update successful!')->showConfirmButton('OK');
            return redirect()->route('classes');
        }
    }

    public function deleteClass($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'class/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'Class deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect
        return redirect()->route('classes');
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // Extracurriculars Controllers Here
    public function extracurriculars()
    {
        $response = $this->apiService->makeApiRequest('GET', 'extra_curricular');

        if ($response['status'] === false) {

            return view('layouts.pages.extracurriculars.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $extracurriculars = $response['data'];
            return view('layouts.pages.extracurriculars.index', compact('extracurriculars'));
        }
    }

    public function addExtracurricular()
    {
        return view('layouts.pages.extracurriculars.create');
    }

    public function createExtracurricular(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $apiData['organization_id'] = env('ORGANIZATION_ID');

        $response = $this->apiService->makeApiRequest('POST', 'extra_curricular', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('extracurriculars');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'Extra curricular create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('extracurricular');
        }
    }

    public function editExtracurricular($id)
    {
        $endpoint = 'extracurricular/' . $id;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $extracurricular = $response;

        // Pass the student details to the view
        return view('layouts.pages.extracurriculars.edit', compact('extracurricular'));
    }

    public function updateExtracurricular(Request $request, $classId)
    {
        // Validate the form data, including the file uploads

        // Fetch existing student data from the API
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'class/' . $classId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('extracurricular');
        }

        // Update the data with the new values
        $updatedData = $request->all(); // You might need to modify this based on your form fields
        $updatedData['organization_id'] = env('ORGANIZATION_ID');
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'class/' . $classId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('extracurricular');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Extracurricular update successful!')->showConfirmButton('OK');
            return redirect()->route('extracurricular');
        }
    }

    public function deleteExtracurricular($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'extracurricular/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'Extra curricular deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect
        return redirect()->route('extracurricular');
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////    

    // year_grade_class  Controllers Here
    public function YearGradeClass()
    {
        $response = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        if ($response['status'] === false) {

            return view('layouts.pages.year_grade_class.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $yeargradeclasses = $response['data'];
            return view('layouts.pages.year_grade_class.index', compact('yeargradeclasses'));
        }
    }

    public function addYearGradeClass()
    {
        $response_class = $this->apiService->makeApiRequest('GET', 'class');
        $response_grade = $this->apiService->makeApiRequest('GET', 'grade');
        $classes = $response_class['data'];
        $grades = $response_grade['data'];

        return view('layouts.pages.year_grade_class.create', compact('classes', 'grades'));
    }

    public function createYearGradeClass(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $apiData['organization_id'] = env('ORGANIZATION_ID');

        $response = $this->apiService->makeApiRequest('POST', 'year_grade_class', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('year_grade_class');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'Year grade class relation create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('year_grade_class');
        }
    }

    public function editYearGradeClass($id)
    {
        $endpoint = 'year_grade_class/' . $id;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $yeargradeclasses = $response;
        $response_class = $this->apiService->makeApiRequest('GET', 'class');
        $response_grade = $this->apiService->makeApiRequest('GET', 'grade');
        $classes = $response_class['data'];
        $grades = $response_grade['data'];

        // Pass the student details to the view
        return view('layouts.pages.year_grade_class.edit', compact('yeargradeclasses', 'classes', 'grades'));
    }

    public function updateYearGradeClass(Request $request, $classId)
    {
        // Validate the form data, including the file uploads

        // Fetch existing student data from the API
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'year_grade_class/' . $classId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('year_grade_class');
        }

        // Update the data with the new values
        $updatedData = $request->all(); // You might need to modify this based on your form fields
        $updatedData['organization_id'] = env('ORGANIZATION_ID');
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'year_grade_class/' . $classId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('year_grade_class');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Year Grade Class update successful!')->showConfirmButton('OK');
            return redirect()->route('year_grade_class');
        }
    }
    public function deleteYearGradeClass($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'year_grade_class/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'Year Grade Class deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect
        return redirect()->route('year_grade_class');
    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    // User Accounts Controllers Here
    public function userAccounts()
    {
        $response = $this->apiService->makeApiRequest('GET', 'users');

        if ($response['status'] === false) {

            return view('layouts.pages.user.accounts.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $users = $response['data'];
            return view('layouts.pages.user.accounts.index', compact('users'));
        }
    }
    public function addUserAccount()
    {
        $response = $this->apiService->makeApiRequest('GET', 'user_roles');
        $roles = $response['data'];
        return view('layouts.pages.user.accounts.create', compact('roles'));
    }

    public function createUserAccount(Request $request)
    {
        $clientSecret = Str::random(40);
        $response = $this->apiService->makeApiRequest('POST', 'user', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
            'user_type' => $request->user_type,
            'client_secret' => $clientSecret,
            // Add other parameters as needed
        ]);

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('user_accounts');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'User create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('user_accounts');
        }
    }

    public function editUserAccount($id)
    {
        $endpoint = 'users/' . $id;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);
        $response_role = $this->apiService->makeApiRequest('GET', 'user_roles');
        $roles = $response_role['data'];
        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $user = $response;
        return view('layouts.pages.user.accounts.edit', compact('user', 'roles'));
    }

    public function updateUserAccount(Request $request, $userId)
    {
        // Fetch existing student data from the API
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'users/' . $userId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('user_accounts');
        }

        $updatedData = $request->all(); // You might need to modify this based on your form fields
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'users/' . $userId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('user_accounts');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Extracurricular update successful!')->showConfirmButton('OK');
            return redirect()->route('user_accounts');
        }
    }

    public function deleteUserAccount($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'users/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'User deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect
        return redirect()->route('user_accounts');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    // User Activities Controllers Here
    public function userActivities()
    {
        $response = $this->apiService->makeApiRequest('GET', 'user_activities');

        if ($response['status'] === false) {

            return view('layouts.pages.user.activities.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $user_activities = $response['data'];
            return view('layouts.pages.user.activities.index', compact('user_activities'));
        }
    }

    public function addUserActivity()
    {
        return view('layouts.pages.user.activities.create');
    }

    public function createUserActivity(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $response = $this->apiService->makeApiRequest('POST', 'user_activities', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('user_activities');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'User level create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('user_activities');
        }
    }

    public function editUserActivity($user_activityId)
    {
        // Fetch user activity with $user_activityId and pass it to the view for editing
        $endpoint = 'user_activities/' . $user_activityId;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $user_activity = $response;
        return view('layouts.pages.user.activities.edit', compact('user_activity'));
    }

    public function updateUserActivity(Request $request, $user_activityId)
    {
        // Update user activity with $user_activityId
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'user_activities/' . $user_activityId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('user_activities');
        }

        $updatedData = $request->all(); // You might need to modify this based on your form fields
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'user_activities/' . $user_activityId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('user_activities');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'User role update successful!')->showConfirmButton('OK');
            return redirect()->route('user_activities');
        }
    }
    public function deleteUserActivity($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'user_activities/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'User activity deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect
        return redirect()->route('user_activities');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
    // User Assigning Controllers Here
    public function userAssigning()
    {
        return view('layouts.pages.user.assigning.index');
    }
    public function addUserAssigning()
    {
        return view('layouts.pages.user.assigning.create');
    }
    public function createUserAssigning()
    {
    }
    public function editUserAssigning($user_assigningId)
    {
        // Fetch user assigning with $user_assigningId and pass it to the view for editing
    }
    public function updateUserAssigning($user_assigningId)
    {
        // Update user assigning with $user_assigningId
    }
    public function deleteUserAssigning($id)
    {
    }


    // User Levels Controllers Here
    public function userLevels()
    {
        $response = $this->apiService->makeApiRequest('GET', 'user_levels');

        if ($response['status'] === false) {

            return view('layouts.pages.user.levels.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $userlevels = $response['data'];
            return view('layouts.pages.user.levels.index', compact('userlevels'));
        }
    }
    public function addUserLevel()
    {
        return view('layouts.pages.user.levels.create');
    }

    public function createUserLevel(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $response = $this->apiService->makeApiRequest('POST', 'user_levels', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('user_levels');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'User level create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('user_levels');
        }
    }

    public function editUserLevel($user_levelId)
    {
        // Fetch user level with $user_levelId and pass it to the view for editing
        $endpoint = 'user_levels/' . $user_levelId;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $user_level = $response;
        return view('layouts.pages.user.levels.edit', compact('user_level'));
    }
    public function updateUserLevel(Request $request, $user_levelId)
    {
        // Update user level with $user_levelId
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'user_levels/' . $user_levelId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('user_levels');
        }

        $updatedData = $request->all(); // You might need to modify this based on your form fields
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'user_levels/' . $user_levelId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('user_levels');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Extracurricular update successful!')->showConfirmButton('OK');
            return redirect()->route('user_levels');
        }
    }
    public function deleteUserLevel($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'user_levels/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'User level deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect
        return redirect()->route('user_levels');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    // User Roles Controllers Here
    public function userRoles()
    {
        $response = $this->apiService->makeApiRequest('GET', 'user_roles');

        if ($response['status'] === false) {

            return view('layouts.pages.user.roles.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $user_roles = $response['data'];
            return view('layouts.pages.user.roles.index', compact('user_roles'));
        }

        return view('layouts.pages.user.roles.index');
    }
    public function addUserRole()
    {
        return view('layouts.pages.user.roles.create');
    }
    public function createUserRole(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $response = $this->apiService->makeApiRequest('POST', 'user_roles', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('user_roles');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'User role create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('user_roles');
        }
    }

    public function editUserRole($user_roleId)
    {
        // Fetch user role with $user_roleId and pass it to the view for editing

        $endpoint = 'user_roles/' . $user_roleId;
        $response = $this->apiService->makeApiRequest('GET', $endpoint);

        // Check if the API request was successful
        if ($response['status'] === false) {
            // Handle error (you might want to redirect or show an error page)
            return redirect()->route('error')->with('message', $response['message']);
        }

        // Extract student details from the response
        $user_role = $response;
        return view('layouts.pages.user.roles.edit', compact('user_role'));
    }

    public function updateUserRole(Request $request, $user_roleId)
    {
        // Update user role with $user_roleId
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'user_roles/' . $user_roleId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('user_roles');
        }

        $updatedData = $request->all(); // You might need to modify this based on your form fields
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'user_roles/' . $user_roleId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('user_roles');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'User role update successful!')->showConfirmButton('OK');
            return redirect()->route('user_roles');
        }
    }
    public function deleteUserRole($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'user_roles/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'User role deleted successfully!')->showConfirmButton('OK');
        }

        // Redirect
        return redirect()->route('user_roles');
    }
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

    // Enrollments Controllers Here
    public function enrollments()
    {
        return view('layouts.pages.enrollments.index');
    }
    public function addEnrollment()
    {
        return view('layouts.pages.enrollments.create');
    }
    public function createEnrollment()
    {
    }
    public function viewEnrollment()
    {
        return view('layouts.pages.enrollments.single_enrollment');
    }
    public function editEnrollment($enrollmentId)
    {
        // Fetch enrollment with $enrollmentId and pass it to the view for editing
    }
    public function updateEnrollment($enrollmentId)
    {
        // Update enrollment with $enrollmentId
    }
    public function deleteEnrollment($enrollmentId)
    {
        // Delete enrollment with $enrollmentId
    }


    // Admission Fee Controllers Here
    public function admissionFee()
    {
        return view('layouts.pages.student_fee.admission.index');
    }
    public function addAdmissionFee()
    {
        return view('layouts.pages.student_fee.admission.create');
    }
    public function deleteAdmissionFee($enrollmentId)
    {
        // Delete enrollment with $enrollmentId
    }

    // Monthly Fee Controllers Here
    public function monthlyFee()
    {
        return view('layouts.pages.student_fee.monthly.index');
    }
    public function addMonthlyFee()
    {
        return view('layouts.pages.student_fee.monthly.create');
    }
    public function deleteMonthlyFee($enrollmentId)
    {
        // Delete enrollment with $enrollmentId
    }

    // Surcharge Formula Controllers Here
    public function surchargeFormula()
    {
        return view('layouts.pages.student_fee.surcharge_formula.index');
    }
    public function addSurchargeFormula()
    {
        return view('layouts.pages.student_fee.surcharge_formula.create');
    }
    public function deleteSurchargeFormula($enrollmentId)
    {
        // Delete enrollment with $enrollmentId
    }

    // Student Payments Controllers Here
    public function studentPayments()
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();
        return view('layouts.pages.student.transaction.payment.index',compact('token'));
    }
    public function addStudentPayment()
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();
        return view('layouts.pages.student.transaction.payment.create',compact('token'));
    }
}
