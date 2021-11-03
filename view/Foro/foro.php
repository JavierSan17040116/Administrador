<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Respuestas</title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#233e8b;">
		<div class="container-fluid ">
			
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-end" id="navbarNav" >
				<ul class="navbar-nav" >
					<li class="nav-item">
						<a class="nav-link animated-button thar-three" href="../Trabajador">Regresar</a>
					</li>
				</ul>
			</div>
		</div>
	</nav><br><br><br>
	<div class="container">
		<?php
		include("conexionBd.php");
		if(isset($_GET["id"]))
			$id = $_GET['id'];
		$query = "SELECT * FROM  foro WHERE ID = '$id' ORDER BY fecha DESC";
		$result = $mysqli->query($query);
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$id = $row['ID'];
			$titulo = $row['titulo'];
			$autor = $row['autor'];
			$mensaje = $row['mensaje'];
			$fecha = $row['fecha'];
			$respuestas = $row['respuestas'];

			echo "<h4>".$titulo."</h4>";
			
			echo "<h5>".$autor."</h5>";
			echo $mensaje;
			echo "<br /><br /><a href='formulario.php?id&respuestas=$respuestas&identificador=$id'>Responder</a><br />";


		}?>
		<div class="container">
			<?php  	
			$query2 = "SELECT * FROM  foro WHERE identificador = '$id' ORDER BY fecha DESC";
			$result2 = $mysqli->query($query2);
			echo "<h3><br />respuestas:<br /><br /></h3>";
			while($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
				$id = $row['ID'];
				$titulo = $row['titulo'];
				$autor = $row['autor'];
				$mensaje = $row['mensaje'];
				$fecha = $row['fecha'];
				$respuestas = $row['respuestas'];

				echo "<tr><td>$titulo</tr></td>";
				echo "<table>";
				echo "<tr><td>autor: $autor</td></tr>";
				echo "<tr><td>$mensaje</td></tr>";
				echo "</table>";
				echo "<br /><br /><a href='formulario.php?id&respuestas=$respuestas&identificador=$id'>Responder</a><br />";
			}
			?>
		</div>
	</div>
</body>
</html>