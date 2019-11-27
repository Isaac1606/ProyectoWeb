<?php

include("configuraBD.php");
session_start();
$usuario = $_SESSION['usuario'];
$id_usuario = $_POST['id_usuario'];
$sql = "delete from usuario where id_usuario='$id_usuario' and id_usuario!='$usuario' and tipo = 'normal';";
echo $result = mysqli_query($conexion,$sql);

?>