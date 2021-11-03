<?php 

$conexion = mysqli_connect('localhost', 'root', '', 'administrador_tareas');
$listado=$_POST['listado'];

$sql="SELECT tarea FROM tareas WHERE area = '$listado'";
$result = mysqli_query($conexion,$sql);

$cadena="<select id='lista2' name='tarea' class='form-control'>";

while ($ver=mysqli_fetch_row($result)) {
	$cadena=$cadena."<option value='$ver[0]'>".utf8_encode($ver[0])."</option>";
}

echo $cadena."</select>";


?>