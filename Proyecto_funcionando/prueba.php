<?php

include("configuraBD.php");
session_start();
$usuario = $_SESSION['usuario'];

$sql = "insert into envio_imagen values (0,4,'$usuario','1','1',curdate());";
$res = mysqli_query($conexion,$sql);

if(mysqli_affected_rows($conexion) == 1){
    $sql = "update imagen set envios = envios+1 where id_imagen=5;";
    $res = mysqli_query($conexion,$sql);
}
?>