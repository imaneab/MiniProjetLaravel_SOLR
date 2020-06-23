@extends('Admin.Layout')

@section('main')


                    <!--Ici, le contenu-->
                    <div class="span9">
                        <div class="content">
                            <div class="module message">
                                <div class="module-head">
                                    <h3>
                                        Liste de mes fichiers</h3>
                                </div>
                                <br>

                                <div class="module-body table">
                                    <table class="table table-message">
                                        <tbody>
                                            <tr class="heading">
                                                <td class="cell-icon"></td>
                                                <td class="cell-author hidden-phone hidden-tablet">
                                                    Titre
                                                </td>
                                                <td>
                                                    Description
                                                </td>
                                                <td>
                                                    Type
                                                </td>
                                                <td >
                                                    Date de création
                                                </td>
                                            </tr>
                                            @foreach($files as $file)
                                                <tr class="unread">
                                                    <td class="cell-icon"></td>
                                                    <td >
                                                        {{ $file->title }}
                                                    </td>
                                                    <td >
                                                        {{ $file->description }}
                                                    </td>
                                                    <td>
                                                        {{ $file->type }}
                                                    </td>
                                                    <td>
                                                        {{ $file->created_at }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="module-foot">
                                </div>
                            </div>
                        </div>
                        <!--/.content-->
                    </div>
                        <!--end contenu-->


        <!--/.wrapper-->
                    <!--/.span9-->
@endsection
