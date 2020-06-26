@extends('User.userLayout')

@section('content')
<div class="span9 col-lg-9">
	<div class="content">
		<div class="module">
        <div style="border-radius:5px;height: auto !important;min-height: 320px;">
        <form id="engine" action="#">
            <nav class="navbar navbar-dark bg-dark navbar-expand justify-content-between" style="border-top-left-radius: 5px;border-top-right-radius: 5px;">

                <div class="justify-content-between d-inline-flex col-6">
                    <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Taper votre recherche ici" aria-label="Chercher">
                    
                    <input type="button"  class="btn btn-outline-success" id="ajax1" value="search">
                </div>
                <div class="d-inline-flex justify-content-between col-4">
                    <select id="rech" name="rech" class="custom-select col-12">
                        <option selected disabled value="">Rechercher par</option>
                        <option value="type">Type</option>
                        <option value="title">Titre</option>
                        <option value="description">Description</option>
                        <option value="user_name">utilisateur</option>
                        <option value="text">Contenu</option>
                    </select>
                </div>
            </nav>
        </form>
            <div id="espace_search">
                  
                 <div id="div1">
                 <p class="cntr">
                 <i class="icon-search"></i>
                 </p>
                 </div>
                        </div>
                        
                        </div>
		    </div>
        </div>
 </div>

</div>

<script type="text/javascript">

$(document).ready(function(){
    $("#ajax1").click(function(e){
        e.preventDefault();
        $.ajaxSetup({
	        headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
        });
        var search = $("#search").val();
        var rech = $("#rech option:selected").val();
        //alert(search+" "+rech);
        //$.post("engine",{search:search, rech:rech},function(data){
        //   Console.log(data);
        //    $("#div1").html(data);
        //});
        var dataString = "search="+search+"&rech="+rech;
        $.ajax({
               type: "POST",
               url: "{{ url('engine') }}",
               data: dataString,
               success: function (result) {
                   $("#espace_search").html(result.message);
               },
               error: function(){
                $("#espace_search").html("<p style='color:red;text-align:center;'>ERROR</p>");
               }
           });
    });


});
</script>

@endsection