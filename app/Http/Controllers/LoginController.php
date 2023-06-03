<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\RedisCaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function showLoginForm(){
        return view('login');
    }

    public function login(Request $request){

        //validation
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'

        ]);
        //Attemp Authenticate User

        if(auth()->attempt($request->only('email','password'))){
            $cookie=cookie('signup_completed',true,60);
            return redirect('/public')->withCookie($cookie);
        }

        //Failed Authentication
        return redirect()->back()->withErrors([
            'email'=>"The email pr Password is incorrect ! ",
        ]);
    }


}
