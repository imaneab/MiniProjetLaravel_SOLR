<!DOCTYPE html>
<html lang="en">


<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Acceuil - Admin</title>
        <link type="text/css" href="<?php echo url('/'); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link type="text/css" href="<?php echo url('/'); ?>/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
        <link rel="icon" type="image/jpg" href="<?php echo url('/'); ?>/images/logoEnsa.jpg" style="width: 100px;height: 100px;" />
        <link type="text/css" href="<?php echo url('/'); ?>/css/theme.css" rel="stylesheet">
        <link type="text/css" href="<?php echo url('/'); ?>/images/icons//css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
    </head>
<body style="font-family:'Arial Rounded MT';">


<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <i class="icon-reorder shaded"></i></a><a class="brand"><img src="<?php echo url('/'); ?>/images/ensa.png" style="width:200px;height:40px;margin-left: -10px;" alt=""> 
            </a>
            <div class="nav-collapse collapse navbar-inverse-collapse">
                <ul class="nav nav-icons">
                    <li><h1 style="color: dimgrey; margin-top: 20px;">
                        <img src="/images/icons/mes_icones/gestion.svg" style="width:30; height: 30px; margin-right: 10px;"></img>
                        Gestion de Plateforme ENSAS</h1></li>
                </ul>
                
                <ul class="nav pull-right">
                    <li><a  href="#" ><h3 style="color: dimgray">Admin</h3> </a></li>
                    <li class="nav-user dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="/images/icons/mes_icones/admin.svg" class="nav-avatar" style="height: 55px; width: 55px;"/>
                        <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Profil</a></li>
                            <li><a href="#">Modifier Profile</a></li>
                            <li><a href="#">Parametres du compte</a></li>
                            <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
    </div>
    <!-- /navbar-inner -->
           
 </div>

 <div class="wrapper" style="min-height: 450px;">
    <div class="container">
        <div class="row">
            <div class="span3">
                <div class="sidebar">
                    <ul class="widget widget-menu unstyled" style="font-size: 16px;">
                    <li class="active"><a href="{{ route('successlogin') }}"><i class="menu-icon icon-dashboard"></i>
                        Accueil
                        </a></li>
                    <li><a href="{{ route('actualites.index') }}"><i class="menu-icon icon-bullhorn"></i>Gestion des Actualités </a>
                        <li><a href="{{ route('evenements.index') }}"><i class="menu-icon icon-bullhorn"></i>Gestion des Evénements </a>
                        </li>
                        <li><a href="{{ route('documents.index') }}"><i class="menu-icon icon-paste"></i>Gestion des Documents </a></li>
                        <li><a href="task.html"><i class="menu-icon icon-search"></i>Moteur de Recherche</a></li>
                        <li><a href="{{ route('listAllFiles') }}""><i class="menu-icon icon-tasks"></i>Liste des Fichiers étudiants</a></li>
                    </ul>

                    <ul class="widget widget-menu unstyled" style="font-size: 16px;">
                        
                        <li><a href="{{ route('logout') }}"><i class="menu-icon icon-signout"></i>Logout </a></li> 

                        {{-- <!-- <li><a href="{{ url('/main/logout') }}"><i class="menu-icon icon-signout"></i>Logout </a></li> --> --}}

                    </ul>
                </div>
                <!--/.sidebar-->
            </div>


            @yield('main')
        </div>
    </div><!--/.container-->
 </div><!--/.wrapper-->

        

    <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2020 ENSAS - Moteur de recherche - SOLR </b>All rights reserved.
            </div>
    </div>
    
        <script src="<?php echo url('/'); ?>/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/flot/jquery.flot.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/flot/jquery.flot.resize.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo url('/'); ?>/scripts/common.js" type="text/javascript"></script>

</body>

