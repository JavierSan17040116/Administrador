<?php 
include_once '../../../config/conexion.php';
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
  <?php include '../../../controller/bootstrap.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../../public/assets/css/styles-button.css">
  <link rel="stylesheet" type="text/css" href="../../../public/assets/css/styles-menu.css">
  <link rel="shortcut icon" href="../../../public/assets/img/favicons/administrador-icon.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Coordinador | Listado de Tareas</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#233e8b;">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#" style="color: white;">Coordinador</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav" >
        <ul class="navbar-nav" >
          <li class="nav-item">
            <a class="nav-link animated-button thar-three" href="../../../">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="barra">
    <center><img class="logo" src="../../../public/assets/img/photos/logo.png"></center><br>
    <h6 class="nombre"><?php echo$resultados['nombre'];?> <?php echo$resultados['apellidos'];?></h6>
    <a class="apartados" href="#" style="pointer-events: none; color: grey;">Listado de Tareas</a><br>
    <a class="apartados" href="../TareasActivas/">Tareas Activas</a><br>
    <a class="apartados" href="../../Foro/" style="position: relative; top: 300px;">Foro | Comentarios</a><br>
    
  </div>

  <div class="contenedor">
    <div class="tabcontent">
      <br>
      <select id="mySelect" class="form-control" style="width:20%">
        <option value="">Filtrar...</option>
        <option value="Enlistada">Enlistada</option>
        <option value="Activa">Activa</option>
        <option value="Finalizada">Finalizada</option>
      </select><br>        
      <table class="table table-hover" >
        <thead>
          <tr>
            <th>Tarea</th>
            <th>Area</th>
            <th>Fecha de Creación</th>
            <th>Comentarios</th>
            <th>Status</th>
            <th>Accion</th>
          </tr>
        </thead>
        <tbody id="myTable">
          
        </tbody>
      </table>
    </div>
  </div>
</body>
<script>
  $(document).ready(function(){
    $("#mySelect").on("change", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>
</html>
