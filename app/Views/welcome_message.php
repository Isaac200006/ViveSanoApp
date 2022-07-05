<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap CSS -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.10/dist/sweetalert2.all.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script defer src="https://kit.fontawesome.com/3baea3c6d3.js"></script>
	<title>VIVE SANO APP
	</title>
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container-fluid">
				<a id="menu" class="navbar-brand" href="<?= base_url(); ?>">VIVE SANO</a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">

						<li class="nav-item">
							<a id="menu" class="nav-link active" aria-current="page" href="<?= base_url(); ?>">Inicio</a>
						</li>
						<?php
						if (session()->get('username')) {

						?>
							<div class="dropdown">
								<button id="menu" class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									<?= session()->get('username'); ?>
								</button>
								<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

									<li><a class="dropdown-item" href="<?= site_url('auth/logout'); ?>">Cerrar sesión</a></li>
								</ul>
							</div>
						<?php } ?>
						<?php
						if (session()->get('rol') == 0) {
						?>
							<li><a id="menu" class="nav-link active" href="<?= site_url('auth/index2'); ?>">Tabla Usuarios</a></li>
						<?php } ?>

						<li class="nav-item">
							<a id="menu" class="nav-link active" href="<?= site_url('rutina/index2'); ?>">Sobre nosotros</a>
						</li>
					</ul>

				</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<?php
		if (isset($contenido)) {
			echo view($contenido); //carga la vista
		} else { ?>

			<body>
				<h3 style="text-align: center;"> <b> ¡ Bienvenido a VIVE SANO <?= (session()->get('username')) ?> :) !</b></h3>
				<br>
				<div class="container-fluid">


				</div>

				<br><br>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-3">


							<a id="imc" class="btn btn-outline-dark" href="<?= site_url('historico/index'); ?>">Verifica tu IMC</a>
						</div>
						<div class="col-md-4">
							<a id="ejercicio" class="btn btn-outline-dark" href="<?= site_url('rutina/index'); ?>">Tipos de Ejercicios</a>
						</div>
						<div class="col-md-3">
							<a id="alimento" class="btn btn-outline-dark" href="<?= site_url('alimentacion/index'); ?>">Tipos de Alimentacion</a>

						</div>
						<div class="col-md-2">
							<a id="historico" class="btn btn-outline-dark" href="<?= site_url('historico/historico'); ?>">Tu Historico IMC</a>

						</div>
					</div>
				</div>
				<br>
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<img id="img-body" src="https://mejorconsalud.as.com/wp-content/uploads/2016/03/9-secretos-para-conseguir-el-cuerpo-y-la-salud-que-deseas.jpg" alt="">
						</div>
					</div>
				</div>
				<br>
				<h3 style="text-align: center;"> <b> NOTA</b></h3>

				<div class="container-fluid">
					<p class="parrafo"> <b> En nuestra plataforma podrás obtener información sobre tu IMC (Indice de Masa Corporal),
							el cual te ayudara a enterarte si estas en un peso normal o si necesitas bajar, en VIVE SANO
							te ayudamos a bajar de peso en dicho caso que nuestro programa te diga que lo necesitas.
							VIVE SANO les facilita la información que ayudara a controlar su problema de sobre peso,
							donde dispondrán de rutinas de ejercicio y plan de alimentación saludable.
							<br> <br> Un cuerpo sano influye directamente en tu bienestar diario y la manera en la que puedas envejecer.
							Una buena alimentación y el ejercicio constante favorece que tengamos una circulación y digestión eficientes y una buena fuerza muscular y en los huesos.

						</b></p>


				</div>


	</div>


</body>
<style>
	h1 {
		text-align: center;
		color: black;
	}

	#imc {
		margin-left: 40px;
	}




	.parrafo {
		text-align: justify;
		width: 1020px;
		margin-left: 40px;
		margin-bottom: 30px;
	}

	.btnCliente {

		width: 20%;
		margin-left: 39.5%;
		margin-bottom: 3%;
		border-radius: 5%;
		padding: 5px;

	}

	.btnCliente:hover {
		background-color: green;
	}

	h3 {

		margin-top: 30px;

	}




	#img-body {
		margin-left: 40px;
		width: 1020px;
		height: 500px;
		border: solid 1px black;
	}
</style>

<?php } ?>
</div>





<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
</body>
<!-- Footer -->
<!-- Footer -->
<footer class="page-footer font-small unique-color-dark">

	<div style="background-color: #6351ce;">
		<div class="container">

			<!-- Grid row-->
			<div class="row py-4 d-flex align-items-center">

				<!-- Grid column -->
				<div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
					<h6 class="mb-0"> <b> ¡Conéctate con nosotros en las redes sociales!</b></h6>
				</div>
				<!-- Grid column -->

				<!-- Grid column -->
				<div class="col-md-6 col-lg-7 text-center text-md-right">

					<!-- Facebook -->
					<a class="fb-ic">
						<i class="fab fa-facebook-f white-text mr-4"> </i>
					</a>
					<!-- Twitter -->
					<a class="tw-ic">
						<i class="fab fa-twitter white-text mr-4"> </i>
					</a>
					<!-- Google +-->
					<a class="gplus-ic">
						<i class="fab fa-google-plus-g white-text mr-4"> </i>
					</a>
					<!--Linkedin -->
					<a class="li-ic">
						<i class="fab fa-linkedin-in white-text mr-4"> </i>
					</a>
					<!--Instagram-->
					<a class="ins-ic">
						<i class="fab fa-instagram white-text"> </i>
					</a>

				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row-->

		</div>
	</div>

	<!-- Footer Links -->
	<div class="container text-center text-md-left mt-5">

		<!-- Grid row -->
		<div class="row mt-3">

			<!-- Grid column -->
			<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

				<!-- Content -->
				<h6 class="text-uppercase font-weight-bold">Compañia vive sano</h6>
				<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
				<p>ViveSano es una compañia regidad por un grupo de ingenieros con el fin de proveer un servicio
					a la comunidad, esto con el fin de ayuda a todas aquellas personas las cuales no saben
					de que manera llevar una vida sana.

				</p>

			</div>
			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

				<!-- Links -->


			</div>
			<!-- Grid column -->

			<!-- Grid column -->

			<!-- Grid column -->

			<!-- Grid column -->
			<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

				<!-- Links -->
				<h6 class="text-uppercase font-weight-bold">CONTACTOS</h6>
				<hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
				<p>
					<i class="fas fa-home mr-3"></i> Barranquilla-Colombia
				</p>
				<p>
					<i class="fas fa-envelope mr-3"></i> vivesano@gmail.com
				</p>
				<p>
					<i class="fas fa-phone mr-3"></i> 310 234 5678
				</p>
				<p>
					<i class="fas fa-print mr-3"></i> 316 234 5679
				</p>

			</div>
			<!-- Grid column -->

		</div>
		<!-- Grid row -->

	</div>
	<!-- Footer Links -->

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2020 Copyright:
		<a href="#"> vivesano.com</a>
	</div>
	<!-- Copyright -->

</footer>
<!-- Footer -->

<style>
	#menu:hover {
		color: #33E9FF;
	}


	body {
		background: #ADA996;
		/* fallback for old browsers */
		background: -webkit-linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
		/* Chrome 10-25, Safari 5.1-6 */
		background: linear-gradient(to right, #EAEAEA, #DBDBDB, #F2F2F2, #ADA996);
		/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

	}

	* {
		font-family: 'Red Hat Display', sans-serif;

	}
</style>

</html>