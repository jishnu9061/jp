<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Hash;

class ApiController extends Controller
{
   
    public function login()
    {
        $user=User::where('email',request('email'))->first();
        if(Hash::check(request('password'),$user->password)){
        $token=$user->createToken('mobile-app')->plainTextToken;
        return response()->json([
            'email' => request('email'),
            'password' => request('password'),
            'data' =>$token,
            'message' =>'password is valid',
            'status' =>200
        ]);
        }else{
            return response()->json([
                'email' => request('email'),
                'password' => request('password'),
                'message' =>'password is invalid',
                'status' =>250
            ]);
    

        }
        
        
    }
    public function getprofile()
    {
        
        $user_id=auth()->user()->user_id;
        $user=User::find($user_id);
        // return $user_id;
        return response()->json([
            'status' => 200,
            'data' => $user,
            'message' => 'user details',
        ]);
    }
    public function logout(){
        $user=auth()->user()->user_id;
        $user=User::find($user);
        $user->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'user logged out successfully',
        ]);
    }
}
