<!DOCTYPE html>
<html lang="en">
<head>
<title>Acceuil - Etudiants</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Course Project">
<meta name="viewport" content="width=device-width, initial-scale=1">
{{-- <link rel="icon" type="image/jpg" href="images/logoEnsa.jpg" style="width: 100px;height: 100px;" /> --}}
<link rel="shortcut icon" type="image/x-icon" href="images/landing_page/ensa_logo.png" style="width: 200px;height: 200px;" />
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="styles/responsive.css">
</head>
<body>

<div class="super_container">

	<!-- Header -->

	<header class="header d-flex flex-row">
		<div class="header_content d-flex flex-row align-items-center">
			<!-- Logo -->
			<div class="logo_container">
				<div class="logo">
					<img src="images/ensa.png" style="width:250px;height:80px;margin-left: -50px;" alt="">
					<span></span>
				</div>
			</div>

			<!-- Main Navigation -->
			<nav class="main_nav_container">
				<div class="main_nav">
					<ul class="main_nav_list">
						<li class="main_nav_item"><a href="/">Acceuil</a></li>
						<li class="main_nav_item"><a href="#Documents">Documents</a></li>
						<li class="main_nav_item"><a href="#Apropos">A propos</a></li>
						<li class="main_nav_item"><a href="#Evenements">Evénements</a></li>
						
					<!--	<li class="main_nav_item"><a href="elements.html">elements</a></li> -->
						<li class="main_nav_item"><a href="#Services">Services</a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="header_side d-flex flex-row justify-content-center align-items-center">
			<img src="images/phone-call.svg" alt="">
			<span>+212656200007</span>
		</div>

		<!-- Hamburger -->
		<div class="hamburger_container">
			<i class="fas fa-bars trans_200"></i>
		</div>

	</header>

	<!-- Menu -->
	<div class="menu_container menu_mm">

		<!-- Menu Close Button -->
		<div class="menu_close_container">
			<div class="menu_close"></div>
		</div>

		<!-- Menu Items -->
		<div class="menu_inner menu_mm">
			<div class="menu menu_mm">
				<ul class="menu_list menu_mm">
					<li class="menu_item menu_mm"><a href="#">Home</a></li>
					<li class="menu_item menu_mm"><a href="#">About us</a></li>
					<li class="menu_item menu_mm"><a href="courses.html">Courses</a></li>
					<li class="menu_item menu_mm"><a href="elements.html">Elements</a></li>
					<li class="menu_item menu_mm"><a href="news.html">News</a></li>
					<li class="menu_item menu_mm"><a href="contact.html">Contact</a></li>
				</ul>

				<!-- Menu Social -->

				<div class="menu_social_container menu_mm">
					<ul class="menu_social menu_mm">
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-pinterest"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-instagram"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
						<li class="menu_social_item menu_mm"><a href="#"><i class="fab fa-twitter"></i></a></li>
					</ul>
				</div>

				<div class="menu_copyright menu_mm">Colorlib All rights reserved</div>
			</div>

		</div>

	</div>

	<!-- Home -->

<!-- Home -->

<div class="home">



<!-- Hero Slider -->
<div class="hero_slider_container">
	<div class="hero_slider owl-carousel">

	<?php
         $i = 0;
         foreach($actualites as $row){
             $actives = '';
             if($i == 0){
                 $actives = 'active';
             }

			 ?>
		<!-- Hero Slide -->

		<div class="hero_slide" id="Slides">
		<div class="hero_slide_background <?= $actives; ?>" style="background-image:url(<?= $row['image_path']; ?>)">
		<img src="{{ URL::to('/image_path') }}/{{ $row->image_path }}"/>
        </div>
		<div class="hero_slide_container d-flex flex-column align-items-center justify-content-center">

			<div class="hero_slide_content text-center">
				<h2 data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut">
					<span><?= $row['description']; ?></span>
				</h2><br><br>
				<button data-animation-in="fadeInUp" data-animation-out="animate-out fadeOut" type="button" class="btn btn-warning" onclick="window.location.href = '<?= $row['lien']; ?>'" style="border-radius: 0px; opacity: 0.8;">
					Plus de détails..
				</button>
			</div>
	</div>

		</div>
		<?php $i++; }?>
	</div>

	<div class="hero_slider_left hero_slider_nav trans_200"><span class="trans_200">prev</span></div>
	<div class="hero_slider_right hero_slider_nav trans_200"><span class="trans_200">next</span></div>
</div>
{{-- ++++++++++++++++++++++++++++++ BOXEES +++++++++++++++++++++++++++++++++ --}}
<div class="hero_boxes">
	<div class="hero_boxes_inner">
		<div class="container">
			<div class="row">

				<div class="col-lg-4 offset-lg-2 hero_box_col">
					<div class="hero_box d-flex flex-row align-items-center justify-content-start">
						<img src="images/mortarboard.svg" class="svg" alt="">
						<div class="hero_box_content">
							<h2 class="hero_box_title">
								<a class="hero_box_title" href="{{ route('connexion') }}" style=" color: white;">
									Espace Etudiant
								</a>
							</h2>
							<a href="{{ route('connexion') }}" class="hero_box_link">Connexion</a>
							
						</div>
					</div>
				</div>

				<div class="col-lg-4  hero_box_col">
					<div class="hero_box d-flex flex-row align-items-center justify-content-start">
						<img src="images/earth-globe.svg" class="svg" alt="">
						<div class="hero_box_content">
							<h2 class="hero_box_title">
								<a class="hero_box_title" href="http://www.ensas.uca.ma/formations.html" style=" color: white;">
									Formations
								</a>
							</h2>
							<a href="http://www.ensas.uca.ma/formations.html" class="hero_box_link">voir plus</a>
							
						</div>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>

</div>



	{{-- *********************************** Documents ********************************** --}}

	<div class="services page_section" id="Documents">

		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Documents Partagés par l'Administration</h1>
					</div>
				</div>
			</div>

			<div class="row services_row">

				@foreach ($documents as $document)

				<div class="col-lg-4 service_item text-left d-flex flex-column align-items-start justify-content-start">
					<div class="icon_container d-flex flex-column justify-content-end">
						<a href="{{ route('documents.download',$document->id) }}" class="icon_container d-flex flex-column justify-content-end" style="margin: 0">							
							<img src="images/icons/mes_icones/download{{rand(1,10)}}.svg"  alt="Download">
						</a>
						
					</div>
					<h3>{{ $document->title }}</h3>
					<p>{{ $document->description }}</p>
				</div>
					
				@endforeach

				

			</div>
		</div>
	</div>

	{{-- *********************************** A Propos ********************************** --}}

	<div class="testimonials page_section" id="Apropos">
		<!-- <div class="testimonials_background" style="background-image:url(images/testimonials_background.jpg)"></div> -->
		<div class="testimonials_background_container prlx_parent">
			<div class="testimonials_background prlx" style="background-image:url(images/landing_page/ensa.jpg)"></div>
		</div>
		<div class="container">

			<div class="row" style="margin-top: 0; padding-top: 0;">
				<div class="col">
					<div class="section_title text-center">
						<h1>A Propos de nous !</h1>
					</div>
				</div>
			</div> 

			<div class="row">
				<div class="col-lg-10 offset-lg-1">

					<div class="testimonials_slider_container" style="">

						<!-- Testimonials Slider -->
						<div class="owl-carousel owl-theme testimonials_slider">

							<!-- Testimonials Item -->
							<div class="owl-item">
								
								<div class="testimonials_item text-center">
									<div class="quote" style="font-style: italic;">ENSA de Safi</div>
									<br>
									<p class="testimonials_text">

										L'Ecole Nationale des Sciences Appliquées de SAFI (ENSA Safi) est un établissement universitaire relevant de l’université Cadi Ayyad et sous la tutelle du ministère de l’enseignement supérieur et de la recherche scientifique. Elle fait partie du réseau des écoles nationales des sciences appliquées réparties sur l’ensemble du territoire national au niveau des grandes villes universitaires du pays. L'ENSAS est spécialisée dans tout ce qui concerne l’enseignement supérieur, la recherche scientifique et technique et la formation d’ingénieurs et des cadres ainsi que la formation continue.
											
									</p>
										
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/landing_page/ensa0.jfif" alt="">
										</div>
										
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								
								<div class="testimonials_item ">
									<div class="quote text-center" style="font-style: italic;">Objectifs</div>
									<br>
									<p class="testimonials_text">
										<ul class="testimonials_text" >
											<li class="testimonials_text">
												-&nbsp;&nbsp; La formation d’ingénieurs d’Etat sur les plans théorique et pratique en parfaite adéquation avec les besoins du développement industriel, économique et social aussi bien au niveau régional que national.
											</li><br>
											<li class="testimonials_text">
												-&nbsp;&nbsp; La mise en place d’une coopération et d’un partenariat avec les opérateurs industriels, économiques et sociaux au niveau de la région et à l’échelle internationale.
											</li><br>
											<li class="testimonials_text">
												-&nbsp;&nbsp; La dynamisation de la recherche scientifique et technique.
											</li>
										</ul>
									</p>
									<br>
								
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/landing_page/ensa0.jfif" alt="">
										</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							<div class="owl-item">
								
								<div class="testimonials_item  text-center ">
									<div class="quote" style="font-style: italic;">Formation</div>
									<br>
									<p class="testimonials_text">
										La formation offerte se caractérise par l’application d'un système pédagogique moderne et développé, basé sur des modules d’enseignement organisés durant des sessions semestrielles. Elle adopte également l’ouverture sur le milieu industriel et économique à travers les stages et le parrainage ainsi que l'intégration de l’enseignement des langues étrangères, les techniques d’expression et de communication
									</p>
									<br><br>
								
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/landing_page/ensa0.jfif" alt="">
										</div>
									</div>
								</div>
							</div>

							<!-- Testimonials Item -->
							{{-- <div class="owl-item">
								<div class="testimonials_item text-center">
									<div class="quote">“</div>
									<p class="testimonials_text">In aliquam, augue a gravida rutrum, ante nisl fermentum </p>
									<div class="testimonial_user">
										<div class="testimonial_image mx-auto">
											<img src="images/landing_page/ensa.jpg" alt="">
										</div>
										<div class="testimonial_name">james cooper</div>
										<div class="testimonial_title">Graduate Student</div>
									</div>
								</div>
							</div> --}}


						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

	{{-- *********************************** Evenement A venir ********************************** --}}

	<div class="events page_section" id="Evenements">
		<div class="container">

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1>Evénements à venir </h1>
					</div>
				</div>
			</div>

			<div class="event_items">

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">20</div>
									<div class="event_month">Juin</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Accès au ENSAs Maroc</a></div>
									
									<p>L'ENSA Safi partage une annonce relative à l'accès aux Ecoles Nationales des Sciences Appliquées au titre de l'année universitaire 2020/2021. Vous trouverez ICI les informations complémentaires.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image  text-center p-4" style="border-color: #FFB606; border-style: solid;">
									<img src="images/icons/mes_icones/welcome.svg" alt="Bienvenue !"  style=" width:80%; height:80%;">
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">26</div>
									<div class="event_month">Décembre</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content">
									<div class="event_name"><a class="trans_200" href="#">Résultats du concours de recrutement</a></div>
									<p>L'Ecole Nationale des Sciences Appliquées de Safi annonce le résultat défintif du concours de recrutement d'un Professeur Assistant spécialité Physiques appliquées, Session 29/11/2019 , vous trouverez ICI le résultat.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image  text-center p-4" style="border-color: #FFB606; border-style: solid;">
									<img src="images/icons/mes_icones/notes.svg" alt="Notes"  style=" width:80%; height:80%;">
								</div>
							</div>

						</div>
					</div>
				</div>

				<!-- Event Item -->
				<div class="row event_item">
					<div class="col">
						<div class="row d-flex flex-row align-items-end">

							<div class="col-lg-2 order-lg-1 order-2">
								<div class="event_date d-flex flex-column align-items-center justify-content-center">
									<div class="event_day">02</div>
									<div class="event_month">Septembre</div>
								</div>
							</div>

							<div class="col-lg-6 order-lg-2 order-3">
								<div class="event_content ">
									<div class="event_name"><a class="trans_200" href="#">Demandes de Transferts vers l'ENSA Safi</a></div>
									<p>Le dernier délais de dépôt des demandes de transfert vers l'ENSA Safi est le Lundi 02/09/2019 à 16h:00. La demande de transfert à télécharger ICI. Les demandes sont à déposer au sécrétariat du directeur adjoint au 1er étage du bâtiement administratif.</p>
								</div>
							</div>

							<div class="col-lg-4 order-lg-3 order-1">
								<div class="event_image text-center p-4" style="border-color: #FFB606; border-style: solid;" >
									<img src="images/icons/mes_icones/transfert.svg" alt="Transfert" style=" width:80%; height:80%;" >
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

	{{-- *********************************** Services ********************************** --}}

	<div class="events page_section" id="Services" style="background-color:#ffcb51;">
		<div class="container" >

			<div class="row">
				<div class="col">
					<div class="section_title text-center" style="color: black">
						<h1>Nos Services </h1>
					</div>
				</div>
			</div>

			<br><br><br><br><br><br><br><br>

		</div>
	</div>

	{{-- !!!!!!!! BOXES !!!!!!!!!!!--}}
	<div class="hero_boxes" >

		<div class="hero_boxes_inner">
			<div class="container">
				<div class="row">

					<div class="col-lg-4 hero_box_col mb-5">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/icons/mes_icones/service_prof_etudiant.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Services Professeur / Etudiant</h2>
								
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col mb-5">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/icons/mes_icones/service_preselection.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Service de Présélection</h2>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col mb-5">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/icons/mes_icones/service_formation.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Service de Formation Continue</h2>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col mb-5">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/icons/mes_icones/service_choix_filiere.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Gestion de Choix de Filière</h2>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col mb-5">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/mortarboard.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Gestion des PFEs</h2>
							</div>
						</div>
					</div>

					<div class="col-lg-4 hero_box_col mb-5">
						<div class="hero_box d-flex flex-row align-items-center justify-content-start">
							<img src="images/icons/mes_icones/service_stage.svg" class="svg" alt="">
							<div class="hero_box_content">
								<h2 class="hero_box_title">Gestion des Stages / Mini-Prjets</h2>
							</div>
						</div>
					</div>

				

					<br><br>

				</div>
			</div>
		</div>

	</div>


	<div class="events page_section"  style="background-color:#ffcb51">
		<div class="container" >

			<div class="row">
				<div class="col">
					<div class="section_title text-center">
						<h1> </h1>
					</div>
				</div>
			</div>

		</div>
	</div>


	<!-- Footer -->

	<footer class="footer">
		<div class="container">

			<!-- Newsletter -->

			<div class="newsletter">
				<div class="row">
					<div class="col">
						<div class="section_title text-center">
							<h1>S'abonner à Newsletter</h1>
							<p class="col-lg-4 offset-lg-4 mt-3">
								Abonnez-vous à notre newsletter si vous voulez vous tenir informé(e) de l’actualité et événements importants organisés à l'ENSA Safi.
							</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col text-center">
						<div class="newsletter_form_container mx-auto">
							<form action="post">
								<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-center">
									<input id="newsletter_email" class="newsletter_email" type="email" placeholder="Adresse Email..." required="required" data-error="Valid email is required.">
									<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">S'inscrire</button>
								</div>
							</form>
						</div>
					</div>
				</div>

			</div>

			<!-- Footer Content -->

			<div class="footer_content">
				<div class="row">

					<!-- Footer Column - About -->
					<div class="col-lg-4 footer_col">

						<!-- Logo -->
						<div class="logo_container">
							<div class="logo">
								<img src="images/landing_page/ensa0.jfif" width="100%" height="100%" alt="ensa">
							
	
							</div>
						</div>

						

					</div>

					<!-- Footer Column - Menu -->

					<div class="col-lg-3 footer_col">
						<div class="logo_container">
							<div class="logo">
								<span>ENSA de Safi</span>
							</div>
						</div>

						<div class="footer_column_content">
							<p class="footer_about_text">
								Université Cadi Ayyad. <br>
								Ecole Nationale des Sciences Appliquées Safi
							</p>
						</div>
					</div>


				

					<!-- Footer Column - Contact -->

					<div class="col-lg-5 footer_col">
						<div class="logo_container">
							<div class="logo">
								<span>Contact</span>
							</div>
						</div>
						<div class="footer_column_content">
							<ul>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/placeholder.svg" >
									</div>
									<span style="font-weight: bold;">Adresse</span> : Route Sidi Bouzid BP 63, 46000 - Safi, Maroc
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/icons/mes_icones/phone.svg">
									</div>
									<span style="font-weight: bold;">Téléphone: </span>+212 6 56 20 00 07
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/icons/mes_icones/fax.svg">
									</div>
									<span style="font-weight: bold;">Fax: </span>+212 24 66 80 12
								</li>
								<li class="footer_contact_item">
									<div class="footer_contact_icon">
										<img src="images/envelope.svg">
									</div>
									<span style="font-weight: bold;">Email: </span>ensasafi@gmail.com
								</li>
								
							</ul>
						</div>
					</div>

				</div>
			</div>

			<!-- Footer Copyright -->

			<div class="footer_bar d-flex flex-column flex-sm-row align-items-center">
				<div class="footer_copyright">
					<span>
						Copyright &copy; | <script>document.write(new Date().getFullYear());</script> All rights reserved | ENSAS - Moteur de recherche - SOLR <i class="fa fa-heart" aria-hidden="true"></i>
					</span>
				</div>
				
			</div>

		</div>
	</footer>

</div>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
