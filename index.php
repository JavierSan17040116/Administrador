<!doctype html>
	<html lang="en" class="no-focus">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>Inicio de Sesión</title>
	<meta name="description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
	<meta name="author" content="pixelcave">
	<meta name="robots" content="noindex, nofollow">
	<meta property="og:title" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework">
	<meta property="og:site_name" content="Codebase">
	<meta property="og:description" content="Codebase - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
	<meta property="og:type" content="website">
	<meta property="og:url" content="">
	<meta property="og:image" content="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
	<script src="public/assets/js/scroll.js"></script>	
	<link rel="stylesheet" id="css-main" href="public/assets/css/scroll.css">
    <meta name="description" content="Carrousel">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="shortcut icon" href="public/assets/img/favicons/administrador-icon.png">
	<link rel="stylesheet" id="css-main" href="public/assets/css/codebase.min.css">
	<script src="https://www.google.com/recaptcha/api.js?render=6Lcu_w8bAAAAABQ-1qqfkcozriwgqfPv-hrxlKp4"></script>
	<script src="public/assets/js/Eventosdelmouse.js"></script>
	<script src="public/assets/js/scroll.js"></script>
	<script>
		$(document).ready(function()
		{
			$('#acceder').click(function(){
				grecaptcha.ready(function() {
					grecaptcha.execute('6Lcu_w8bAAAAABQ-1qqfkcozriwgqfPv-hrxlKp4', {action: 'validarUsuario'}).then(function(token) {
						$('#login').prepend('<input type="hidden" name="token" value="'+token+'">');
						$('#login').prepend('<input type="hidden" name="action" value="validarUsuario">');
						$('#login').submit();
					});
				});
			})
		})
	</script>
</head>
<body > 

	<div id="page-container" class="main-content-boxed">
		<main id="main-container">
			<div id="cambiarimg"class="bg-image" style="background-image: url('public/assets/img/photos/index.jpg');">

				<div class="row mx-0 bg-black-op">
					<div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
						<div class="p-30 invisible" data-toggle="appear">
					
							<p class="font-size-h3 font-w600 text-white">
								Administrador de Tareas
							</p>
							<p class="font-italic text-white-op">
								Copyright &copy; <span class="js-year-copy"></span>
							</p>
						</div>
					</div>
					<div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
						<div class="content content-full">
							<!-- Header -->
							<div class="px-30 py-10">
							
								<h1 class="h3 font-w700 mt-30 mb-10">Control de Actividades</h1>
								<h2 class="h5 font-w400 text-muted mb-0">Iniciar Sesión</h2>
							</div>

							<form id="login" class="js-validation-signin px-30" action="models/iniciar_sesion.php" method="post">
								<div class="form-group row">
									<div class="col-12">
										<div class="form-material floating">
											<input type="text" class="form-control" id="login-username" name="usuario" required="">
											<label for="login-username">Usuario / Id Usuario</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12">
										<div class="form-material floating">
											<input type="password" class="form-control" id="login-password" name="password" required="">
											<label for="login-password">Contraseña</label>
										</div>
									</div>
								</div>
								<div class="form-group row">
								</div>
								<div class="form-group">
									<button id="acceder"  type="button" class="btn btn-sm btn-block btn-hero btn-alt-primary"><i class="si si-login mr-10"></i> Acceder</button>
									<!--<button class="g-recaptcha btn btn-primary" 
									data-sitekey="6Lcu_w8bAAAAABQ-1qqfkcozriwgqfPv-hrxlKp4" 
									data-callback='onSubmit' 
									data-action='submit'>Acceder</button>-->
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</main>
	</div>
	<script src="public/assets/js/core/jquery.min.js"></script>
	<script src="public/assets/js/core/popper.min.js"></script>
	<script src="public/assets/js/core/bootstrap.min.js"></script>
	<script src="public/assets/js/core/jquery.slimscroll.min.js"></script>
	<script src="public/assets/js/core/jquery.scrollLock.min.js"></script>
	<script src="public/assets/js/core/jquery.appear.min.js"></script>
	<script src="public/assets/js/core/jquery.countTo.min.js"></script>
	<script src="public/assets/js/core/js.cookie.min.js"></script>
	<script src="public/assets/js/codebase.js"></script>
	<script src="public/assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
	<script src="public/assets/js/pages/op_auth_signin.js"></script>
	
</body>
<div id="page-container" class="main-content-boxed">    
        <div id="sliderControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="public/assets/img/photos/index5.jpg" alt="background 1">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="public/assets/img/photos/index4.jpg" alt="background 2">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="public/assets/img/photos/index3.jpg" alt="background 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#sliderControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#sliderControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>





<footer style="background-color: #ffffc7 ;">
	<div  class="container">
	<br>
		<div class="row">
			<div  class="col-md-4">
				<h4 style="color: black"><b>Contáctanos</b></h4>
				<h6 style="color: black"><b>Teléfono:</b>844-528-14-96</h6>
				<h6 style="color: black"><b>Correo:</b>adaministradorutc2021@gmail.com</h6>
			</div>
			<div class="col-md-4">
				<h4 style="color: black"><b>Plataforma</b></h4>
				<a href=""><h6 style="color: black">Creadores</h6></a>
				<a href=""><h6 style="color: black">Comunidad</h6></a>
				<a href=""><h6 style="color: black">Buzón</h6></a>
				<a href=""><h6 style="color: black">Redes Sociales</h6></a>
			</div>
			<div class="col-md-4">
				<h4 style="color: black"><b>Recursos</b></h4>
				<a href=""><h6 style="color: black">Ayuda</h6></a>
				<a href=""><h6 style="color: black">Soporte</h6></a>
				<a href=""><h6 style="color: black">Terminos de Uso</h6></a>
				<a href=""><h6 style="color: black">Privacidad</h6></a>
				<a href=""><h6 style="color: black">Licencia</h6></a>
			</div>
		</div>
	</div>
</footer>

<a class="ir-arriba" javascript:void(0) title="Volver arriba">
<img src="public/assets/img/photos/arriba.png">
  <span class="fa-stack">
   
  </span>
</a>


</html>
