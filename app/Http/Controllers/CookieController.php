<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function deletecookkie(){
        if(Cookie::get('signup_completed')!==false){
             Cookie::expire('signup_completed');
            return redirect('/');
        }

        return redirect('/');
    }
}
