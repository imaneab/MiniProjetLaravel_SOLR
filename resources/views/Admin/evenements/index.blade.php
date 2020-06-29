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

<div class="span9">
    <div class="content">

        <div class="module">
            <h1 style="text-decoration: underline; margin-left: 30%; margin-top:2%; color: #E34724; font-weight: bold;" >Gestion des Evénements</h1>
            <div class="module-body">

            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
             @endif

            <div class="module">
                <div class="module-head">
                    <h3>La table des Evénements</h>
                </div>

                {{-- affichage des Messages --}}
                @if (session('success'))
                    <div class="alert alert-success alert-block">
                        {{ session('success') }}
                    </div>
                @elseif(session('warning'))
                    <div class="alert alert-warning alert-block">
                        {{ session('warning') }}
                    </div>
                @elseif(session('danger'))
                    <div class="alert alert-danger alert-block">
                        {{ session('danger') }}
                    </div>
                @endif
                
                <div class="module-body table">
                <div class="col-sm-4">
                    <a href="{{ route('evenements.create') }}">
                        <button type="button" class="btn btn-info add-new btn-large" style="margin-left: 67%;"><i class="fa fa-plus"></i>Ajouter un nouveau événement</button>
                    </a>
                </div>
                <br/>
                    <table id="tab" cellpadding="0" cellspacing="0" border="0" class=" text-center datatable-1 table table-bordered table-striped display" width="100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Image</th>
                                <th>Titre</th>
                                <th class="text-center">Description</th>
                                <th>Lieu</th>
                                <th>Date</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($evenements as $row)
                            
                            <tr class="odd gradeX">
                                <td>{{ ($loop->index + 1 )}}</td>
                                <td><img src="{{ URL::to('/storage/admin_documents') }}/{{ $row->path_image }}" class="img-thumbnail" width="75" /></td>
                                <td> {{ $row->title}}</td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->lieu }}</td>
                                <td>{{ $row->date }}</td>
                            
                                <td class="text-center">   
                                                                
                                    <form action="{{ route('evenements.destroy',$row->id) }}" method="POST">
                                       
                                        <a href="{{ route('evenements.edit',$row->id) }}" class="edit" title="Edit" data-toggle="tooltip">
                                            <i class="material-icons">&#xE254;</i>
                                        </a>                                        

                                        @csrf
                                        @method('DELETE')

                                        <button style="border:0px;background-color: Transparent;margin-top:-14px"><a class="delete" type="submit" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></button>
                                        

                                    </form>
                                </td>
                            
                        
                            </tr>
                            @endforeach
                        
                        </tbody>
                        
                    </table>
                </div>
            </div><!--/.module-->



                    
            
        </div>

        
        
    </div><!--/.content-->
</div><!--/.span9-->


				
@endsection