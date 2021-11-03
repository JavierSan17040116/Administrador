<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="../../public/assets/css/style_correo.css" />
   
<title>Recuperar contraseña</title>
</head>
<body> 
<form action="codigo.php" method="post" >
<div class="parent-wrapper">
<h4>Comprueba si has recibido un mensaje con tu código, que debe tener seis digitos, en el correo electrónico: 
    <?php 

	session_start();
    if (isset($_SESSION['email'])) {
	echo $_SESSION['email'];
    }
    else {
        header('location: index.php');
     }

	 ?>
      </h4>
  <span class="close-btn glyphicon glyphicon-remove"></span>
  <div class="subscribe-wrapper">
  <h4>Recuperar contraseña</h4>    
   <h3>Introduce el código de seguridad:</h3>
   <input type="number" name="cod" class="subscribe-input" placeholder="Codigo" pattern="[0-9]+" maxlength="6" >
    <br><br>
    <input type="submit" class="submit-btn" name="validar"/>
    <br>
    <br> 
   
    </div>
</div>
</from>

<?php
//require de conexion
//session_start();
require_once 'Cofig.php';
//validar el codigo en base de datos
if (isset($_POST['validar'])) {
$codigo=$_POST['cod'];
$correo=$_SESSION['email'];
$conexion= new conexion();
//query de consulta
$query= $conexion->prepare('SELECT * FROM usuarios WHERE Codigo=:co AND Correo=:email');
$query->bindParam(':co',$codigo); 	
$query->bindParam(':email',$correo);   
$query->execute();
$count=$query->rowCount();
if ($count==1) {
    $_SESSION['co']=$codigo; 
   // echo $count;
    header("Location:modifica_contraseña.php");
}
else
{   
//Alerta decorreo
   echo '<script language="javascript">';
   echo 'alert("El Codigo No existe En la Base De Datos, Revisa bien tu correo")';
   echo '</script>';
}
}
?>







    
</body>
</html>