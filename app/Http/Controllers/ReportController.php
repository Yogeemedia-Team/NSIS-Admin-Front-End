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

        
        $allPaymentsResponse = null;


        
        // if ($allPaymentsResponse['status'] === false) {

        //     return view('layouts.pages.reports.payment_report', ['errors' => $allPaymentsResponse['errors'], 'message' => $allPaymentsResponse['message'], 'apiData' => $apiData]);
        // }

        // $allPayments = $allPaymentsResponse['data'];

        return view('layouts.pages.reports.payment_report', compact('token'));
    }

    public function PaymentDelaiedStudent(Request $request)
    {
        $classResponse = $this->apiService->makeApiRequest('GET', 'year_grade_class');

        $response = $this->apiService->makeApiRequest('GET', 'reports/payment_delaied');


        $apiData = [
            'sd_year_grade_class_id' => ''
        ];

        $studentDetails = $response['data'];
        $year_grades = $classResponse['data'];
        
        $apiService = new ApiService();
        $token = $apiService->getAccessToken();

        return view('layouts.pages.reports.payment_delaied', compact('token','studentDetails', 'year_grades', 'apiData'));
    }

    
}
