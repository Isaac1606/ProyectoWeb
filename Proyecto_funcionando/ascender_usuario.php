<?php

include("configuraBD.php");

$id_usuario = $_POST['id_usuario'];
$sql = "update usuario set tipo='admin' where id_usuario='$id_usuario';";
echo $result = mysqli_query($conexion,$sql);

?>