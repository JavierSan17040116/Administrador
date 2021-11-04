<?php 
include_once '../../config/conexion.php';
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
  <?php include '../../controller/bootstrap.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../public/assets/css/styles-button.css">
  <link rel="stylesheet" type="text/css" href="../../public/assets/css/styles-menu.css">
  <link rel="shortcut icon" href="../../public/assets/img/favicons/administrador-icon.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <title>Trabajador</title>
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
            <a class="nav-link animated-button thar-three" href="https://localhost/administrador/models/cerrar_sesion.php?id_user=<?php echo intval($_GET['id_user']) ?>" >Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="barra">
    <center><img class="logo" src="../../public/assets/img/photos/logo.png"></center><br>
    <h6 class="nombre"><?php 
    echo$resultados['nombre'];?> <?php echo$resultados['apellidos'];?></h6>
    <a class="apartados" href="../WEBSP/">Nueva Laptos</a><br>
    <a class="apartados" href="../Foro/" style="position: relative; top: 300px;">Foro | Comentarios</a><br>
    
  </div>

  <div class="contenedor">
    <center style="font-size: 25px;">Tarea Activa</center>
    <center><h1>Proximamente</h1></center>
    <form action="subir.php" method="POST" enctype="multipart/form-data">
   <center><h1> Guarda Tareas En La Nube:</h1>
<input type="file" name="archivos"/></center>
<br>
<center><p>
    <button type="sumbit">
        Enviar

    </button>
</p></center>

    <!--
    <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <?php unset($_SESSION['message']); } ?>

      <table class="table table-hover">
        <thead>
          <tr>
            <th>Area</th>
            <th>Tarea</th>
            <th>Comentarios</th>
            <th><center>Accion</center></th>
          </tr>
        </thead>
        <tbody>
          <?php 
          include('../../config/conexion.php');
          $variable = $resultados['user_id'];
          $usuarios = "SELECT * FROM tareas WHERE (status_tarea = '1') AND (user_id = '$variable')";
          $resultado = mysqli_query($conexion,$usuarios);
          while ($dato = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
              <td><?php echo $dato['area'] ?></td>
              <td><?php echo $dato['tarea'] ?></td>
              <td><?php echo $dato['comentarios'] ?></td>
              <td><center>
               <a href="../../models/finalizar_tarea.php?tarea_id=<?php echo$dato['tarea_id'];?>" ><button class="btn btn-danger" style="color: black">Finalizar Tarea</button></a>
             </center></td>
           </tr>
         <?php } ?>
       </tbody>
     </table> -->

    
  
   </div>

  



   <div class="contenedor">
     <center style="font-size: 25px;">Nuevas Tareas</center>
     <table class="table table-hover" id="tabla">
      <thead>
        <tr>
          <th>Area</th>
          <th>Tarea</th>
          <th>Fecha de Creación</th>
          <th>Comentarios</th>
          <th><center>Accion</center></th>
        </tr>
      </thead>
      <tbody>
        <?php 
        include('../../config/conexion.php');
        $usuarios = "SELECT * FROM tareas limit 1";
        $resultado = mysqli_query($conexion,$usuarios);
        while ($dato = mysqli_fetch_array($resultado)) {
          ?>
          <tr>
            <form id="f1" name="f1" action="../../models/estado_tarea.php?tarea_id=<?php echo$dato['tarea_id']?>&user_id=<?php echo $resultados['user_id']?>" method="POST">
              <td>
               <select name="area" class="form-control" id="lista_tareas">
                <option value="0">Seleccione...</option>
                <?php 
                include('../../config/conexion.php');
                $area = "SELECT DISTINCT area FROM tareas";
                $consulta = mysqli_query($conexion,$area);
                while ($ofs = mysqli_fetch_array($consulta)){
                  ?>
                  <?php echo '<option value="'.$ofs['area'].'">'.$ofs['area'].'</option>' ?>

                  <?php
                }
                ?>
                
              </select>
            </td>
            <td >
             <select id="listado_tareas_ots" name="project_name" class="form-control">
             </select>
           </td>
           <td>
             <?php echo $dato['fecha_creacion'] ?>
           </td>
         
          <td><?php echo $dato['comentarios'] ?></td>
          <td><center>

            <button class="btn btn-success" type="submit" style="color: black">Iniciar Tarea</button>

          </center></td>
        </form>
      </tr>
    <?php } ?>
  </tbody>
</table>
</div>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    recargarLista();
    $('#lista_tareas').change(function(){
      recargarLista();
    });
  })
</script>
<script type="text/javascript">
  function recargarLista(){
    $.ajax({
      type:"POST",
      url:"../../models/listado.php",
      data:"listado=" + $('#lista_tareas').val(),
      success:function(r){
        $('#listado_tareas_ots').html(r);
      }
    });
  }
</script>
