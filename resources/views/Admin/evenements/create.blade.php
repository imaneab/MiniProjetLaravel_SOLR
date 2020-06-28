@extends('Admin.Layout')

@section('main')


<div class="span9">
    <div class="content">

        <div class="module">
            <h1 style="text-decoration: underline; margin-left: 30%; margin-top:2%; color: #E34724" >Gestion des Evénements</h2>
                <div class="module-body">

            <div class="module">
                <div class="module-head">
                    <h3>Ajouter un Evénement</h3>
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
                        <a href="{{ route('evenements.index') }}" style="text-decoration:underline; font-size: 15px; margin-right: 5%;   ">Retour</a>
                    </div><br><br>

                    <form method="post" action="{{ route('evenements.store') }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
                        @csrf
                    <input type="hidden" name="id" value="{{Auth::user()->id}}">

                    <div class="control-group">
                        <label class="control-label" for="title">Titre de l'événement <span style="color: #E34724">*</span>  </label>
                        <div class="controls">
                            <input type="text" name="title" id="title" placeholder="Ajouter un titre..."class="span8"  value="{{old('title')}}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="date">Date de l'événement <span style="color: #E34724">*</span> </label>
                        <div class="controls">
                            <input type="date" name="date" id="date" placeholder="Ajouter la date..."class="span8" value="{{old('date')}}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="lieu">Lieu de l'événement </label>
                        <div class="controls">
                            <input type="text" name="lieu" id="lieu" placeholder="Ajouter le lieu..."class="span8" value="{{old('lieu')}}">
                        </div>
                    </div>

                    

                    <div class="control-group">
                        <label class="control-label" for="path_image">Image sur le thème </label>
                        <div class="controls">
                            <input type='file' name="path_image" id="path_image" value="{{old('path_image')}}">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="description">Description <span style="color: #E34724">*</span></label>
                        <div class="controls">
                            <textarea placeholder="Ajouter une description... " class="span8" rows="5" name="description" id="description">{{old('description')}}</textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">Ajouter l'Evénement</button>
                        </div>
                    </div>

                       
                    </form>
                </div>


            </div>

        </div>    

        
    </div><!--/.content-->
</div><!--/.span9-->
				
@endsection