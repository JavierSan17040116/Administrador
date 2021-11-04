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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
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
    <a class="apartados" href="" style="pointer-events: none; color: grey;" >Administrar Usuarios</a><br>
    <a class="apartados" href="../AdministrarTareas/index.php?id_user=<?php echo intval($_GET['id_user']) ?>">Administrar Tareas</a><br>
    <a class="apartados" href="../CrearTareas/index.php?id_user=<?php echo intval($_GET['id_user']) ?>">Crear Tareas</a>
  </div>

  <div class="contenedor">
    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
      <div class="input-group">
        <div class="input-group-text" id="btnGroupAddon2">🔎</div>
        <input type="text" class="form-control" placeholder="Buscar Usuario" aria-label="Input group example" aria-describedby="btnGroupAddon2">
      </div>
      <div class="btn-group" role="group" aria-label="First group">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#ModalRegistrar">
          Agregar Usuario
        </button>
      </div>
    </div><br>
    <div class="container">
      <div class="modal fade" id="ModalRegistrar">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Registro de Usuario</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
              <form class="form-group" action="../../../models/registrar_usuario.php" method="post">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Nombres</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Ej. Juan Arturo" name="nombre" required="">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Apellidos</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Ej. Perez Martinez" name="apellidos" required="">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Usuario</span>
                  </div>
                  <input type="text" class="form-control" placeholder="Ej. Jperez" name="usuario" style="margin-right: 25px;" required="">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Contraseña</span>
                  </div>
                  <input type="password" class="form-control" placeholder="" name="password" style="margin-right: 25px;" required="">
                </div>
                <div class="input-group mt-3 mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Tipo de Usuario</span>
                  </div>
                  <select name="tipo_usuario" id="" class="form-control" style="margin-right: 10px;"  required="">
                    <option value="">Seleccione...</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Coordinador">Coordinador</option>
                    <option value="Trabajador">Trabajador</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success btn-block" >Registrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <table class="table table-hover">
      <thead>
        <tr>
          <th>User ID</th>
          <th>Nombres</th>
          <th>Apellidos</th>
          <th>Usuario</th>
          <th>Correo</th>
          <th>Contraseña</th>
          <th>Permisos</th>
          <th><center>Accion</center></th>

        </tr>
      </thead>
      <tbody>
        <?php 
        include('../../../config/conexion.php');
        $usuarios = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexion,$usuarios);
        while ($dato = mysqli_fetch_array($resultado)) {
          ?>
          <tr>
            <td><?php echo $dato['user_id'] ?></td>
            <td><?php echo $dato['nombre'] ?></td>
            <td><?php echo $dato['apellidos'] ?></td>
            <td><?php echo $dato['usuario'] ?></td>
            <td><?php echo $dato['Correo'] ?></td>
            <td><?php echo $dato['password'] ?></td>
            <td><?php echo $dato['tipo_usuario'] ?></td>
            <td><center>
              <a href="../../../models/editar_usuario.php?user_id=<?php echo$dato['user_id'] ?>"  ><button class="btn btn-success" style="color: black">Editar</button></a>
              <a  href="../../../models/eliminar_usuario.php?user_id=<?php echo$dato['user_id'] ?>"button class="btn btn-danger" style="color: white" onclick="return ConfirmarEliminar()">Eliminar</button></a>
            </center></td>
          </tr>
        <?php } ?>
      </tbody>
    </table>


  </div>
</body>
</html>
<script type="text/javascript">
  function ConfirmarEliminar()
  {
    var respuesta = confirm("Una vez eliminado el usuario no se podran recuperar sus datos, ¿Desea continuar?");
    if (respuesta == true) 
    {
      return true;
    }
    else
    {
      return false;
    }
  }
</script>