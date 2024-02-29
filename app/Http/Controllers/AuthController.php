<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //show login page
    public function loginPage(){
        return view('login');
    }

    //show register page
    public function registerPage(){
        return view('register');
    }

    //show dashboard page
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('category#list');
        }else{
            return redirect()->route('user#home');
        }
    }
}
