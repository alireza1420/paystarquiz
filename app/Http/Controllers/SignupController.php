<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
class SignupController extends Controller
{
  public function showSignupForm(){
    return view('signup');
  }

  public function signup(Request $request){

    $validator=Validator::make($request->all(),[
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6',
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $user=User::create([
        'name'=>$request->input('name'),
        'email'=>$request->input('email'),
        'password'=>bcrypt($request->input('password')),
    ]);
    Auth::login($user);
    //Set cookies
    $cookie=cookie('signup_completed',true,60);
    return redirect('http://localhost/paystarquiz/public/')->withCookie($cookie);
}
}
