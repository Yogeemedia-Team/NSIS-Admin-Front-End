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
    Route::post('/class/{gradeId}', [HomeController::class, 'updateClass'])->name('class_update');
    Route::post('/class_delete/{id}', [HomeController::class, 'deleteClass'])->name('class_delete');


    //  Extracurriculars routes here
    Route::get('/extracurriculars', [HomeController::class, 'extracurriculars'])->name('extracurriculars');
    Route::post('/add_extracurricular', [HomeController::class, 'addExtracurricular'])->name('addextracurricular');

    //  year_grade_class routes here
    Route::get('/year_grade_class', [HomeController::class, 'YearGradeClass'])->name('year_grade_class');
    Route::post('/add_year_grade_class', [HomeController::class, 'addYearGradeClass'])->name('add_year_grade_class');
});
