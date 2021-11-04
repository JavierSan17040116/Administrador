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
  <title>Administrador | Usuarios</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#233e8b;">
    <div class="container-fluid ">
      <a class="navbar-brand" href="#" style="color: white;">Administrador</a>
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

    <a class="apartados" href="../AdministrarUsuarios/">Administrar Usuarios</a><br>
    <a class="apartados" href="../AdministrarTareas/">Administrar Tareas</a><br>
    <a class="apartados" href="" style="pointer-events: none; color: grey;">Crear Tareas</a>
  </div>

  <div class="contenedor">
    <form class="row g-3 needs-validation" novalidate>
      <div class="col-md-4">
        <label for="validationCustom01" class="form-label">Identificador / Nombre de Tarea</label>
        <input type="text" class="form-control" id="validationCustom01" placeholder="Tarea 1" required>
        <div class="valid-feedback">
          Excelente!
        </div>
        <div class="invalid-feedback">
          Debes ingresar un nombre
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Area</label>
        <input type="text" class="form-control" id="validationCustom02" placeholder="Sistemas" required>
        <div class="invalid-feedback">
          Debes Ingresar el área
        </div>
        <div class="valid-feedback">
          Excelente!
        </div>
      </div>
      <div class="col-md-4">
        <label for="validationCustomUsername" class="form-label">Fecha de creación</label>
        <div class="input-group has-validation">
          <span class="input-group-text" id="inputGroupPrepend">📅</span>
          <input type="date" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Recuerda registrar la fecha de creación
          </div>
          <div class="valid-feedback">
            Excelente!
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <label for="validationCustom03" class="form-label">Comentarios</label>
        <input type="text" class="form-control" id="validationCustom03" placeholder="No es un campo necesario">

      </div>
      <div class="col-md-3">
        <label for="validationCustom05" class="form-label">Numero de Empleado</label>
        <input type="text" class="form-control" id="validationCustom05" required>
        <div class="invalid-feedback">
          Ingresa tu número de empleado
        </div>
        <div class="valid-feedback">
          Excelente!
        </div>

      </div>
      <div class="col-12">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Todos los campos son correctos
          </label>
          <div class="invalid-feedback">
            Debes asegurarte que todos los campos esten correctamente llenados
          </div>
        </div>
      </div>
      
      <button class="btn btn-block " style="background-color: #1eae98" type="submit">Registrar Tarea</button>
      
    </form>
  </div>
</body>
</html>
<script>
  (function () {
    'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  var forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.prototype.slice.call(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>