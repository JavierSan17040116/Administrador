<?php 

session_start();
define('CLAVE', '6Lcu_w8bAAAAABVfAvY93LA_ZrNg6OLYlFLS6EU1');
$token = $_POST['token'];
$action = $_POST['action'];
$cu = curl_init();
curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($cu, CURLOPT_POST,1);
curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($cu);
curl_close($cu);

$datos = json_decode($response, true);

if ($datos['success'] == 1 && $datos['score'] >=0.5)
{
	if ($datos['action'] == 'validarUsuario') 
	{
		$usuario = $_POST['usuario'];
		$password = $_POST['password'];

		require '../config/conexion.php';
		$query = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
		$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
		$user = mysqli_fetch_assoc($result);

		if ($user['tipo_usuario'] == 'Administrador')
		{	
			$_SESSION['usuario_'. $user['user_id']] = $usuario;
			header("Location: ../view/Administrador/AdministrarUsuarios/?id_user={$user['user_id']}");
		}
		elseif($user['tipo_usuario'] == 'Coordinador'){
			$_SESSION['usuario_'. $user['user_id']] = $usuario;
			header("Location: ../view/Coordinador/ListadoTareas/?id_user={$user['user_id']}");
		}elseif ($user['tipo_usuario'] == 'Trabajador') {
			$_SESSION['usuario_'. $user['user_id']] = $usuario;
			header("Location: ../view/Trabajador/?id_user={$user['user_id']}");
			
		}else
		{
			header('Location: ../view/DatosIncorrectos/');
		}
	}
}
?>