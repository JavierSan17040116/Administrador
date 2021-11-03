
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../public/assets/css/style_correo2.css" />
	<script>
//creamos un pequeña funcion la cual sera llamada desde el html
function validateForm() {
//capturamos el valor(value) de myfrom/fname 
    var x = document.forms["myForm"]["contra1"].value;
	//var y = document.forms["myForm"]["contra2"].value;
	//validamos para ver si existe un valor agregado al input
    if (x == "" ) {

// y si no fue agregado ninguna informacion que te mande un alert notificando que es obligatorio.
        alert("Debe completar los campos");
        return false;
    }
}
</script>
   
<title>Recuperar contraseña</title>
</head>
<body> 
<form  name="myForm" onsubmit="return validateForm()" action="modifica_contraseña.php" method="post" >
<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Recuperar contraseña</h1>
				<br>
				<p> Tu Correo es:
				<?php 
session_start();
if (isset($_SESSION['co'])!='') {
	echo $_SESSION['email'];
	echo "<br>";
	echo"Coidigo Enviado es: ";
	echo $_SESSION['co'];
}
else {
   header('location:https://localhost/administrador');
}

?> </p>
				<br>
				<p> Escribe Tu Nuva Contraseña: 
			
				</p>
				 <br>
			</div>

			<div class="login-form">
				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="Nueva Contraseña" id="login-pass" name="contra1">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" placeholder="Nueva Contraseña" id="login-pass" name="contra2">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>
				<input type="submit" lass="btn btn-primary btn-large btn-block" name="validar"/>

				<a class="login-link"href="cerrar.php">Regresar al inicio?</a>
			</div>
		</div>
	</div>
</from>


<?php 
//Validar Campos De contraseñas
if (isset($_POST['validar'])) {

    $codigo=$_SESSION['co'];
	$contrasena1=$_POST['contra1'];
	$contrasena2=$_POST['contra2'];
	
if ($contrasena1==$contrasena2) {
 //conexion:
 require_once 'Cofig.php';
 $conexion= new conexion();
   //Modificar Contraseña
   $query =$conexion->prepare('UPDATE usuarios set 	password=:pass WHERE Codigo=:codigo');
   $query->bindParam(':pass',$contrasena1);
   $query->bindparam(':codigo',$codigo);   
   $query->execute();
   echo '<script language="javascript">';
   echo 'alert("Contraseña Modificara")';
   echo '</script>';
   echo "<script language='javascript'>";
   echo "window.location='cerrar.php'";  
   echo "</script>";
}
else {

	echo '<script language="javascript">';
	echo 'alert("contraseña no son iguales")';
	echo '</script>';

 }
}


 ?> 







    
</body>
</html>