<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;

use App\File;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class FileController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    function ajouterFichierPage(){
        return view('User.ajouterFichier');
    }

    function saveFile(Request $request){
        if($request->hasFile('file')){  //we store locally

            $type = $request ->file->getClientOriginalExtension();

            if($type  == 'docx' or $type  == 'pdf'){
                $fileName =  $request->file->getClientOriginalName();

                //stored in storage/app/public/upload :
                $path_file = $request->file->storeAs('public/upload', $fileName);
                //returns path => f db soit kanqyd lfile diali b lpath ou bien b name

                //$request->file->getClientOriginalName() => name d lfile b smia li f pc d lclient
                $file = new File();
                $file->name = $fileName;
                $file->path_file = $path_file;
                $file->type = $type;
                $file->user_id = $request->input('id');
                $file->title = $request->input('titre');
                $file->description = $request->input('description');

                $file->save();

                //message de validation d'enregistrement
                return back()->with('ok', 'Fichier enregistré');
            }
            else{
                return back()->with('error', 'Wrong Format');
            }
        }

        return back()->with('error', 'Aucun fichié spécifié');
    }

    function listFichier($id){

            //DB::table('users')->where('name', 'John')->first();

            $files = DB::select('select * from files where user_id = ?', [$id] );

            if($files){
                return view('User.listFiles', ['files' => $files]);
            }

    }
}
