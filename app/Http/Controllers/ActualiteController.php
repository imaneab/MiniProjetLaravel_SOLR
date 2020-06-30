<?php

namespace App\Http\Controllers;
use App\Actualite;
use Illuminate\Http\Request;

class ActualiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*public function home_index()
    {        
        $actualites = Actualite::all();
        return view('index', compact('actualites'));
    }*/

    public function index()
    {
        //
        $actualites = Actualite::all();
        return view('Admin.index', compact('actualites'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'description'        => 'required',
            'image_path'         =>  'required|image|max:2048',
            'lien'  => 'required'
        ]);

        $image = $request->file('image_path');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image_path'), $new_name);
        $form_data = array(
            'description'        =>   $request->description,
            'image_path'            =>   $new_name,
            'lien'    => $request->lien
        );

        Actualite::create($form_data);

        return redirect()->route('actualites.index')->with('success', 'Data Added successfully.');
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
       // $actualites = Actualite::findOrFail($id);
        //return view('view', compact('actualites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $actualites = Actualite::findOrFail($id);
        return view('Admin.edit', compact('actualites'));
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
        //
        $image_name = $request->hidden_image;
        $image = $request->file('image_path');
        if($image != '')
        {
            $request->validate([
                'description'    =>  'required',
                'image_path'     =>  'required',
                'lien'  => 'required'
                
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image_path'), $image_name);
        }
        else
        {
            $request->validate([
                //'description'    =>  'required',
                //'image_path'     =>  'required'
            ]);
        }

        $form_data = array(
            'description'    =>  $request->description,
            'image_path'         =>  $image_name,
            'lien'  =>  $request->lien,
        );

        Actualite::whereId($id)->update($form_data);

        return redirect()->route('actualites.index')->with('success', 'Contact updated!');



    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $actualites = Actualite::findOrFail($id);
        $actualites->delete();

        return redirect()->route('actualites.index')->with('success', 'Data is successfully deleted');
    }
}
