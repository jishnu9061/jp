<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('users.login');
    }
    public function dologin()
    {
        $users=User::withTrashed()->paginate(10);
        if(auth()->attempt([
            'email' => request('email'),
            'password' => request('password'),
        ])){
            return view('welcome',compact('users'));
        }else{
            return redirect()->route('login')->with('message','invalid credential');
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
