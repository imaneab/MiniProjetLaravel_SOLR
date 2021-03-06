@extends('User.userLayout')

@section('content')
<link type="text/css" href="<?php echo url('/'); ?>/fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet">
            <script src="<?php echo url('/'); ?>/fontawesome-free-5.13.0-web/js/all.js" type="text/javascript"></script>
<div class="span9 col-lg-9">
	<div class="content">
		<div class="module">
        <div style="border-radius:10px;height: auto !important;min-height: 300px;">
        <form id="engine" action="#">
            <nav class="navbar navbar-dark bg-dark navbar-expand justify-content-between" style="border-top-left-radius: 5px;border-top-right-radius: 5px;">

                <div class="justify-content-between d-inline-flex col-6">
                    <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Taper votre recherche ici" aria-label="Chercher">
                    
                    <input type="button"  class="btn btn-success" id="ajax1" value="search">
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
                 <div class="loader">
                    <img src="<?php echo url('/'); ?>/images/ajax_loader.gif">
                 </div>
                        </div>
                        
                        </div>
		    </div>
        </div>
 </div>

</div>

<script type="text/javascript">

$(document).ready(function(){
    $('.loader').hide();
    $("#ajax1").click(function(e){
        e.preventDefault();
        $.ajaxSetup({
	        headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
        });
        var search = $("#search").val();
        var rech = $("#rech option:selected").val();
        var page = 1;
        //alert(search+" "+rech);
        //$.post("engine",{search:search, rech:rech},function(data){
        //   Console.log(data);
        //    $("#div1").html(data);
        //});
        if(search!="" && rech!=""){
            var dataString = "search="+search+"&rech="+rech+"&page="+page;
            $.ajax({
               type: "POST",
               url: "{{ url('engine') }}",
               data: dataString,
               beforeSend: function() {
                    $('#div1').hide();
                    $('.loader').show();
                },
                complete: function(){
                    $('.loader').hide();
                },
               success: function (result) {
                   $("#espace_search").html(result.message);
               },
               error: function(){
                $("#espace_search").html("<p style='color:red;text-align:center;'>ERROR</p>");
               }
           });
        }
        
    });

    $('#espace_search').on('click', 'input', function (e){
        
        e.preventDefault();
        $.ajaxSetup({
	        headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
        });
        var dataString = $(this).attr('id');
        $.ajax({
               type: "POST",
               url: "{{ url('engine') }}",
               data: dataString,
               beforeSend: function() {
                    $('#div1').hide();
                    $('.loader').show();
                },
                complete: function(){
                    $('.loader').hide();
                },
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