<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function signupStore(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->name;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('user.index');




    }

}
