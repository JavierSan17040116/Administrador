<?php 
include_once '../../config/conexion.php';
session_start();
$id= intval($_GET['id_user']);
$session_name='usuario_' . $id;
if (isset($_SESSION[$session_name])!='') {
$usuario=$_SESSION[$session_name];
$buscar=mysqli_query($conexion,"SELECT * FROM usuarios WHERE usuario = '$usuario';");
$resultados=mysqli_fetch_array($buscar);
}
else{
  header('location:https://localhost/administrador');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Nuevo Tema</title>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#233e8b;">
		<div class="container-fluid ">
		<h6 class="nombre">Usuario: <?php 
    echo$resultados['nombre'];?> <?php echo$resultados['apellidos'];?></h6>
			
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav" >
				<ul class="navbar-nav" >
					<li class="nav-item">
						<a class="nav-link animated-button thar-three" href="../Foro/index.php?id_user=<?php echo intval($_GET['id_user']) ?>">Regresar</a>
					</li>
				</ul>
			</div>
		</div>
	</nav><br><br><br>
	<?php
	if(isset($_GET["respuestas"]))
		$respuestas = $_GET['respuestas'];
	else
		$respuestas = 0;
	if(isset($_GET["identificador"]))
		$identificador = $_GET['identificador'];
	else
		$identificador = 0;
	?>

	<div class="container">
		<form name="form" action="agregar.php" method="post" class="form-group">
			<input type="hidden" name="identificador" value="<?php echo $identificador;?>">
			<input type="hidden" name="respuestas" value="<?php echo $respuestas;?>">

			Autor 
			<input type="text" name="autor" class="form-control">

			Titulo
			<input type="text" name="titulo" class="form-control">

			Mensaje
			<textarea name="mensaje" cols="50" rows="5" required="required" class="form-control"></textarea>
			<input type="submit" id="submit" name="submit" value="Enviar Mensaje">

		</form>
	</div>
</body>
</html>
