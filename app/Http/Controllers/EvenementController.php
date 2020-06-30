<?php

namespace App\Http\Controllers;

use App\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EvenementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evenements = Evenement::all();
        return view('Admin.evenements.index', compact('evenements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.evenements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'required',
            'description'  => 'required',
            'path_image'  =>  'required|mimes:jpg,jpeg,png,jfif,svg|max:3000',
            'date' => 'required'
        ]);

        $file = $request->file('path_image');
        $filename = rand() . '_' . $file->getClientOriginalName();
        $path = Storage::putFileAs('admin_documents', $file, $filename);

    
        $form_data = [
            'title' => $request->title,
            'description' => $request->description,
            'path_image' => $filename,
            'lieu' => $request->lieu ? $request->lieu : 'ENSA Safi',
            'date' => $request->date
        ];

        Evenement::create($form_data);

        return redirect()->route('evenements.index')->with('success', "l'événement a été bien ajouté !");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evenement = Evenement::findOrFail($id);
        return view('Admin.evenements.edit', compact('evenement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $filename = $request->hidden_image;
        $image = $request->file('path_image');
        if($image != '')
        {
            $request->validate([
                'title'  => 'required',
                'description'  => 'required',
                'path_image'   =>  'required|mimes:jpg,jpeg,png,jfif,svg|max:3000',
                'date' => 'required'                
            ]);

            //supprimer la photo à partir du dossier
            $image_ancienne = Evenement::findOrFail($id);
            Storage::delete('admin_documents/' . $image_ancienne->path_image);
        
            $filename = rand() . '_' . $image->getClientOriginalName();
            $path = Storage::putFileAs('admin_documents', $image, $filename);
            
        }
        else
        {
            $request->validate([
                'title'  => 'required',
                'description'  => 'required',
                'date' => 'required' 
            ]);
        }

        $form_data = [
            'title' => $request->title,
            'description' => $request->description,
            'path_image' => $filename,
            'lieu' => $request->lieu ? $request->lieu : 'ENSA Safi',
            'date' => $request->date
        ];

        Evenement::whereId($id)->update($form_data);

        return redirect()->route('evenements.index')->with('warning', "l'événement a été bien modifié !");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evenement = Evenement::findOrFail($id);
        
        Storage::delete('admin_documents/' . $evenement->path);
        $evenement->delete();
        
        return redirect()->route('evenements.index')->with('danger', "l'événement est supprimé !!");
    }

}
