@extends('Admin.Layout')

@section('main')


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Ajouter une actualité</h3>
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
                             <a href="index"></a>
                             </div>

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

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
@endsection