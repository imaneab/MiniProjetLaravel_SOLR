<?php

namespace App\Http\Controllers;

use App\Actualite;
use Illuminate\Http\Request;
use Validator;
use Auth;

class MainController extends Controller
{
    public function index()
    {        
        $actualites = Actualite::all();
        return view('index', compact('actualites'));
    }

    function indexAdmin()
    {
        return view('Admin.login');

    }

    function checklogin(Request $request)   //only for admin
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
            if(Auth::user()->is_admin){     //if admin
                return redirect()->route('successlogin');
            }
            else{
                return back()->with('error', 'You are not an admin');
            }
        }
        else{
            return back()->with('error', 'Wrong Login Details');
        }

    }

    function successlogin()
    {
     return view('Admin.successlogin');
    }

    function create()
    {
     return view('Admin.create');
    }

    function logout()
    {
     Auth::logout();
     return redirect()->route('home');
    }
}
