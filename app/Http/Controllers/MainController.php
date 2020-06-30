<?php

namespace App\Http\Controllers;

use App\Actualite;
use App\AdminInfos;
use App\Document;
use App\Evenement;
use App\File;
use App\User;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    public function index()
    {        
        $actualites = Actualite::all();
        $documents = Document::all();
        $evenements = Evenement::all();

        return view('index', [
            'actualites' => $actualites,
            'documents' => $documents,            
            'evenements' => $evenements
        ]);
    }

    public function download($id)
    {
        
        $document = Document::findOrFail($id);
        
        return Storage::download('admin_documents/'. $document->path);

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
        $infos = new AdminInfos();

        $infos->nb_users = User::where('is_admin', false)->count();
        $infos->nb_actualites_admin = Actualite::count();
        $infos->nb_evenements_admin = Evenement::count();
        $infos->nb_documents_admin = Document::count();
        $infos->nb_documents_user = File::count();
        
        $avril = File::whereMonth('created_at', '=', '4')->count();
        $mai = File::whereMonth('created_at', '=', '5')->count();
        $juin = File::whereMonth('created_at', '=', '6')->count();

        if($infos->nb_documents_user != 0){
                
            $infos->poucentage_doc_avril = number_format(($avril * 100) / $infos->nb_documents_user, 2);
            $infos->poucentage_doc_mai = number_format(($mai * 100) / $infos->nb_documents_user, 2);
            $infos->poucentage_doc_juin = number_format(($juin * 100) / $infos->nb_documents_user, 2);
        
        } else {
            $infos->poucentage_doc_avril = 0;
            $infos->poucentage_doc_mai = 0;
            $infos->poucentage_doc_juin = 0;
        }

        return view('Admin.successlogin', [
            'infos' => $infos
        ]);
    }

    function create()
    {
        return view('Admin.create');
    }

    function logout()
    {
     Auth::logout();

     return redirect()->route('home');

     //return redirect('/');

    }
}
