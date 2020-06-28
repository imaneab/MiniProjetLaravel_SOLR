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
                $path_file = $request->file->storeAs('upload', $fileName);
                //returns path => f db soit kanqyd lfile diali b lpath ou bien b name
                
                $fullp = str_replace('\\','/',str_replace('public','storage/app/public/', $_SERVER['DOCUMENT_ROOT']));

                $fpath = $fullp.$path_file;
                //$request->file->getClientOriginalName() => name d lfile b smia li f pc d lclient
                $file = new File();
                $file->name = $fileName;
                $file->path_file = $fpath;
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

            $files = DB::select('select * from files where user_id = ?', [$id] );

            return view('User.listFiles', ['files' => $files]);

    }

    function listAllFiles(){
        $files = DB::select('select * from files');

        return view('Admin.listFiles', ['files' => $files]);

    }

    function rechercher(){
        $doImport = file_get_contents("http://localhost:8983/solr/FileCollection/dataimport?command=full-import");
        return view('User.rechercher');
    }

    function ajaxRecherche(Request $request){

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
                    $tbody = $tbody."<td>".$user_array[$i]."</td>";
                    $tbody = $tbody."<td>".$date_array[$i]."</td>";
                    $id = $id_array[$i];
                    $icon = "<i class='fas fa-file-alt'></i>";
                    if($type_array[$i]=="pdf"){
                        $icon = "<i class='fas fa-file-pdf'></i>";
                    }
                    $tbody = $tbody."<td  class='down'><a href='/file/$id'><i class='icon-cloud-download'></i></a></td></tr>";
                }
                
                $tbody = $tbody."</tbody></table>";
                $res=$thead.$tbody;
                $pagin = "<br><div class='bas'><p class='cntr'>";
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

   
    public function download($id)
    {
        $document = File::findOrFail($id);

        $file = $document->name;
        //$file = str_replace('upload/','',$path);
        //$pth = str_replace('C:/wamp64/www/MiniProjetLaravel_SOLR/','',$doc);

        //Storage::delete(public_path('admin_documents' ));
        //$filename = str_replace('C:/wamp64/www/MiniProjetLaravel_SOLR/storage','',$path);
        //$file="ASPMVC-Partie1.pdf";
 
		$myFile = storage_path("app\public\upload\\".$file);
        //$headers = ['Content-Type: application/pdf'];

        return response()->download($myFile, $file);
        //return response()->download(storage_path("app/public/{$filename}"));
    }
}
