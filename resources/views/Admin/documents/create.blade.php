@extends('Admin.Layout')

@section('main')


<div class="span9">
    <div class="content">

        <div class="module">
            <h1 style="text-decoration: underline; margin-left: 30%; margin-top:2%; color: #E34724" >Gestion des Documents</h1>
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
                        <a href="{{ route('documents.index') }}" style="text-decoration:underline; font-size: 15px; margin-right: 5%;   ">Retour</a>
                    </div><br><br>
                    <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
                        @csrf
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">

                    <div class="control-group">
                            <label class="control-label" for="basicinput">Titre </label>
                            <div class="controls">
                            <input type="text" value="{{ old('title')}}" name="title" id="basicinput" placeholder="Type the title here..." class="span8">
                            </div>
                        </div>

                       <div class="control-group">
                            <label class="control-label" for="file">Fichier </label>
                            <div class="controls">
                                <input type='file' name="path">
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label" for="basicinput">Description </label>
                            <div class="controls">
                                <textarea class="span8" rows="5" name="description">value="{{ old('description')}}"</textarea>
                            </div>
                        </div>

                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-primary">Submit Form</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>    

        
    </div><!--/.content-->
</div><!--/.span9-->
				
@endsection