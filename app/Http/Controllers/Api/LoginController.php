<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    Public function action(Request $request)
    {
        $this->validate($request,[
            'email'=> 'required|email',
            'password'=> 'required|min:8'
        ]);
        if(auth()->attempt($request->only('email','password'))){
            $currenUser = auth()->user();

            return (new UserResource($currenUser))->additional([
                'meta' =>[
                    'token'=> $currenUser->api_token,
                ],  
            ]);  
        }
        return response()->json([
            'error' => 'password salah',
        ],401);
    }
}
