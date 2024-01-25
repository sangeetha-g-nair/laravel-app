<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class SignInController extends Controller
{
    public function login(){
        $user = User::where('email',request('email'))->first();
        if(Hash::check(request('password'),$user->password)){
        
            $token = $user->createToken('laravel-app')->plainTextToken;

            return response()->json([
                'status' => '200',
                'message' => 'login success',
                'token' => $token
            ]);
        }
        else{
            return response()->json([
                'status' => '401',
                'message' => 'unauthorized access'
            ]);
        }
    }
}
