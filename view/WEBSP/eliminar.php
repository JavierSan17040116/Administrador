<?php
    $data = file_get_contents("php://input");
    require "../../models/WEBSP/conexion.php";
    $query = $pdo->prepare("DELETE FROM productos WHERE id = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "ok";
?>