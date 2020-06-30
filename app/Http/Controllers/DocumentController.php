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
        $fullp = str_replace('\\','/',str_replace('public','storage/app/public/', $_SERVER['DOCUMENT_ROOT']));

        $fpath = $fullp.$path;

        $form_data = [
            'title' => $request->title,
            'description' => $request->description,
            'path' => $fpath,
            'user_id' => 0,
            'name' => $filename,
            'type' => $request->file('path')->getClientOriginalExtension()
        ];

        $data = Document::create($form_data);

        $id = $data->id;
        Document::where('id', $id)->update(array('code' => 'd-'.$id));

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
        
        Storage::delete('admin_documents/' . $document->name);
        $document->delete();
        
        return redirect()->route('documents.index')->with('danger', 'le document est supprimé !!');
    }

    public function download($id)
    {
        
        $document = Document::findOrFail($id);
        
        //Storage::delete(public_path('admin_documents' ));
        return Storage::download('admin_documents/'. $document->name);

    }

    public function telecharger($code)
    {
        $document = Document::where('code', $code);

        $file = $document->first()->name;
 
		$myFile = storage_path("app\public\admin_documents\\".$file);

        return response()->download($myFile, $file);
    }


    function rechercher(){
        $doImport = file_get_contents("http://localhost:8983/solr/FileCollection/dataimport?command=full-import");
        return view('Admin.admin_recherche');
    }

    function adminRecherche(Request $request){

        if($request->ajax()){
            $search = $request->get('search');
            $rech = $request->get('rech');
            $page = $request->get('page');

            
            if($search!="" && $rech!=""){
                
                $thead="<table class='table'>".
                    "<thead class='thead-dark'>".
                     "<tr>".
                        "<th scope='col'>#</th>".
                        "<th scope='col'>Titre</th>".
                        "<th scope='col'>Description</th>".
                        "<th scope='col'>Importé par</th>".
                        "<th scope='col'>Date d'importation</th>".
                        "<th scope='col'>Document</th>".
                     "</tr>".
                   "</thead>";

                
                $str = urlencode($search);
                $query = "$rech:*$str*";
                
                $start = $page*5-5;
                $rows = 5;
                $sort = urlencode("date_up desc");
                $url = "http://localhost:8983/solr/FileCollection/select?q=$query&sort=$sort&wt=php";
                $doImport = file_get_contents("http://localhost:8983/solr/FileCollection/dataimport?command=full-import");
                $file = file_get_contents($url."&start=".$start."&rows=".$rows);
                eval("\$result = " . $file . ";");
                $numOfPages = ceil($result["response"]["numFound"]/5);
                
                

                if($result["response"]["numFound"]==0){
                    $rien="<div id='div1'><p class='cntr'><i class='far fa-frown'></i> Aucun résultat trouvé</p></div1>";
                    return response()->json(["message"=>$rien]);
                }
                $title_array = array();
                $desc_array = array();
                $user_array = array();
                $id_array = array();
                $date_array = array();
                $type_array = array();

                for($i=0; $i<count($result["response"]["docs"]) ; $i++){
                    foreach($result["response"]["docs"][$i] as $k=>$v){
                        if($k=="title"){
                            $title;
                            if(!is_array($v)){
                                $title = $v;
                            }else{
                                $title = $v[0];
                            }
                            array_push($title_array, $title);
                            //$tbody = $tbody."<td>".$title."</td>";
                        }
                        else if($k=="description"){
                            $desc;
                            if(!is_array($v)){
                                $desc = $v;
                            }else{
                                $desc = $v[0];
                            }
                            array_push($desc_array, $desc);
                            //$tbody = $tbody."<td>".$desc."</td>";
                        }
                        else if($k=="user_name"){
                            $user_name;
                            if(!is_array($v)){
                                $user_name = $v;
                            }else{
                                $user_name = $v[0];
                            }
                            array_push($user_array, $user_name);
                            //$tbody = $tbody."<td>".$user_name."</td>";
                        }
                        else if($k=="id"){
                            $id;
                            if(!is_array($v)){
                                $id = $v;
                            }else{
                                $id = $v[0];
                            }
                            array_push($id_array, $id);
                            //$tbody = $tbody."<td> </td>";
                        }
                        else if($k=="date_up"){
                            $date_up;
                            if(!is_array($v)){
                                $date_up = $v;
                            }else{
                                $date_up = $v[0];
                            }
                            array_push($date_array, $date_up);
                            //$tbody = $tbody."<td> </td>";
                        }
                        else if($k=="type"){
                            $type_d;
                            if(!is_array($v)){
                                $type_d = $v;
                            }else{
                                $type_d = $v[0];
                            }
                            array_push($type_array, $type_d);
                            //$tbody = $tbody."<td> </td>";
                        }
                    }
                }

                $tbody = "<tbody>";
                $count = count($title_array);
                for ($i = 0; $i < $count; $i++){
                    $tbody = $tbody."<tr><td>".($i+$start+1)."</td>";
                    $tbody = $tbody."<td>".$title_array[$i]."</td>";
                    $tbody = $tbody."<td>".$desc_array[$i]."</td>";

                    $name_user = $user_array[$i];
                    if($name_user == "0"){
                        $name_user = "<input class='btn btn-primary' type='button' value='Admin'>";
                        $tbody = $tbody."<td>".$name_user."</td>";
                        $tbody = $tbody."<td>".$date_array[$i]."</td>";
                        $code = $id_array[$i];
                        $tbody = $tbody."<td  class='down'><a href='/documentDown/$code'><i class='icon-cloud-download'></i></a></td></tr>";
                    }
                    else{
                        $tbody = $tbody."<td>".$name_user."</td>";
                        $tbody = $tbody."<td>".$date_array[$i]."</td>";
                        $id = $id_array[$i];
                        $tbody = $tbody."<td  class='down'><a href='/file/$id'><i class='icon-cloud-download'></i></a></td></tr>";
                    } 
                }
                
                $tbody = $tbody."</tbody></table>";
                $res=$thead.$tbody;
                $pagin = "<br><div class='basd'><p class='cntr'>";
                for($i=0; $i<$numOfPages; $i++){
                    $slt_class = "btn-secondary";
                    if($page == ($i+1)){
                        $slt_class = "btn-warning";
                    }
                    $pagin .= "<input type='button' class='btn $slt_class'  id='search=$search&rech=$rech&page=".($i+1)."' value='".($i+1)."'>";
                }

                $res .= $pagin."</p></div>";

                
                return response()->json(["message"=>$res]);
            }

        }
    }
}
