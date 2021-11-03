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
<form action="index.php" method="post" >
<div class="parent-wrapper">
  <span class="close-btn glyphicon glyphicon-remove"></span>
  <div class="subscribe-wrapper">
    <h4>Recuperar contraseña</h4>
    <h3>Escribe tu correo:</h3>
    <input type="email" name="email" class="subscribe-input" placeholder="Correo Electronico"  pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}">
    <br><br>
    <input type="submit" class="submit-btn" name="co"/>

  </div>
</div>


</from>




<?php
//require de conexion
 session_start();
 require_once 'Cofig.php';
 //validar el correo en base de datos
if(isset($_POST["co"]))
{
    //correo:
    $correo= $_POST["email"];
    // codigo genarado automatico:
    $num_str = sprintf("%06d", mt_Rand(2, 999999));
    //conexion:
    $conexion= new conexion();
    //query de consulta
    $query= $conexion->prepare('SELECT * FROM usuarios WHERE Correo=:email');
    $query->bindParam(':email',$correo);
    $query->execute();
    $count=$query->rowCount();
    if ($count) {
    //Guarda codigo en basse de datos
    $query =$conexion->prepare('UPDATE usuarios set Codigo=:codigo WHERE Correo=:email');
    $query->bindParam(':email',$correo);
    $query->bindparam(':codigo',$num_str);    
    $query->execute();
    //Enviar correo:
    $para= $correo;
    $asunto    = 'Codigo de seguridad de Cambio de Contraseña';
    $descripcion   = ' Recientemente se envió una solicitud para restablecer una contraseña para su cuenta. Si esto fue un error, simplemente ignore este correo electrónico y no pasará nada. Para restablecer su contraseña su codigo es:  ' .  $num_str ;
    $de = 'From: adaministradorutc2021@gmail.com' . "\r\n" .
    'Reply-To: adaministradorutc2021@gmail.com' . "\r\n" .
    'X-Mailer: PHP/'. phpversion();   
    if (mail($para, $asunto, $descripcion, $de))
       {
        //pagina de codigo  
        $_SESSION['email']=$correo; 
        header("Location:codigo.php");
         }
        }
    else
 	    {   
         //Alerta decorreo
            echo '<script language="javascript">';
            echo 'alert("El Correo No Corresponde A Ningún Usuario")';
            echo '</script>';
	    }

   
}

?>



    
</body>
</html>