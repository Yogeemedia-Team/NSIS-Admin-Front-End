<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function userLoginForm(){
        return view('layouts.auth.login');
    }

    public function userLogin(){

    }

    public function userRegisterForm(){
        return view('layouts.auth.register');
    }

    public function userRegister(){

    }

    public function adminLoginForm(){
         return view('layouts.auth.admin-login');
    }


    public function adminLogin(){

    }

}
