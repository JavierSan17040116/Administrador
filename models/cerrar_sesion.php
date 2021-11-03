<?php 
session_start();
$id = intval($_GET['id_user']);
if(isset($id))
{
$session_name= 'usuario_'. $id;
unset($_SESSION[$session_name]);
}
else{
    $_SESSION= array();
    session_destroy();
    session_start();
}
header('Location:../');
 ?>