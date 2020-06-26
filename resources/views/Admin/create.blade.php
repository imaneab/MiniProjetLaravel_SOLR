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
                             <a href="index">Retour</a>
                             </div>

									<form method="post" action="{{ route('actualites.store') }}" enctype="multipart/form-data" class="form-horizontal row-fluid" >
                                    @csrf
										<br/>
                                        <br/>

										<div class="control-group">
											<label class="control-label" for="basicinput">Description</label>
											<div class="controls">
												<input type="text" name="description" placeholder="Ajouter une description à l actualité..." data-original-title="" class="span8 tip">
											</div>
										</div>
										
                                        <div class="control-group">
											<label class="control-label" for="basicinput">Choisir une photo</label>
											<div class="controls">
												<input type="file" name="image_path" data-original-title="" class="span8 tip">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Lien</label>
											<div class="controls">
												<input type="text" name="lien" placeholder="Ajouter le lien de l'actualité" data-original-title="" class="span8 tip">
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

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
@endsection