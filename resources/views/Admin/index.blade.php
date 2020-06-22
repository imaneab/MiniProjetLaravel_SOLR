@extends('Admin.Layout')

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style type="text/css">
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table th:last-child {
        width: 100px;
    }
    table.table td a {
		cursor: pointer;
        display: inline-block;
        margin: 0 5px;
		min-width: 24px;
    }    
    table.table td a.add {
        color: #27C46B;
    }
  
    
</style>


@section('main')


				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
                                <h3>Gestion des actualités</h3>
                                
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                
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

                             <div class="module">
							<div class="module-head">
								<h3>La table des actualités</h3>
							</div>
                            
							<div class="module-body table">
                            <div class="col-sm-4">
                            <a href="{{ route('actualites.create') }}">
                              <button type="button" class="btn btn-info add-new" style="margin-left: 620px;"><i class="fa fa-plus"></i>Ajouter une nouvelle actualité</button>
                            </a>
                            </div>
                             <br/>
								<table id="tab" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
									<thead>
										<tr>
                                            <th>Numero</th>
											<th>Image</th>
											<th>Description</th>
                                            <th>Date de création</th>
                                            <th>Action</th>
											
										</tr>
									</thead>
									<tbody>
                                    @foreach($actualites as $row)
										<tr class="odd gradeX">
                                            <td>{{ $row->id }}</td>
											<td><img src="{{ URL::to('/image_path') }}/{{ $row->image_path }}" class="img-thumbnail" width="75" /></td>
											<td>{{ $row->description }}</td>
                                            <td>{{ $row->created_at }}</td>
                                           
                                            <td>
                                            
                                            <form action="{{ route('actualites.destroy',$row->id) }}" method="POST">
   
                                            <a style="border:0px;background-color: Transparent"><a href="{{ route('actualites.edit',$row->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>

                                          @csrf
                                          @method('DELETE')

                                          <button style="border:0px;background-color: Transparent;margin-top:-14px"><a class="delete" type="submit" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></button>
                                          </form>
                                            </td>
                                           
									
										</tr>
                                        @endforeach
									
									</tbody>
									<tfoot>
										<tr>
                                        <th>Numero</th>
											<th>Image</th>
											<th>Description</th>
                                            <th>Date de création</th>
                                            <th>Action</th>
										
										</tr>
									</tfoot>
								</table>
							</div>
						</div><!--/.module-->



									
							</div>
						</div>

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
@endsection