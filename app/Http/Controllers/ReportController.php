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

class ReportController extends Controller
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

   
    // Student Payments Controllers Here
    public function studentPaymentsReport()
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $apiData = [
            'admission_no' => '',
            'from_date' => '',
            'date' => ''
        ];


        return view('layouts.pages.reports.payment-report', compact('token'));
    }

    public function PaymentDelaiedStudent(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        $response = $this->apiService->makeApiRequest('GET', 'reports/payment_delaied');


        $apiData = [
            'sd_year_grade_class_id' => ''
        ];

        $studentDetails = $response['data'];
        $year_grades = $classResponse['data'];
        

        return view('layouts.pages.reports.payment-delaied', compact('token','studentDetails', 'year_grades', 'apiData'));
    }
    

    public function gradeClassStudentReport(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $classResponse = $this->apiService->makeApiRequest('GET', 'class');
        $gradeResponse = $this->apiService->makeApiRequest('GET', 'grade');
       

        $classes = $classResponse['data'];
        $grades = $gradeResponse['data'];
      

        return view('layouts.pages.reports.grade-class-student', compact('token','classes', 'grades'));
    }

    
    public function extraCurricularReport(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        $extraCurricularResponse = $this->apiService->makeApiRequest('GET', 'extra_curricular');
       
        $extraCurriculars = $extraCurricularResponse['data'];
        
        return view('layouts.pages.reports.extra-curricular-report', compact('token','extraCurriculars'));
    }

    public function incomeReport(Request $request)
    {
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        return view('layouts.pages.reports.income-report', compact('token'));
    }
    
}
