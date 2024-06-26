<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ApiService;
use Illuminate\Support\Facades\Http;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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



        $apiData = [
            'sd_year_grade_class_id' => $request->get('sd_year_grade_class_id') ?? '',
            'admission_id' => $request->get('admission_id') ?? '',
        ];



        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');
        if ($classResponse['status'] === false) {

            return view('layouts.pages.students', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }

        $response = $this->apiService->makeApiRequest('GET', 'students');

        if ($response['status'] === false) {

            return view('layouts.pages.students', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $studentDetails = $response['data'];
            $year_grades = $classResponse['data'];
            return view('layouts.pages.students', compact('studentDetails', 'year_grades', 'apiData'));
        }
    }

    public function studentsSearch(Request $request)
    {

        $apiData = [
            'sd_year_grade_class_id' => $request->get('sd_year_grade_class_id') ?? '',
            'admission_id' => $request->get('admission_id') ?? '',
        ];

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');
        if ($classResponse['status'] === false) {

            return view('layouts.pages.students', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }

        $response = $this->apiService->makeApiRequest('POST', 'search-student', $apiData);

        if ($response['status'] === false) {

            return view('layouts.pages.students', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $studentDetails = $response['data'];
            $year_grades = $classResponse['data'];
            return view('layouts.pages.students', compact('studentDetails', 'year_grades', 'apiData'));
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
        // Endpoint to delete by ID
        $endpoint = 'students/' . $id;

        // Make the API request to delete
        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            // If the deletion fails, display an error message
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            // If the deletion is successful, display a success message
            Alert::success('Success', 'Student deleted successfully!')->showConfirmButton('OK');
        }

        // If the deletion is successful, redirect to the 'students' route
        return redirect()->route('students');
    }



    public function student_create(Request $request)
    {
        // Validate the form data, including the file uploads


        if ($request->filled('croppedImage')) {
            // Get the cropped image data
            $croppedImageData = $request->input('croppedImage');
            // Decode the base64 string to get the binary image data
            $croppedImageBinary = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData));

            // Create a temporary file to store the decoded image data
            $tempFileName = 'cropped_image_' . time() . '.png';
            $tempFilePath = storage_path('app/temp/' . $tempFileName);


            file_put_contents($tempFilePath, $croppedImageBinary);

            // Create an UploadedFile instance from the temporary file
            $uploadedFile = new UploadedFile(
                $tempFilePath,
                $tempFileName,
                mime_content_type($tempFilePath),
                null,
                true
            );

            $profilePicturePath = $uploadedFile->store('cropped_images', 'public');

            // Optionally, delete the temporary file
            unlink($tempFilePath);
        } else {
            $profilePicturePath = $request->hasFile('sd_profile_picture') ? $request->file('sd_profile_picture')->store('student_documents', 'public') : null;
        }





        // Upload and store each document only if it exists
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

            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            if ($response['errors'] == "validation_error") { // You can pass the response data to the view to display errors
                return redirect()->back()
                    ->withErrors($response['message'])
                    ->withInput();
            }

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

        $response_year = $this->apiService->makeApiRequest('GET', 'year_grade_class');
        $response_extra_curricular = $this->apiService->makeApiRequest('GET', 'extra_curricular');

        // extra_curricular

        $year_grades = $response_year['data'];
        $year_grades = $response_year['data'];
        $extra_curricular = $response_extra_curricular['data'];

        // dd($studentDetails);
        // Pass the student details to the view
        return view('layouts.pages.edit-student', compact('studentDetails', 'year_grades', 'extra_curricular'));
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
        if ($request->hasFile('sd_profile_picture')) {
            if ($request->filled('croppedImage')) {
                // Get the cropped image data
                $croppedImageData = $request->input('croppedImage');
                // Decode the base64 string to get the binary image data
                $croppedImageBinary = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $croppedImageData));

                // Create a temporary file to store the decoded image data
                $tempFileName = 'cropped_image_' . time() . '.png';
                $tempFilePath = storage_path('app/temp/' . $tempFileName);


                file_put_contents($tempFilePath, $croppedImageBinary);

                // Create an UploadedFile instance from the temporary file
                $uploadedFile = new UploadedFile(
                    $tempFilePath,
                    $tempFileName,
                    mime_content_type($tempFilePath),
                    null,
                    true
                );

                $profilePicturePath = $uploadedFile->store('cropped_images', 'public');

                // Optionally, delete the temporary file
                unlink($tempFilePath);
            } else {
                $profilePicturePath = $request->hasFile('sd_profile_picture') ? $request->file('sd_profile_picture')->store('student_documents', 'public') : ''; // empty string instead of null
            }
        } else {
            $profilePicturePath = $existingStudentData['data']['documents'][0]['sd_profile_picture'] ?? ''; // null coalescing operator to prevent possible null exception
        }



        $birthCertificatePath = $request->hasFile('sd_birth_certificate') ? $request->file('sd_birth_certificate')->store('student_documents', 'public') : ($existingStudentData['data']['documents'][0]['sd_birth_certificate'] ?? '');
        $nicFatherPath = $request->hasFile('sd_nic_father') ? $request->file('sd_nic_father')->store('student_documents', 'public') : ($existingStudentData['data']['documents'][0]['sd_nic_father'] ?? '');
        $nicMotherPath = $request->hasFile('sd_nic_mother') ? $request->file('sd_nic_mother')->store('student_documents', 'public') : ($existingStudentData['data']['documents'][0]['sd_nic_mother'] ?? '');
        $marriageCertificatePath = $request->hasFile('sd_marriage_certificate') ? $request->file('sd_marriage_certificate')->store('student_documents', 'public') : ($existingStudentData['data']['documents'][0]['sd_marriage_certificate'] ?? '');
        $permissionLetterPath = $request->hasFile('sd_permission_letter') ? $request->file('sd_permission_letter')->store('student_documents', 'public') : ($existingStudentData['data']['documents'][0]['sd_permission_letter'] ?? '');
        $leavingCertificatePath = $request->hasFile('sd_leaving_certificate') ? $request->file('sd_leaving_certificate')->store('student_documents', 'public') : ($existingStudentData['data']['documents'][0]['sd_leaving_certificate'] ?? '');

        // Update the data with the new values
        $updatedData = $request->all(); // You might need to modify this based on your form fields
        $updatedData['sd_profile_picture'] = $profilePicturePath ?: '';
        $updatedData['sd_birth_certificate'] = $birthCertificatePath ?: '';
        $updatedData['sd_nic_father'] = $nicFatherPath ?: '';
        $updatedData['sd_nic_mother'] = $nicMotherPath ?: '';
        $updatedData['sd_marriage_certificate'] = $marriageCertificatePath ?: '';
        $updatedData['sd_permission_letter'] = $permissionLetterPath ?: '';
        $updatedData['sd_leaving_certificate'] = $leavingCertificatePath ?: '';



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

    // student upgrade to next year
    public function studentUpgradeUI(Request $request)
    {
        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');
        if ($classResponse['status'] === false) {
            return view('layouts.pages.student.upgrade.upgrade', ['errors' => $classResponse['errors'], 'message' => $classResponse['message']]);
        }
        $year_grades = $classResponse['data'];
        return view('layouts.pages.student.upgrade.upgrade', compact('year_grades',));
    }
    public function studentUpgradeUISearch(Request $request)
    {
        $apiData = [
            'sd_year_grade_class_id' =>  $request->sd_year_grade_class_id ?? '',
        ];

        $response = $this->apiService->makeApiRequest('POST', 'search-student', $apiData);

        if ($response['status'] === false) {
        } else {

            $studentDetails = $response['data'];
            return response()->json(['status' => 200, 'data' => $studentDetails]);
        }
    }

    public function studentUpgradeForme(Request $request)
    {

        $data = $request;

        // Extracting relevant data
        $promoted_sd_year_grade_class_id = $data['promote_sd_year_grade_class_id'];

        $studentData = collect($data)
            ->filter(function ($value, $key) {
                return strpos($key, 'student_id_') !== false;
            })
            ->map(function ($studentId, $key) use ($data) {
                $studentKey = str_replace('student_id_', '', $key);
                $monthlyFeeKey = 'default_monthly_fee_' . $studentKey;
                return [
                    'student_id' => $studentId,
                    'monthly_fee' => $data[$monthlyFeeKey]
                ];
            })
            ->values()
            ->toArray();

        // Constructing final result
        $result = [
            'prev_sd_year_grade_class_id' => $data['prev_sd_year_grade_class_id'],
            'promoted_sd_year_grade_class_id' => $promoted_sd_year_grade_class_id,
            'student_data' => $studentData
        ];



        $response =  $this->apiService->makeApiRequestJson('POST', 'promote', $result);

        if ($response['status'] === false) {
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
        } else {
            Alert::success('Success', 'Student promote successful!')->showConfirmButton('OK');
        }

        return redirect('/student_promotion')->withInput();
    }

    public function getYearGradeClass(Request $request)
    {
        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        if ($classResponse['status'] === false) {
            return response()->json(['status' => 500, 'errors' => $classResponse['errors'], 'message' => $classResponse['message']]);
        }

        $year_grades = $classResponse['data'];
        return response()->json(['status' => 200, 'data' => $year_grades]);
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
            return redirect()->route('extracurriculars');
        }
    }

    public function editExtracurricular($id)
    {
        $endpoint = 'extra_curricular/' . $id;
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
        $existingStudentData = $this->apiService->makeApiRequest('GET', 'extra_curricular/' . $classId);

        if ($existingStudentData['status'] === false) {
            // Handle error if the student data cannot be fetched
            Alert::error('Error', $existingStudentData['message'])->showConfirmButton('OK');
            return redirect()->route('extracurriculars');
        }

        // Update the data with the new values
        $updatedData = $request->all(); // You might need to modify this based on your form fields
        $updatedData['organization_id'] = env('ORGANIZATION_ID');
        // Make the API request to update the student record
        $response = $this->apiService->makeApiRequest('PUT', 'extra_curricular/' . $classId, $updatedData);

        if ($response['status'] === false) {
            // If the update request fails, display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');
            return redirect()->route('extracurriculars');
        } else {
            // If the update is successful, display a success message.
            Alert::success('Success', 'Extracurricular update successful!')->showConfirmButton('OK');
            return redirect()->route('extracurriculars');
        }
    }

    public function deleteExtracurricular($id)
    {
        // Endpoint to delete by ID
        $endpoint = 'extra_curricular/' . $id;

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
        return redirect()->route('extracurriculars');
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
        $response = $this->apiService->makeApiRequest('GET', 'user_assignees');

        if ($response['status'] === false) {

            return view('layouts.pages.user.assigning.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $user_assigning = $response['data'];
            return view('layouts.pages.user.assigning.index', compact('user_assigning'));
        }
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
    public function createEnrollment(Request $request)
    {
        $apiData = $request->all(); // You might need to modify this based on your API structure
        $response = $this->apiService->makeApiRequest('POST', 'enrollments', $apiData);
        // Make the HTTP request with the access token in the headers

        if ($response['status'] === false) {
            // If the status in the response is false, there's an error.

            // Use SweetAlert to display an error message.
            Alert::error('Error', $response['message'])->showConfirmButton('OK');

            // Redirect back to the login page.
            return redirect()->route('enrollments');
        } else {
            // Use SweetAlert to display a success message.
            Alert::success('Success', 'User enrollment create successful!')->showConfirmButton('OK');

            // Redirect the user to the classes.
            return redirect()->route('enrollments');
        }
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
        $response = $this->apiService->makeApiRequest('GET', 'user_levels');

        if ($response['status'] === false) {

            return view('layouts.pages.student_fee.admission.index', ['errors' => $response['errors'], 'message' => $response['message']]);
        } else {

            $userlevels = $response['data'];
            return view('layouts.pages.student_fee.admission.index', compact('userlevels'));
        }
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
    public function studentPayments(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = [
            'sd_year_grade_class_id' => '',
            'admission_id' => '',
            'from_date' => '',
            'date' => ''
        ];

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        $allPaymentsResponse = $this->apiService->makeApiRequest('POST', 'all_user_payments', $apiData);


        if ($classResponse['status'] === false) {

            return view('layouts.pages.student.transaction.payment.index', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }
        if ($allPaymentsResponse['status'] === false) {

            return view('layouts.pages.student.transaction.payment.index', ['errors' => $allPaymentsResponse['errors'], 'message' => $allPaymentsResponse['message'], 'apiData' => $apiData]);
        }

        $year_grades = $classResponse['data'];
        $allPayments = $allPaymentsResponse['data'];

        return view('layouts.pages.student.transaction.payment.index', compact('token', 'year_grades', 'allPayments', 'apiData'));
    }

    public function searchStudentPayments(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = $request->all();

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        $allPaymentsResponse = $this->apiService->makeApiRequest('POST', 'all_user_payments', $apiData);

        if ($classResponse['status'] === false) {

            return view('layouts.pages.student.transaction.payment.index', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }
        if ($allPaymentsResponse['status'] === false) {

            return view('layouts.pages.student.transaction.payment.index', ['errors' => $allPaymentsResponse['errors'], 'message' => $allPaymentsResponse['message'], 'apiData' => $apiData]);
        }
        $year_grades = $classResponse['data'];
        $allPayments = $allPaymentsResponse['data'];

        return view('layouts.pages.student.transaction.payment.index', compact('token', 'year_grades', 'allPayments', 'apiData'));
    }

    public function addStudentPayment()
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();
        $apiData = [
            'admission_id' => '',
            'payment_date' => '',
            'payment_amount' => '',
            'payment_term' => ''
        ];
        return view('layouts.pages.student.transaction.payment.create', compact('token', 'apiData'));
    }

    public function studentPaymentsGetInvoices(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();
        $apiData = $request->all();

        $endpoint = 'user_invoices?admission_id=' . $apiData['admission_id'] . '&date=' . $apiData['payment_date'] . '&paid_from=' . $apiData['payment_term'] . '&payment_amount=' . $apiData['payment_amount'];
        $getPaymentsInvoicesResponse = $this->apiService->makeApiRequest('GET', $endpoint);

        if ($getPaymentsInvoicesResponse['status'] === false) {
            return view('layouts.pages.student.transaction.payment.create', ['errors' => $getPaymentsInvoicesResponse['errors'], 'message' => $getPaymentsInvoicesResponse['message'], 'apiData' => $apiData]);
        }

        $getInvoice = $getPaymentsInvoicesResponse['data'];
        return view('layouts.pages.student.transaction.payment.create', compact('token', 'apiData', 'getInvoice'));
    }

    public function studentPaymentsSubmitInvoices(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();
        $apiData = $request->all();

        $endpoint = 'user_payments';
        $paymentResponse = $this->apiService->makeApiRequest('POST', $endpoint, $apiData);

        if ($paymentResponse['status'] === false) {
            return view('layouts.pages.student.transaction.payment.create', ['errors' => $paymentResponse['errors'], 'message' => $paymentResponse['message'], 'apiData' => $apiData]);
        }
        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');


        $apiData = [
            'admission_id' => '',
            'payment_date' => '',
            'payment_amount' => '',
            'payment_term' => ''
        ];
        $payment = $paymentResponse['data'];

        $successMessage = 'Payment Successfully';

        if ($classResponse['status'] === false) {
            return view('layouts.pages.student.transaction.payment.index', ['successMessage' => $successMessage, 'errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }
        $allPaymentsResponse = $this->apiService->makeApiRequest('POST', 'all_user_payments', $apiData);
        if ($allPaymentsResponse['status'] === false) {

            return view('layouts.pages.student.transaction.payment.index', ['successMessage' => $successMessage, 'errors' => $allPaymentsResponse['errors'], 'message' => $allPaymentsResponse['message'], 'apiData' => $apiData]);
        }
        $allPayments = $allPaymentsResponse['data'];

        $year_grades = $classResponse['data'];

        return redirect()->route('student_payments')->with(compact('token', 'year_grades', 'allPayments', 'apiData', 'successMessage'));
    }

    public function accountPayable(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = [
            'sd_year_grade_class_id' => '',
            'admission_id' => '',
            'from_date' => '',
            'to_date' => ''
        ]; // default set data

        $tableDataResponse = $this->apiService->makeApiRequest('GET', 'account_payables'); // get table data

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class'); // get master data

        if ($classResponse['status'] === false) {
            return view('layouts.pages.student.transaction.account-payable.index', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }
        if ($tableDataResponse['status'] === false) {
            return view('layouts.pages.student.transaction.account-payable.index', ['errors' => $tableDataResponse['errors'], 'message' => $tableDataResponse['message'], 'apiData' => $apiData]);
        }

        $year_grades = $classResponse['data'];
        $accountPayableData = $tableDataResponse['data'];

        return view('layouts.pages.student.transaction.account-payable.index', compact('token', 'year_grades', 'accountPayableData', 'apiData'));
    }

    public function searchAccountPayable(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = $request->all();

        $endPoint = 'account_payables?sd_year_grade_class_id=' . ($apiData['sd_year_grade_class_id'] ?? '') . '&admission_id=' . ($apiData['admission_id'] ?? '') . '&from_date=' . ($apiData['from_date'] ?? '') . '&to_date=' . ($apiData['to_date'] ?? '');
        $tableDataResponse = $this->apiService->makeApiRequest('GET', $endPoint);

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');
        if ($classResponse['status'] === false) {
            return view('layouts.pages.student.transaction.account-payable.index', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }
        if ($tableDataResponse['status'] === false) {
            return view('layouts.pages.student.transaction.account-payable.index', ['errors' => $tableDataResponse['errors'], 'message' => $tableDataResponse['message'], 'apiData' => $apiData]);
        }

        $year_grades = $classResponse['data'];
        $accountPayableData = $tableDataResponse['data'];

        return view('layouts.pages.student.transaction.account-payable.index', compact('token', 'year_grades', 'accountPayableData', 'apiData'));
    }

    public function accountPayableRevise(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();


        $apiData = $request->input(); // Set form data as array
        $apiData = array_map(function ($value) {
            if (is_array($value)) {
                return implode(',', $value);
            }
            return $value;
        }, $apiData);
        $endPoint = 'revice_sercharge';

        $tableDataResponse = $this->apiService->makeApiRequest('POST', $endPoint, $apiData);

        if ($tableDataResponse['status'] === false) {
            return response()->json(['status' => 500, 'errors' => $tableDataResponse['errors'], 'message' => $tableDataResponse['message']]);
        }

        return response()->json(['status' => 200, 'message' => 'Success']);
    }


    public function admissionPayment(Request $request)
    {
        $apiData = [
            'admission_no' => $request->admission_id
        ];

        $tableDataResponse = $this->apiService->makeApiRequest('GET', 'student_admissions');


        if ($tableDataResponse['status'] === false) {
            return view('layouts.pages.student.transaction.admission.index', ['errors' => $tableDataResponse['errors'], 'message' => $tableDataResponse['message'], 'apiData' => $apiData]);
        }

        $accountPayableData = $tableDataResponse['data'];
        // dd($accountPayableData);
        return view('layouts.pages.student.transaction.admission.index', compact('apiData', 'accountPayableData'));
    }

    public function admissionPaymentSearch(Request $request)
    {
        $apiData = [
            'admission_id' => $request->admission_id
        ];

        $url = 'student_admissions?admission_no=' . $request->admission_id;

        $tableDataResponse = $this->apiService->makeApiRequest('GET', $url);

        if ($tableDataResponse['status'] === false) {
            return view('layouts.pages.student.transaction.admission.index', ['errors' => $tableDataResponse['errors'], 'message' => $tableDataResponse['message'], 'apiData' => $apiData]);
        }
        $accountPayableData = $tableDataResponse['data'];
        return view('layouts.pages.student.transaction.admission.index', compact('apiData', 'accountPayableData'));
    }

    public function admissionPaymentCreate(Request $request)
    {
        $data = $request->all();

        return view('layouts.pages.student.transaction.admission.create', compact('data'));
    }

    public function admissionPaymentStore(Request $request)
    {
        $data = $request->all();
        $param = [
            'admission_no' => $data['admissionNo'],
            'total_amount' => $data['admissionAmount'],
            'no_of_instalments' => $data['numberOfInstallments'],
            'admission_instalments' => $data['installmentArray']
        ];


        $response =  $this->apiService->makeApiRequestJson('POST', 'student_admissions/create', $param);

        if ($response['status'] === false) {
            return response()->json(['status' => 500, 'message' => $response['message']]);
        }
        return response()->json(['status' => 200, 'message' => 'Admission Added Successfully']);
    }


    public function admissionPaymentView(Request $request, $id)
    {

        $data = [];

        $endPoint = 'student_admission/' . $id;

        $dataResponse = $this->apiService->makeApiRequest('GET', $endPoint);

        // dd($dataResponse);

        if ($dataResponse['status'] === false) {
            return view('layouts.pages.student.transaction.admission.view', ['errors' => $dataResponse['errors'], 'message' => $dataResponse['message']]);
        }

        $data = $dataResponse['data'];


        return view('layouts.pages.student.transaction.admission.view', compact('data'));
    }

    public function admissionPaymentUpdate(Request $request)
    {

        $data = $request->all();

        $param = [
            'id' => $data['id'],
            'paid_date' => $data['paid_date'],
            'reference_no' => $data['reference_no'],
        ];

        $response =  $this->apiService->makeApiRequestJson('POST', 'student_admissions/update', $param);

        if ($response['status'] === false) {
            return response()->json(['status' => 500, 'message' => $response['message']]);
        }

        return response()->json(['status' => 200, 'message' => 'Installment Updated Successfully']);
    }

    public function invoices(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = [
            'sd_year_grade_class_id' => '',
            'admission_id' => '',
            'from_date' => '',
            'to_date' => ''
        ];

        $endPoint = 'invoice_list?sd_year_grade_class_id=' . ($apiData['sd_year_grade_class_id'] ?? '') . '&admission_id=' . ($apiData['admission_id'] ?? '') . '&from_date=' . ($apiData['from_date'] ?? '') . '&to_date=' . ($apiData['to_date'] ?? '');

        $tableDataResponse = $this->apiService->makeApiRequest('GET', $endPoint);

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        if ($classResponse['status'] === false) {
            return view('layouts.pages.student.transaction.invoices.index', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }

        if ($tableDataResponse['status'] === false) {
            return view('layouts.pages.student.transaction.invoices.index', ['errors' => $tableDataResponse['errors'], 'message' => $tableDataResponse['message'], 'apiData' => $apiData]);
        }

        $year_grades = $classResponse['data'];
        $accountPayableData = $tableDataResponse['data'];
        return view('layouts.pages.student.transaction.invoices.index', compact('token', 'year_grades', 'accountPayableData', 'apiData'));
    }

    public function searchInvoices(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = $request->all();

        $endPoint = 'invoice_list?sd_year_grade_class_id=' . ($apiData['sd_year_grade_class_id'] ?? '') . '&admission_id=' . ($apiData['admission_id'] ?? '') . '&from_date=' . ($apiData['from_date'] ?? '') . '&to_date=' . ($apiData['to_date'] ?? '');
        $tableDataResponse = $this->apiService->makeApiRequest('GET', $endPoint);

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');
        if ($classResponse['status'] === false) {
            return view('layouts.pages.student.transaction.invoices.index', ['errors' => $classResponse['errors'], 'message' => $classResponse['message'], 'apiData' => $apiData]);
        }
        if ($tableDataResponse['status'] === false) {
            return view('layouts.pages.student.transaction.invoices.index', ['errors' => $tableDataResponse['errors'], 'message' => $tableDataResponse['message'], 'apiData' => $apiData]);
        }

        $year_grades = $classResponse['data'];

        $accountPayableData = $tableDataResponse['data'];

        return view('layouts.pages.student.transaction.invoices.index', compact('token', 'year_grades', 'accountPayableData', 'apiData'));
    }

    public function invoicesView($id)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $invoicesResponse = $this->apiService->makeApiRequest('GET', 'invoice_details?invoice_number=' . $id);

        if ($invoicesResponse['status'] === false) {
            return view('layouts.pages.student.transaction.invoices.view', ['errors' => $invoicesResponse['errors'], 'message' => $invoicesResponse['message']]);
        }

        $details = $invoicesResponse['data'];

        return view('layouts.pages.student.transaction.invoices.view', compact('token', 'details'));
    }

    public function studentPaymetView($payment_id)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $invoicesResponse = $this->apiService->makeApiRequest('GET', 'payment_detail?payment_id=' . $payment_id);

        if ($invoicesResponse['status'] === false) {
            return view('layouts.pages.student.transaction.payment.view', ['errors' => $invoicesResponse['errors'], 'message' => $invoicesResponse['message']]);
        }

        $details = $invoicesResponse['data'];

        return view('layouts.pages.student.transaction.payment.view', compact('token', 'details'));
    }


    public function curricularCreate(Request $request)
    {
        $endPoint = 'student_extra_curricular_add';
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = [
            'student_id' => $request->get('student_id_for_curricular'),
            'extra_curricular_id' => $request->get('extra_curricular_id'),
            'start_from' => $request->get('curricular_start_date'),
            'end_from' => $request->get('curricular_end_date'),
            'status' => 1,
        ];


        $response = $this->apiService->makeApiRequest('POST', $endPoint, $apiData);

        if ($response['status'] === false) {
            return response()->json(['status' => 500, 'msg' => $response['message']]);
        } else {
            return response()->json(['status' => 200, 'msg' => 'Create successfully', 'data' => $response['data']]);
        }
    }


    public function curricularUpdate(Request $request)
    {
        $endPoint = 'student_extra_curricular_update/' . $request->get('id');
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = [
            'student_id' => $request->get('student_id_for_curricular'),
            'extra_curricular_id' => $request->get('extra_curricular_id'),
            'start_from' => $request->get('curricular_start_date'),
            'end_from' => $request->get('curricular_end_date'),
            'status' => 1,
        ];


        $response = $this->apiService->makeApiRequest('POST', $endPoint, $apiData);

        if ($response['status'] === false) {
            return response()->json(['status' => 500, 'msg' => $response['message']]);
        } else {
            return response()->json(['status' => 200, 'msg' => 'Updated successfully', 'data' => $response['data']]);
        }
    }

    public function deleteCurricular(Request $request, $id)
    {

        $endpoint = 'destroy_extra_curricular/' . $request->id;

        $response = $this->apiService->makeApiRequest('DELETE', $endpoint);

        if ($response['status'] === false) {
            return response()->json(['status' => 500, 'msg' => $response['message']]);
        } else {
            return response()->json(['status' => 200, 'msg' => 'Deleted successfully']);
        }
    }
}
