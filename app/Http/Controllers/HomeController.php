<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function signup()
    {
        return view('signup');
    }
    public function account()
    {
        return view('account');
    }

    public function hello($name, $lastname=" ")
    {
        return "Hello " . $name . " " . $lastname;
    }

    public function create(Request $request){

        $username = $request->username5;
        $email =  $request->email;
        $pass = $request->password;
        return "Account created with username " . $username . " and email " . $email . " and password " . $pass ;

    }
}
