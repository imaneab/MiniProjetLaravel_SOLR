@extends('Admin.Layout')

@section('main')


				<div class="span9">
					<div class="content">

						<div class="module">
							<h1 style="text-decoration: underline; margin-left: 30%; margin-top:2%; color: #E34724" >Gestion des Actualités</h1>
            
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
										<a href="{{ route('actualites.index') }}" style="text-decoration:underline; font-size: 15px; margin-right: 5%;   ">Retour</a>
									</div><br>

									<form method="post" action="{{ route('actualites.update', $actualites->id) }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
                                    @csrf
                                    @method('PATCH')
										<br/>
                                        <br/>

										<div class="control-group">
											<label class="control-label" for="basicinput">Description</label>
											<div class="controls">
												<input type="text" name="description" value="{{ $actualites->description }}" placeholder="Ajouter une description à l actualité..." data-original-title="" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Lien</label>
											<div class="controls">
												<input type="text" name="lien" value="{{ $actualites->lien }}" placeholder="Ajouter le lien d l actualité..." data-original-title="" class="span8 tip">
											</div>
										</div>
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Choisir une photo</label>
											<div class="controls">
												<input type="file" name="image_path" value="{{ $actualites->image_path }}" data-original-title="" class="span8 tip">
											    <img src="{{ URL::to('/') }}/image_path/{{ $actualites->image_path }}" class="img-thumbnail" width="100" />
		                                    	<input type="hidden" name="hidden_image" value="{{ $actualites->image_path }}" />
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