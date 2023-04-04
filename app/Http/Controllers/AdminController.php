<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin_login');
    }
    public function dologin()
    {
        $input =  ['email' => request('email'),'password' => request('password')];
        if(auth()->guard('admin')->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ])){
            return view('admin_home');
        }else{
            return redirect()->route('admin.login')->with('message','invalid credential');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function admin()
    {
        return view('admin');
    }
}
