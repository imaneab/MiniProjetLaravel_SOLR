@extends('Admin.Layout')



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
                                    <td style="width: 25px;" >
                                        <a href="{{ route('listAllFiles.downloadFile',$file->id) }}" style=" margin-left: 15%; padding: 0%">
                                            <img src="/images/icons/mes_icones/download_user.svg" style="width: 60%;">
                                        </a>
                                    </td>
                                    <td style="width: 25px; padding-top: 2%;">
                                
                                        <form style="margin-top:14%;" action="{{ route('listAllFiles.destroy',$file->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')

                                            <button style=" border:0px;background-color: Transparent;margin-top:-14px;">
                                                
                                                <a style="" data-toggle="tooltip" type="submit">
                                                    <img src="/images/icons/mes_icones/delete_user.svg" style="width: 60%;">
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
