<?php

include("configuraBD.php");

$id_usuario = $_POST['id_usuario'];
$sql = "delete from usuario where id_usuario='$id_usuario';";
echo $result = mysqli_query($conexion,$sql);

?>