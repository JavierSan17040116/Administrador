<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<title>Foro</title>
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
		<a href="formulario.php"><button class="btn btn-secondary">Nuevo Tema</button></a>
	</div><br><br>
	<div class="container">
		<h3>Temas ya creados</h3>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th></th>
					<th>Titulo</th>
					<th>Fecha</th>
					<th>Respuestas</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include("conexionBd.php");
				$query = "SELECT * FROM  foro WHERE identificador= 0 ORDER BY fecha DESC";
				$result = $mysqli->query($query);
				while($row = mysqli_fetch_array($result)){
					$id = $row['ID'];
					$titulo = $row['titulo'];
					$fecha = $row['fecha'];
					$respuestas = $row['respuestas'];
					echo "<tr>";
					echo "<td><a href='foro.php?id=$id'><button class='btn btn-success'>Ver Tema</button></a></td>";
					echo "<td>$titulo</td>";
					echo "<td>".date("d-m-y,$fecha")."</td>";
					echo "<td>$respuestas</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
	</div>

</body>
</html>
