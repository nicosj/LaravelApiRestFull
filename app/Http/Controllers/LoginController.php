<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\AuthenticateException;

class LoginController extends Controller
{

    public function authenticate(Request $request){

        $credenciales =$request->only('email', 'password');
        if(Auth::attempt($credenciales)){
           $token= Auth::user()->createtoken(Auth::id())->plainTextToken;
           return response()->json([
              'token' => $token,
           ]);
        }
        throw new AuthenticateException;
    }
}
