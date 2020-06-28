@extends('Admin.Layout')

@section('main')

<div class="span9">
	<div class="content">

		<div class="module">
			<h1 style="text-decoration: underline; margin-left: 30%; margin-top:2%; color: #E34724" >Gestion des Evénements</h2>
				<div class="module-body">

			<div class="module">
				<div class="module-head">
					<h3>Modifier le evenement</h3>
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
				</div><br>

						<form method="post" action="{{ route('evenements.update', $evenement->id) }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
						@csrf
						@method('PATCH')
							<br/>

							<div class="control-group">
								<label class="control-label" for="title">Titre de l'événement <span style="color: #E34724">*</span>  </label>
								<div class="controls">
									<input type="text" name="title" id="title" value="{{ old('title', $evenement->title) }}" placeholder="Ajouter un titre..."class="span8">
								</div>
							</div>
		
							<div class="control-group">
								<label class="control-label" for="date">Date de l'événement <span style="color: #E34724">*</span> </label>
								<div class="controls">
									<input type="date" name="date" id="date" value="{{ old('date', $evenement->date) }}"  placeholder="Ajouter la date..."class="span8">
								</div>
							</div>
		
							<div class="control-group">
								<label class="control-label" for="lieu">Lieu de l'événement </label>
								<div class="controls">
									<input type="text" name="lieu" id="lieu" value="{{ old('lieu', $evenement->lieu) }}"  placeholder="Ajouter le lieu..."class="span8">
								</div>
							</div>
		
							
		
							<div class="control-group">
								<label class="control-label" for="path_image">Choisir une photo</label>
								<div class="controls">
									<input type="file" id="path_image" name="path_image" value="{{ $evenement->path_image }}" data-original-title="" class="span8 tip">
									<img src="{{ URL::to('/storage/admin_documents') }}/{{ $evenement->path_image }}" class="img-thumbnail" width="100" />
									<input type="hidden" name="hidden_image" value="{{ $evenement->path_image }}" />
								</div>
							</div>
		
							<div class="control-group">
								<label class="control-label" for="description">Description <span style="color: #E34724">*</span></label>
								<div class="controls">
									<textarea placeholder="Ajouter une description... " class="span8" rows="5" name="description" id="description">{{ old('description', $evenement->description) }}</textarea>
								</div>
							</div>
						
							
							<br/><br/>
							<div class="control-group">
								<div class="controls">
									<button type="submit" name="add" class="btn-success">Modifier</button>
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