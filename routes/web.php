<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layouts.auth.login');
});

Route::get('/login', [LoginController::class, 'userLoginForm'])->name('user.login-form');
Route::post('/login', [LoginController::class, 'loginApi'])->name('loginApi');



Route::group(['middleware' => 'checkRoutes'], function () {
    // Your routes here
    Route::get('/register', [LoginController::class, 'userRegisterForm'])->name('user.register-form');
    Route::post('/register', [LoginController::class, 'userRegister'])->name('register');

    Route::get('/permission', [HomeController::class, 'getPermission'])->name('getpermission');
    Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');


    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'logOut'])->name('logOut');

    Route::get('/formpage', [HomeController::class, 'formpage'])->name('formpage');
    Route::post('/student_create', [HomeController::class, 'student_create'])->name('student_create');
    Route::get('/students', [HomeController::class, 'students'])->name('students');
    Route::post('/students_search', [HomeController::class, 'studentsSearch'])->name('students_search');
    Route::get('/single-student/{id}', [HomeController::class, 'singleStudent'])->name('single-student');
    Route::delete('/student_delete/{id}', [HomeController::class, 'studentDelete'])->name('student_delete');
    Route::get('/students/{studentId}/edit', [HomeController::class, 'StudentEdit'])->name('student_edit');
    Route::post('/students/{studentId}', [HomeController::class, 'student_update'])->name('students_update');

    // student upgrade
    Route::get('/student_promotion', [HomeController::class, 'studentUpgradeUI'])->name('student-upgrade-ui');
    Route::post('/student_promotion_search', [HomeController::class, 'studentUpgradeUISearch'])->name('student-upgrade-ui-search');
    Route::post('/student_promotion_form', [HomeController::class, 'studentUpgradeForme'])->name('student-upgrade-form');

    Route::get('/get_year_grade_class', [HomeController::class, 'getYearGradeClass'])->name('get-year-grade-class');


    Route::get('/documant', [HomeController::class, 'documant'])->name('documant');

    // Grades routes here
    Route::get('/grades', [HomeController::class, 'grades'])->name('grades');
    Route::get('/add_grade', [HomeController::class, 'addGrade'])->name('add_grade');
    Route::post('/add_grade', [HomeController::class, 'createGrade'])->name('create_grade');
    Route::get('/grades/{gradeId}/edit', [HomeController::class, 'editGrade'])->name('grade_edit');
    Route::post('/grades/{gradeId}', [HomeController::class, 'updateGrade'])->name('grade_update');
    Route::delete('/grades_delete/{id}', [HomeController::class, 'deleteGrade'])->name('grade_delete');

    // Classes routes here
    Route::get('/classes', [HomeController::class, 'classes'])->name('classes');
    Route::get('/add_class', [HomeController::class, 'addClass'])->name('add_class');
    Route::post('/add_class', [HomeController::class, 'createClass'])->name('create_class');
    Route::get('/class/{classId}/edit', [HomeController::class, 'editClass'])->name('class_edit');
    Route::post('/class/{classId}', [HomeController::class, 'updateClass'])->name('class_update');
    Route::delete('/class_delete/{id}', [HomeController::class, 'deleteClass'])->name('class_delete');



    //  Extracurricular routes here
    Route::get('/extracurricular', [HomeController::class, 'extracurriculars'])->name('extracurriculars');
    Route::get('/add_extracurricular', [HomeController::class, 'addExtracurricular'])->name('add_extracurricular');
    Route::post('/add_extracurricular', [HomeController::class, 'createExtracurricular'])->name('create_extracurricular');
    Route::get('/extracurricular/{extracurricularId}/edit', [HomeController::class, 'editExtracurricular'])->name('extracurricular_edit');
    Route::post('/extracurricular/{extracurricularId}', [HomeController::class, 'updateExtracurricular'])->name('extracurricular_update');
    Route::delete('/extracurricular_delete/{id}', [HomeController::class, 'deleteExtracurricular'])->name('extracurricular_delete');

    //  year_grade_class routes here
    Route::get('/year_grade_class', [HomeController::class, 'YearGradeClass'])->name('year_grade_class');
    Route::get('/add_year_grade_class', [HomeController::class, 'addYearGradeClass'])->name('add_year_grade_class');
    Route::post('/add_year_grade_class', [HomeController::class, 'createYearGradeClass'])->name('create_year_grade_class');
    Route::get('/year_grade_class/{yeargradeclassId}/edit', [HomeController::class, 'editYearGradeClass'])->name('year_grade_class_edit');
    Route::post('/year_grade_class/{yeargradeclassId}', [HomeController::class, 'updateYearGradeClass'])->name('year_grade_class_update');
    Route::delete('/year_grade_class_delete/{id}', [HomeController::class, 'deleteYearGradeClass'])->name('year_grade_class_delete');

    // User Accounts routes here
    Route::get('/user_accounts', [HomeController::class, 'userAccounts'])->name('user_accounts');
    Route::get('/add_user_account', [HomeController::class, 'addUserAccount'])->name('add_user_account');
    Route::post('/add_user_account', [HomeController::class, 'createUserAccount'])->name('create_user_account');
    Route::get('/user_account/{user_accountId}/edit', [HomeController::class, 'editUserAccount'])->name('user_account_edit');
    Route::post('/user_account/{user_accountId}', [HomeController::class, 'updateUserAccount'])->name('user_account_update');
    Route::delete('/user_account_delete/{id}', [HomeController::class, 'deleteUserAccount'])->name('user_account_delete');

    // User Activities routes
    Route::get('/user_activities', [HomeController::class, 'userActivities'])->name('user_activities');
    Route::get('/add_user_activity', [HomeController::class, 'addUserActivity'])->name('add_user_activity');
    Route::post('/add_user_activity', [HomeController::class, 'createUserActivity'])->name('create_user_activity');
    Route::get('/user_activity/{user_activityId}/edit', [HomeController::class, 'editUserActivity'])->name('user_activity_edit');
    Route::post('/user_activity/{user_activityId}', [HomeController::class, 'updateUserActivity'])->name('user_activity_update');
    Route::delete('/user_activity_delete/{id}', [HomeController::class, 'deleteUserActivity'])->name('user_activity_delete');

    // User Assigning routes
    Route::get('/user_assigning', [HomeController::class, 'userAssigning'])->name('user_assigning');
    Route::get('/add_user_assigning', [HomeController::class, 'addUserAssigning'])->name('add_user_assigning');
    Route::post('/add_user_assigning', [HomeController::class, 'createUserAssigning'])->name('create_user_assigning');
    Route::get('/user_assigning/{user_assigningId}/edit', [HomeController::class, 'editUserAssigning'])->name('user_assigning_edit');
    Route::post('/user_assigning/{user_assigningId}', [HomeController::class, 'updateUserAssigning'])->name('user_assigning_update');
    Route::delete('/user_assigning_delete/{id}', [HomeController::class, 'deleteUserAssigning'])->name('user_assigning_delete');

    // User Levels routes
    Route::get('/user_levels', [HomeController::class, 'userLevels'])->name('user_levels');
    Route::get('/add_user_level', [HomeController::class, 'addUserLevel'])->name('add_user_level');
    Route::post('/add_user_level', [HomeController::class, 'createUserLevel'])->name('create_user_level');
    Route::get('/user_level/{user_levelId}/edit', [HomeController::class, 'editUserLevel'])->name('user_level_edit');
    Route::post('/user_level/{user_levelId}', [HomeController::class, 'updateUserLevel'])->name('user_level_update');
    Route::delete('/user_level_delete/{id}', [HomeController::class, 'deleteUserLevel'])->name('user_level_delete');

    // User Roles routes
    Route::get('/user_roles', [HomeController::class, 'userRoles'])->name('user_roles');
    Route::get('/add_user_role', [HomeController::class, 'addUserRole'])->name('add_user_role');
    Route::post('/add_user_role', [HomeController::class, 'createUserRole'])->name('create_user_role');
    Route::get('/user_role/{user_roleId}/edit', [HomeController::class, 'editUserRole'])->name('user_role_edit');
    Route::post('/user_role/{user_roleId}', [HomeController::class, 'updateUserRole'])->name('user_role_update');
    Route::delete('/user_role_delete/{id}', [HomeController::class, 'deleteUserRole'])->name('user_role_delete');

    // Enrollments routes
    Route::get('/enrollments', [HomeController::class, 'enrollments'])->name('enrollments');
    Route::get('/single_enrollment', [HomeController::class, 'viewEnrollment'])->name('single_enrollment');
    Route::get('/add_enrollment', [HomeController::class, 'addEnrollment'])->name('add_enrollment');
    Route::post('/add_enrollment', [HomeController::class, 'createEnrollment'])->name('create_enrollment');
    Route::get('/enrollment/{enrollmentId}/edit', [HomeController::class, 'editEnrollment'])->name('enrollment_edit');
    Route::post('/enrollment/{enrollmentId}', [HomeController::class, 'updateEnrollment'])->name('enrollment_update');
    Route::delete('/enrollment_delete/{id}', [HomeController::class, 'deleteEnrollment'])->name('enrollment_delete');

    // Admission Fee
    Route::get('/admission_fee', [HomeController::class, 'admissionFee'])->name('admission_fee');
    Route::get('/add_admission_fee', [HomeController::class, 'addAdmissionFee'])->name('add_admission_fee');
    Route::delete('/admission_fee_delete/{id}', [HomeController::class, 'deleteAdmissionFee'])->name('admission_fee_delete');

    // Monthly Fee
    Route::get('/monthly_fee', [HomeController::class, 'monthlyFee'])->name('monthly_fee');
    Route::get('/add_monthly_fee', [HomeController::class, 'addMonthlyFee'])->name('add_monthly_fee');
    Route::delete('/monthly_fee_delete/{id}', [HomeController::class, 'deleteMonthlyFee'])->name('monthly_fee_delete');

    // Surcharge Formula 
    Route::get('/surcharge_formula', [HomeController::class, 'surchargeFormula'])->name('surcharge_formula');
    Route::get('/add_surcharge_formula', [HomeController::class, 'addSurchargeFormula'])->name('add_surcharge_formula');
    Route::delete('/surcharge_formula_delete/{id}', [HomeController::class, 'deleteSurchargeFormula'])->name('surcharge_formula_delete');

    // Student payments
    Route::get('/student_payments', [HomeController::class, 'studentPayments'])->name('student_payments');
    Route::post('/add_student_payment/get_invoices', [HomeController::class, 'studentPaymentsGetInvoices'])->name('add_student_payment_get_invoices');
    Route::post('/student_payments/submit_invoices', [HomeController::class, 'studentPaymentsSubmitInvoices'])->name('student_payments_submit_invoices');
    Route::post('/student_payments/search', [HomeController::class, 'searchStudentPayments'])->name('student_payments_search');
    Route::get('/add_student_payment', [HomeController::class, 'addStudentPayment'])->name('add_student_payment');
    Route::delete('/student_payment_delete/{id}', [HomeController::class, 'deleteStudentPayment'])->name('student_payment_delete');
    Route::get('/student_paymet_view/{payment_id}', [HomeController::class, 'studentPaymetView'])->name('student_paymet_view');

    // account_payable
    Route::get('/account_payable', [HomeController::class, 'accountPayable'])->name('account_payable');
    Route::post('/account_payable/search', [HomeController::class, 'searchAccountPayable'])->name('account_payable_search');
    Route::post('/account_payable_revise', [HomeController::class, 'accountPayableRevise'])->name('account_payable_revise');

    Route::get('/admission_payment', [HomeController::class, 'admissionPayment'])->name('admission_payment');
    Route::post('/admission_payment_search', [HomeController::class, 'admissionPaymentSearch'])->name('admission_payment_search');
    Route::get('/admission_payment_create', [HomeController::class, 'admissionPaymentCreate'])->name('admission_payment_create');
    Route::post('/admission_payment_store', [HomeController::class, 'admissionPaymentStore'])->name('admission_payment_store');
    Route::get('/admission_payment_view/{id}', [HomeController::class, 'admissionPaymentView'])->name('admission_payment_view');
    Route::post('/admission_payment_update', [HomeController::class, 'admissionPaymentUpdate'])->name('admission_payment_update');

    Route::get('/invoices', [HomeController::class, 'invoices'])->name('invoices');
    Route::post('/invoices/search', [HomeController::class, 'searchInvoices'])->name('invoices_search');
    Route::get('/invoices_view/{id}', [HomeController::class, 'invoicesView'])->name('invoices_view');

    //reports
    Route::get('/student_payments_report', [ReportController::class, 'studentPaymentsReport'])->name('student_payments_report');
    Route::get('/payments_delaied_student', [ReportController::class, 'PaymentDelaiedStudent'])->name('payments_delaied_student');
    Route::get('/grade_class_student_report', [ReportController::class, 'gradeClassStudentReport'])->name('grade_class_student_report');
    Route::get('/extra_curricular_report', [ReportController::class, 'extraCurricularReport'])->name('extra_curricular_report');
    Route::get('/income_report', [ReportController::class, 'incomeReport'])->name('income_report');
    
    Route::post('/curricular_create', [HomeController::class, 'curricularCreate'])->name('curricular_create');
    Route::post('/curricular_update', [HomeController::class, 'curricularUpdate'])->name('curricular_update');
    Route::post('/curricular_delete/{id}', [HomeController::class, 'deleteCurricular'])->name('curricular_delete');

});
