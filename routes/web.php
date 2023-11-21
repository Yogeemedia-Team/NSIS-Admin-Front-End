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
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'userLoginForm'])->name('user.login-form');
Route::post('/login', [LoginController::class, 'userLogin'])->name('user.login');

Route::get('/register', [LoginController::class, 'userRegisterForm'])->name('user.register-form');
Route::post('/register', [LoginController::class, 'userRegister'])->name('user.register');

Route::get('/admin/login', [LoginController::class, 'adminLoginForm'])->name('admin.login-form');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login');


Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');