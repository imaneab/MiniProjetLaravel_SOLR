<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class UserController extends Controller
{
    function indexAdmin()
    {
        return view('User.login');

    }

    function checklogin(Request $request)   //only for user
    {
        $this->validate($request, [    //validation rules
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data)){  //enters block if user exists in db
            if(!Auth::user()->is_admin){     //if not admin
                return redirect('user/successlogin');
            }
            else{
                return back()->with('error', 'You are an admin, not a normal user');
            }
        }
        else{
            return back()->with('error', 'Wrong Login Details');
        }

    }
    function successlogin()
    {
        return view('User.successlogin');
    }

    function logout()
    {
        Auth::logout();
        return redirect('home');
    }
}
