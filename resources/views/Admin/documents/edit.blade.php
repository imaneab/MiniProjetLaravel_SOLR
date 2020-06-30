@extends('Admin.Layout')

@section('main')

<div class="span9">
	<div class="content">

		<div class="module">
			<h1 style="text-decoration: underline; margin-left: 30%; margin-top:2%; color: #E34724" >Gestion des Documents</h2>
			<div class="module-body">

			<div class="module">
				<div class="module-head">
					<h3>Modifier le document</h3>
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
					<a style="text-decoration:underline; font-size: 15px; margin-right: 5%; " href="{{ route('documents.index') }}">Retour</a>
				</div>

						<form method="post" action="{{ route('documents.update', $document->id) }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
						@csrf
						@method('PATCH')
							<br/>
							<br/>

							<div class="control-group">
								<label class="control-label" for="title">Titre</label>
								<div class="controls">
									<input type="text" name="title" value="{{ old('title', $document->title) }}" placeholder="Ajouter un titre au document..." data-original-title="" class="span8 tip">
								</div>
							</div>

							<div class="control-group">
								<label class="control-label" for="description">Description</label>
								<div class="controls">
									<textarea class="span8" rows="5" name="description" placeholder="Ajouter une description au document..." data-original-title="" class="span8 tip">{{ old('title', $document->description) }}</textarea>				
								</div>
							</div>
						
							
							<br/><br/>
							<div class="control-group">
								<div class="controls">
									<button type="submit" name="add" class="btn btn-success">Modifier</button>
									<button type="reset" class="btn btn-danger">Annuler</button>
								</div>
							</div>
						</form>
				</div>
			</div>

		</div>
		
	</div><!--/.content-->
</div><!--/.span9-->


				
@endsection