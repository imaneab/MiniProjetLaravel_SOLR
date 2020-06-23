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
                    <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
                        @csrf
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">

                    <div class="control-group">
                            <label class="control-label" for="basicinput">Titre </label>
                            <div class="controls">
                                <input type="text" name="title" id="basicinput" placeholder="Type the title here..." class="span8">
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
                                <textarea class="span8" rows="5" name="description"></textarea>
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