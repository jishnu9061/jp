<?php

namespace App\Http\Controllers;

use App\Mail\PasswordResetMail;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Str;

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
    public function forgotPassword()
    {
        return view('forgot_password');
    }
    public function resetPassword()
    {
        $user=User::where('email',request('email'))->first();
        $token=Str::random(120);
        $user->update(['password_reset_token'=>$token]);
        Mail::to(request('email'))->send(new PasswordResetMail($user,$token));
        return redirect()->back()->with('message','check your inbox for password reset');
    }
    public function password($token)
    {
        $user=User::where('password_reset_token',$token)->first();
        if($user){
            $user->update(['password_reset_token'=>'NULL']);
            return view('reset_password',compact('user'));
        }else{
            return redirect()->route('forgot')->with('message','Email Address Invalid');
        }
    }
    public function confirmpass()
    {

       $user=User::where('user_id',decrypt(request('user_id')))->first();
       if($user){
        $user->password = bcrypt(request('password'));
        $user->save();
            return redirect()->route('login')->with('message','please login with your new password');
       }else{
        return redirect()->route('login')->with('message','something went wrong');
       }
    }
}
