<?php

include("configuraBD.php");
session_start();
$usuario = $_SESSION['usuario'];
$id_usuario = $_POST['id_usuario'];
$sql = "update usuario set tipo='normal' where id_usuario='$id_usuario' and id_usuario!='$usuario';";
echo $result = mysqli_query($conexion,$sql);

?>