@extends('User.userLayout')

@section('content')
<div class="span9 col-lg-9">
	<div class="content">
		<div class="module">
        <div style="border-radius:5px;height: auto !important;min-height: 320px;">
         <form>

            <nav class="navbar navbar-dark bg-dark navbar-expand justify-content-between" style="border-top-left-radius: 5px;border-top-right-radius: 5px;">

                <div class="justify-content-between d-inline-flex col-6">
                    <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Taper votre recherche ici" aria-label="Chercher">
                    <button type="button" class="btn btn-outline-success"><i class="icon-search"></i></button>
                </div>
                <div class="d-inline-flex justify-content-between col-4">
                    <select id="rech" name="rech" class="custom-select col-12">
                        <option selected disabled value="">Rechercher par</option>
                        <option value="etudiant">Etudiant</option>
                        <option value="sujet">Titre</option>
                        <option value="description">Description</option>
                        <option value="filiere">Contenu</option>
                    </select>
                </div>
            </nav>
            <div id="espace_search">
                <div id="div1">
                <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">#</th>
      <th scope="col">Titre</th>
      <th scope="col">Description</th>
      <th scope="col">Document</th>
    </tr>
  </thead>
  <tbody>
    <tr></tr>
    <tr></tr>
    <tr></tr>
  </tbody>
</table>


                </div>
            </div>
        </form>
    </div>
						</div>
                 </div>
                 </div>

@endsection