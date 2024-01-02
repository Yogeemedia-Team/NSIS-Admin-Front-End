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

    // temp single student route
    Route::get('/single-student/{id}', [HomeController::class, 'singleStudent'])->name('single-student');

    Route::post('/student_delete/{id}', [HomeController::class, 'studentDelete'])->name('student_delete');

    Route::get('/students/{studentId}/edit', [HomeController::class, 'StudentEdit'])->name('student_edit');

    Route::post('/students/{studentId}', [HomeController::class, 'student_update'])->name('students_update');

    Route::get('/documant', [HomeController::class, 'documant'])->name('documant');

    // Grades routes here
    Route::get('/grades', [HomeController::class, 'grades'])->name('grades');
    Route::get('/addgrade', [HomeController::class, 'addGrade'])->name('addgrade');

    // Classes routes here
    Route::get('/classes', [HomeController::class, 'classes'])->name('classes');
    Route::get('/addclass', [HomeController::class, 'addClass'])->name('addclass');

    //  Extracurriculars routes here
    Route::get('/extracurriculars', [HomeController::class, 'extracurriculars'])->name('extracurriculars');
    Route::get('/addextracurricular', [HomeController::class, 'addExtracurricular'])->name('addextracurricular');

    //  year_grade_class routes here
    Route::get('/year_grade_class', [HomeController::class, 'YearGradeClass'])->name('year_grade_class');
    Route::get('/add_year_grade_class', [HomeController::class, 'addYearGradeClass'])->name('add_year_grade_class');
});
