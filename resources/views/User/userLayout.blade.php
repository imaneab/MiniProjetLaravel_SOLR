<!DOCTYPE html>
<html lang="en">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Acceuil - Admin</title>
        <link type="text/css" href="<?php echo url('/'); ?>/bootstrap_assets/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo url('/'); ?>/bootstrap_assets/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="images/landing_page/ensa_logo.png" style="width: 200px;height: 200px;" />
        <link type="text/css" href="<?php echo url('/'); ?>/css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo url('/'); ?>/css/style_search.css" rel="stylesheet">
        <link type="text/css" href="<?php echo url('/'); ?>/images/icons//css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
    <body>
<nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-between">
<div class="justify-content-left d-inline-flex col-10">
<a class="navbar-brand" href="index.html"><img src="<?php echo url('/'); ?>/images/ensa.png" style="width:250px;height:60px;margin-left: 5px;" alt=""></a>
    
   
</div>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
<div class="d-inline-flex justify-content-right col-2">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 ">
        
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="font-size:18px;font-weight:bold" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="icon-cog" style="font-size:18px"></i> Paramètres
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Profile</a>
            <a class="dropdown-item" href="#">Modifier Profile</a>
            <a class="dropdown-item" href="#">Parametres du compte</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ url('/main/logout') }}">Logout</a>
            </div>
            </li>
        </ul>
    </div>
</div>
</nav>
        
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3 col-lg-3">
                        <div class="sidebar">
                        <ul class="widget widget-menu unstyled" style="list-style-type:none;padding-left:0">
                                <li class="active"><a href="index.html"><i class="menu-icon icon-dashboard"></i>Acceuil
                                </a></li>
                                <li><a href="activity.html"><i class="menu-icon icon-bullhorn"></i>Gestion des actualités </a>
                                </li>
                                <li><a href="/ajouterFichier"><i class="menu-icon icon-paste"></i>Ajouter un fichier </a></li>
                                <li><a href="{{ route('rechercher') }}"><i class="menu-icon icon-search"></i>Moteur de recherche</a></li>
                                <li><a href="/listFichier/{{Auth::user()->id}}"><i class="menu-icon icon-tasks"></i>Liste de mes fichiers</a></li>
                            </ul>

                            <ul class="widget widget-menu unstyled" style="list-style-type:none;padding-left:0">

                                <li><a href="{{ url('/main/logout') }}"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>


        <!--Ici, le contenu-->
           
        <script src="<?php echo url('/'); ?>/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        @yield('content')
        
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2020 ENSAS - Moteur de recherche - SOLR </b>All rights reserved.
            </div>
        </div>
       
        <script src="<?php echo url('/'); ?>/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/bootstrap_assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/common.js" type="text/javascript"></script>

    </body>
