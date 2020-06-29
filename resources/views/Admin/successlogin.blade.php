@extends('Admin.Layout')

@section('main')

<div class="span9">
    <div class="content">
        <div class="module">
            <h1 style=" margin-left: 36%; margin-top:2%; margin-bottom:2%; color: #E34724" >Bienvenue Admin</h1>
        </div>
            <div class="btn-controls">
                <h3 style=" margin-left: 28%; margin-top:2%; margin-bottom:2%; color: dimgray" >Statistiques sur les activités de l'Admin</h3>
                <div class="btn-box-row row-fluid" style="margin-bottom: 0%;">
                    
                    <div class="btn-box big span4">
                        <img src="/images/icons/mes_icones/actualite0.svg" style="margin-bottom: 3%; margin-top: 3%; width: 27%; height: 27%;"></img>
                        <b>{{ $infos->nb_actualites_admin}}</b>
                        <p class="text-muted">
                            @if ($infos->nb_actualites_admin > 1 )
                                Actualités enregistrées
                            @else
                                Actualité enregistrée
                            @endif
                            
                        </p>
                    </div>
                    <div class="btn-box big span4">
                        <img src="/images/icons/mes_icones/document1.svg" style="margin-bottom: 3%; margin-top: 3%; width: 27%; height: 27%;"></img>
                        <b>{{ $infos->nb_documents_admin}}</b>
                        <p class="text-muted">
                            @if ($infos->nb_documents_admin > 1 )
                                Documents enregistrés
                            @else
                                Document enregistré
                            @endif
                        </p>
                    </div>
                    <div class="btn-box big span4">
                        <img src="/images/icons/mes_icones/evenement0.svg" style="margin-bottom: 3%; margin-top: 3%; width: 27%; height: 27%;"></img>
                        <b>{{ $infos->nb_evenements_admin}}</b>
                        <p class="text-muted">
                            @if ($infos->nb_evenements_admin > 1 )
                                Evénements enregistrés
                            @else
                                Evénement enregistré
                            @endif                            
                        </p>
                    </div>
                                        
                </div>
                <h3 style=" margin-left: 26%; margin-top:-2%; margin-bottom:2%; color: dimgray" >
                    Statistiques sur les activités des candidats
                </h3>
                <div class="btn-box-row row-fluid">
                    <div class="btn-box big span4">
                        <img src="/images/icons/mes_icones/users0.svg" style=" width: 33%; height: 33%;"></img>
                        <b>{{ $infos->nb_users}}</b>
                        <p class="text-muted">
                            @if ($infos->nb_users > 1 )
                                Candidats enregistrés
                            @else
                                Candidat enregistré
                            @endif                            
                        </p>
                    </div>
                    <div class="btn-box big span4">
                        <img src="/images/icons/mes_icones/document1.svg" style="margin-bottom: 3%; margin-top: 3%; width: 27%; height: 27%;"></img>
                        <b>{{ $infos->nb_documents_user}}</b>
                        <p class="text-muted">
                            @if ($infos->nb_documents_user > 1 )
                                Documents enregistrés par Candidats
                            @else
                                Evénement enregistré par Candidats
                            @endif                            
                        </p>
                
                    </div>
                    <ul class="widget widget-usage unstyled span4">
                        <p style="margin: 5%; font-size:15px;" style="color: #999999;">Upload des documents les 3 mois derniers</p>
                        <li>
                            <p>
                                <strong>Juin</strong> <span class="pull-right small muted">
                                    {{ $infos->poucentage_doc_juin}}%
                                </span>
                            </p>
                            <div class="progress tight">
                                <div class="bar bar-success" style="width: {{ $infos->poucentage_doc_juin}}%;">
                                </div>
                            </div>
                        </li>
                        <li>
                            <p>
                                <strong>Mai</strong> <span class="pull-right small muted">
                                    {{ $infos->poucentage_doc_mai}}%
                                </span>
                            </p>
                            <div class="progress tight">
                                <div class="bar bar-warning" style="width: {{ $infos->poucentage_doc_mai}}%;">
                                </div>
                            </div>
                        </li>
                        <li>
                            <p>
                                <strong>Avril</strong> <span class="pull-right small muted">
                                    {{ $infos->poucentage_doc_avril}}%
                                </span>
                            </p>
                            <div class="progress tight">
                                <div class="bar" style="width: {{ $infos->poucentage_doc_avril}}%;">
                                </div>
                            </div>
                        </li>
                        
                        
                        
                        
                    </ul>
                </div>
            </div>
        
    </div>
</div>

                    
                            

@endsection
