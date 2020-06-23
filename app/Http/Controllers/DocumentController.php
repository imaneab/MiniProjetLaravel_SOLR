<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
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
    function index()
    {
        $documents = Document::all();
        return view('Admin.documents.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.documents.create');
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
            'path'         =>  'required|mimes:pdf,doc,docx,pptx|max:5000'
        ]);

        $file = $request->file('path');
        $filename = rand() . '_' . $file->getClientOriginalName();
        $path = Storage::putFileAs('admin_documents', $file, $filename);

        $form_data = [
            'title' => $request->title,
            'description' => $request->description,
            'path' => $filename
        ];

        Document::create($form_data);

        return redirect()->route('documents.index')->with('success', 'le document a été bien ajouté !');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('Admin.documents.edit', compact('document'));
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
        
            $request->validate([
                'title'  => 'required',
                'description'    =>  'required'                              
            ]);
        

        $form_data = array(
            'title'  => $request->title,
            'description'    =>  $request->description
        );

        Document::whereId($id)->update($form_data);

        return redirect()->route('documents.index')->with('warning', 'le document a été bien modifié !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $document = Document::findOrFail($id);
        
        //Storage::delete(public_path('admin_documents' ));
        Storage::delete('admin_documents/' . $document->path);
        $document->delete();
        

        return redirect()->route('documents.index')->with('danger', 'le document est supprimé !!');
    }

    public function download($id)
    {
        
        $document = Document::findOrFail($id);
        
        //Storage::delete(public_path('admin_documents' ));
        return Storage::download('admin_documents/'. $document->path);

    }
}
