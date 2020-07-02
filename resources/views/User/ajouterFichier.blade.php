@extends('User.userLayout')

@section('content')
<!--Ici, le contenu-->
            <div class="span9">
					<div class="content">
						<div class="module">
                            <div class="module-head">
								<h3>Ajouter un fichier</h3>
							</div>
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

                            @if ($message = Session::get('ok'))
                                <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif

							<div class="module-body">
									<form class="form-horizontal row-fluid" method="post" action="{{route('saveFile')}}" enctype="multipart/form-data">
                                    {{ @csrf_field() }}
                                    <input type="hidden" name="id" value="{{Auth::user()->id}}">

                                    <div class="control-group">
											<label class="control-label" for="basicinput">Titre </label>
											<div class="controls">
												<input type="text" name="titre" id="basicinput" placeholder="Type the title here..." class="span8">
											</div>
										</div>

                                       <div class="control-group">
											<label class="control-label" for="file">Fichier </label>
											<div class="controls">
                                                <input type='file' name="file">
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
												<button type="submit" class="btn">Submit Form</button>
											</div>
										</div>
									</form>
							</div>
						</div>

@endsection
