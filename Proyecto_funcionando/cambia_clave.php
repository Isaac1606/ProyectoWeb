<?php

include("configuraBD.php");
session_start();
$usuario = $_SESSION['usuario'];
$nueva = $_POST['nueva'];
$antigua = $_POST['antigua'];
if($nueva=='' or $antigua==''){}
else{

$sql = "select nombre from usuario where clave='$antigua' and id_usuario='$usuario'";
$res = mysqli_query($conexion,$sql);

if(mysqli_affected_rows($conexion) == 1){
$sql = "update usuario set clave = '$nueva' where id_usuario='$usuario';";
echo $res = mysqli_query($conexion,$sql);
}
}
?>