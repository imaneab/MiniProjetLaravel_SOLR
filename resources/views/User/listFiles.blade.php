@extends('User.userLayout')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<style>
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

@section('content')
                <!--Ici, le contenu-->
                <div class="span9">
    <div class="content">

        <div class="module">
                {{-- affichage des Messages --}}
                @if (session('success'))
                    <div class="alert alert-success alert-block">
                        {{ session('success') }}
                    </div>
                @elseif(session('warning'))
                    <div class="alert alert-warning alert-block">
                        {{ session('warning') }}
                    </div>
                @elseif(session('danger'))
                    <div class="alert alert-danger alert-block">
                        {{ session('danger') }}
                    </div>
                @endif

                <div class="module-body table">

                    <table id="tab" cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                        <thead>
                            <tr>
                                <th>N°</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Download</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($files as $row)

                            <tr class="odd gradeX">
                                <td>{{ ($loop->index + 1 )}}</td>
                                <td> {{ $row->title}}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    <a href="{{ route('files.download',$row->id) }}" class="download" title="Download" data-toggle="tooltip">
                                        <i class="icon-cloud-download p-5" style="color:#27C46B; "></i>
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('files.deleteFile',$row->id) }}" method="POST">

                                        @csrf
                                        @method('DELETE')
                                        <button style="border:0px;background-color: Transparent;margin-top:-14px"><a class="delete" type="submit" title="Delete" data-toggle="tooltip">
                                            <i class="material-icons" style="margin-top:10px;">&#xE872;</i></a>
                                        </button>
                                    </form>
                                </td>


                            </tr>
                            @endforeach

                        </tbody>

                    </table>
                    </div>
                        <!--end contenu-->

@endsection
