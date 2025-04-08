<?php

namespace App\Http\Controllers\user\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        if($request->session()->has('USER_LOGIN')){
            return redirect('user/dashboard');
        }else{
            return view('user.auth.login');
        }
        return view('user.auth.login');
    }
    public function register(Request $request){
        if($request->session()->has('USER_LOGIN')){
            return redirect('user/dashboard');
        }else{
            return view('user.auth.register');
        }
        return view('user.auth.register');
    }
}
