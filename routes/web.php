<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;


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
    Route::get('/single-student/{id}', [HomeController::class, 'singleStudent'])->name('single-student');
    Route::post('/student_delete/{id}', [HomeController::class, 'studentDelete'])->name('student_delete');
    Route::get('/students/{studentId}/edit', [HomeController::class, 'StudentEdit'])->name('student_edit');
    Route::post('/students/{studentId}', [HomeController::class, 'student_update'])->name('students_update');

    Route::get('/documant', [HomeController::class, 'documant'])->name('documant');

    // Grades routes here
    Route::get('/grades', [HomeController::class, 'grades'])->name('grades');
    Route::get('/add_grade', [HomeController::class, 'addGrade'])->name('add_grade');
    Route::post('/add_grade', [HomeController::class, 'createGrade'])->name('create_grade');
    Route::get('/grades/{gradeId}/edit', [HomeController::class, 'editGrade'])->name('grade_edit');
    Route::post('/grades/{gradeId}', [HomeController::class, 'updateGrade'])->name('grade_update');
    Route::post('/grades_delete/{id}', [HomeController::class, 'deleteGrade'])->name('grade_delete');

    // Classes routes here
    Route::get('/classes', [HomeController::class, 'classes'])->name('classes');
    Route::get('/add_class', [HomeController::class, 'addClass'])->name('add_class');
    Route::post('/add_class', [HomeController::class, 'createClass'])->name('create_class');
    Route::get('/class/{classId}/edit', [HomeController::class, 'editClass'])->name('class_edit');
    Route::post('/class/{classId}', [HomeController::class, 'updateClass'])->name('class_update');
    Route::post('/class_delete/{id}', [HomeController::class, 'deleteClass'])->name('class_delete');


    //  Extracurricular routes here
    Route::get('/extracurricular', [HomeController::class, 'extracurricular'])->name('extracurriculars');
    Route::get('/add_extracurricular', [HomeController::class, 'addExtracurricular'])->name('add_extracurricular');
    Route::post('/add_extracurricular', [HomeController::class, 'createExtracurricular'])->name('create_extracurricular');
    Route::get('/extracurricular/{extracurricularId}/edit', [HomeController::class, 'editExtracurricular'])->name('extracurricular_edit');
    Route::post('/extracurricular/{extracurricularId}', [HomeController::class, 'updateExtracurricular'])->name('extracurricular_update');
    Route::post('/extracurricular_delete/{id}', [HomeController::class, 'deleteExtracurricular'])->name('extracurricular_delete');

    //  year_grade_class routes here
    Route::get('/year_grade_class', [HomeController::class, 'YearGradeClass'])->name('year_grade_class');
    Route::get('/add_year_grade_class', [HomeController::class, 'addYearGradeClass'])->name('add_year_grade_class');

    // User Accounts routes here
    Route::get('/user_accounts', [HomeController::class, 'userAccounts'])->name('user_accounts');
    Route::get('/add_user_account', [HomeController::class, 'addUserAccount'])->name('add_user_account');
    Route::post('/add_user_account', [HomeController::class, 'createUserAccount'])->name('create_user_account');
    Route::get('/user_account/{user_accountId}/edit', [HomeController::class, 'editUserAccount'])->name('user_account_edit');
    Route::post('/user_account/{user_accountId}', [HomeController::class, 'updateUserAccount'])->name('user_account_update');
    Route::post('/user_account_delete/{id}', [HomeController::class, 'deleteUserAccount'])->name('user_account_delete');

    // User Activities routes
    Route::get('/user_activities', [HomeController::class, 'userActivities'])->name('user_activities');
    Route::get('/add_user_activity', [HomeController::class, 'addUserActivity'])->name('add_user_activity');
    Route::post('/add_user_activity', [HomeController::class, 'createUserActivity'])->name('create_user_activity');
    Route::get('/user_activity/{user_activityId}/edit', [HomeController::class, 'editUserActivity'])->name('user_activity_edit');
    Route::post('/user_activity/{user_activityId}', [HomeController::class, 'updateUserActivity'])->name('user_activity_update');
    Route::post('/user_activity_delete/{id}', [HomeController::class, 'deleteUserActivity'])->name('user_activity_delete');

    // User Assigning routes
    Route::get('/user_assigning', [HomeController::class, 'userAssigning'])->name('user_assigning');
    Route::get('/add_user_assigning', [HomeController::class, 'addUserAssigning'])->name('add_user_assigning');
    Route::post('/add_user_assigning', [HomeController::class, 'createUserAssigning'])->name('create_user_assigning');
    Route::get('/user_assigning/{user_assigningId}/edit', [HomeController::class, 'editUserAssigning'])->name('user_assigning_edit');
    Route::post('/user_assigning/{user_assigningId}', [HomeController::class, 'updateUserAssigning'])->name('user_assigning_update');
    Route::post('/user_assigning_delete/{id}', [HomeController::class, 'deleteUserAssigning'])->name('user_assigning_delete');

    // User Levels routes
    Route::get('/user_levels', [HomeController::class, 'userLevels'])->name('user_levels');
    Route::get('/add_user_level', [HomeController::class, 'addUserLevel'])->name('add_user_level');
    Route::post('/add_user_level', [HomeController::class, 'createUserLevel'])->name('create_user_level');
    Route::get('/user_level/{user_levelId}/edit', [HomeController::class, 'editUserLevel'])->name('user_level_edit');
    Route::post('/user_level/{user_levelId}', [HomeController::class, 'updateUserLevel'])->name('user_level_update');
    Route::post('/user_level_delete/{id}', [HomeController::class, 'deleteUserLevel'])->name('user_level_delete');

    // User Roles routes
    Route::get('/user_roles', [HomeController::class, 'userRoles'])->name('user_roles');
    Route::get('/add_user_role', [HomeController::class, 'addUserRole'])->name('add_user_role');
    Route::post('/add_user_role', [HomeController::class, 'createUserRole'])->name('create_user_role');
    Route::get('/user_role/{user_roleId}/edit', [HomeController::class, 'editUserRole'])->name('user_role_edit');
    Route::post('/user_role/{user_roleId}', [HomeController::class, 'updateUserRole'])->name('user_role_update');
    Route::post('/user_role_delete/{id}', [HomeController::class, 'deleteUserRole'])->name('user_role_delete');
});
