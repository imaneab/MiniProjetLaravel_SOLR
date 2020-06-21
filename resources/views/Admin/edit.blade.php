@extends('Admin.Layout')

@section('main')
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div align="right">
                <a href="index" class="btn btn-default">Back</a>
            </div>
            <br />
     <form method="post" action="{{ route('update', $actualites->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
      <div class="form-group">
       <label class="col-md-4 text-right">Enter First Name</label>
       <div class="col-md-8">
        <input type="text" name="description" value="{{ $actualites->description }}" class="form-control input-lg" />
       </div>
      </div>
      <br />
      <br />
      <br />
    
      <br />
      <br />
      <br />
      <div class="form-group">
       <label class="col-md-4 text-right">Select  Image</label>
       <div class="col-md-8">
        <input type="file" name="image_path" />
              <img src="{{ URL::to('/image_path') }}/{{ $row->image_path}}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $actualites->image_path }}" />
       </div>
      </div>
      <br /><br /><br />
      <div class="form-group text-center">
       <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
      </div>
     </form>

@endsection