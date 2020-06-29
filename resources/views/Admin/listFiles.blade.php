@extends('Admin.Layout')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style type="text/css">
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
    table.table td a.add {
        color: #27C46B;
    }
  
    
</style>


@section('main')

<!--Ici, le contenu-->
<div class="span9">
    <div class="content">
        <div class="module">
            <h1 style="text-decoration: underline; margin-left: 24%; margin-top:2%; color: #E34724" >Fichiers Enregistrés par Candidats</h1>
            <div class="module-body">
                
                <div class="module message">
                    <div class="module-head">
                    <h3>
                        Liste des fichiers</h3>
                     </div>
                    <br>

                <div class="module-body table">
                    <table class="table table-message">
                        <tbody>
                            <tr class="heading">
                                <td class="cell-icon"></td>
                                <td >N°</td>
                                <td class="cell-author hidden-phone hidden-tablet">
                                    Titre
                                </td>
                                <td>
                                    Description
                                </td>
                                <td>
                                    Type
                                </td>
                                <td >
                                    Date de création
                                </td>
                                <td >
                                    Télécharger
                                </td>
                                <td >
                                    Supprimer
                                </td>
                            </tr>
                            @foreach($files as $file)
                                <tr class="unread">
                                    <td class="cell-icon"></td>
                                    <td >{{ ($loop->index + 1 )}}</td>
                                    <td >
                                        {{ $file->title }}
                                    </td>
                                    <td >
                                        {{ $file->description }}
                                    </td>
                                    <td>
                                        {{ $file->type }}
                                    </td>
                                    <td>
                                        {{ $file->created_at }}
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('listAllFiles.downloadFile',$file->id) }}" style=" margin-left: 30%;width: 40%; height: 40%;" data-toggle="tooltip">
                                            <img src="/images/icons/mes_icones/download_user.svg" >
                                        </a>
                                    </td>
                                    <td>
                                
                                        <form style="margin-top:14%;" action="{{ route('listAllFiles.destroy',$file->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button style=" display:inline; border:0px;background-color: Transparent;margin-top:-14px">
                                                
                                                <a style="width: 40%; height: 40%;" data-toggle="tooltip" type="submit">
                                                    <img src="/images/icons/mes_icones/delete_user.svg" >
                                                </a>
                                            </button>
                                            

                                        </form>
                                        
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <div class="module-foot">
            </div>
        </div>
    </div>
    <!--/.content-->
</div>
    <!--end contenu-->



                    

        <!--/.wrapper-->
                    <!--/.span9-->
@endsection
