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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include '../../controller/bootstrap.php'; ?>
  <link rel="stylesheet" type="text/css" href="../../public/assets/css/styles-button.css">
  <link rel="stylesheet" type="text/css" href="../../public/assets/css/styles-menu.css">
  <link rel="shortcut icon" href="../../public/assets/img/favicons/administrador-icon.png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Prouctos</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>

<body >
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center">Registro de Lasptos</h3>
                        <center>   <h6 class="nombre">Usuario: <?php 
    echo$resultados['nombre'];?> <?php echo$resultados['apellidos'];?></h6></center>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm">
                 
                            <div class="form-group">
                            <label for="">Codigo</label> <img src="https://img.icons8.com/cotton/64/000000/online-coding.png" width="30" height="30"/>  
                                 <input type="hidden" name="idp" id="idp" value="">
                             <input type="text" name="codigo" id="codigo" placeholder="Codigo" class="form-control" required="">
                            </div>
                            <div class="form-group">
                                <label for="">Nombre Lapto</label> <img src="https://img.icons8.com/fluency/48/000000/laptop.png " width="30" height="30"/>
                                <input type="text" name="producto" id="producto" placeholder="Marca" class="form-control">
                            </div>
                                                       <div class="form-group">
                                <label for="">Precio </label> <img src="https://img.icons8.com/doodle/48/000000/laptop--v1.png"width="30" height="30"/>
                                <input type="text" name="precio" id="precio" placeholder="Precio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad</label> <img src="https://img.icons8.com/color/48/000000/how-many-quest.png" width="30" height="30"/>
                                <input type="text" name="cantidad" id="cantidad" placeholder="cantidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="button" value="Registrar" id="registrar" class="btn btn-primary btn-block">
                                <br>    
                            <input onclick="location.href='https://localhost/administrador/administrador/'" type="button" value="Salir" id="Salir" class="btn btn-danger"/> <input type="button" value="Pagina Anterior" id="pagina" class="btn btn-danger"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 ml-auto">
                        <form action="" method="post">
                            <div class="form-group">
                               
                            <br>
                            <img src="../../public/assets/img/images/seo.png" width="30" height="30"> <label for="buscra">Buscar:</label>
                                   <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Codigo</th>
                            <th>Marca</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>