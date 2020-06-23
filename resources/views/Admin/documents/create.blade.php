@extends('Admin.Layout')

@section('main')


<div class="span9">
    <div class="content">

        <div class="module">
            <h1 style="margin-left: 25%; margin-top:2%; color: #E34724" >Gestion des documents</h2>
            <div class="module-body">

            <div class="module">
                <div class="module-head">
                    <h3>Ajouter un document</h3>
                </div>
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
                <div align="right">
                <a href="{{ route('documents.index') }}">Retour</a>
                </div>

                        <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
                        @csrf
                            <br/>
                            <br/>

                            <div class="control-group">
                                <label class="control-label" for="basicinput">Description</label>
                                <div class="controls">
                                    <input type="text" name="description" placeholder="Ajouter une description au document..." data-original-title="" class="span8 tip">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label" for="basicinput">Choisir une photo</label>
                                <div class="controls">
                                    <input type="file" name="path" data-original-title="" class="span8 tip">
                                </div>
                            </div>
                            <br/><br/>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="add" class="btn-success">Ajouter</button>
                                    <button type="reset" class="btn-danger">Annuler</button>
                                </div>
                            </div>
                        </form>
                </div>
            </div>

        </div>    

        
        
    </div><!--/.content-->
</div><!--/.span9-->
				
@endsection