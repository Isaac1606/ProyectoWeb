<?php

include("configuraBD.php");

$id = $_POST['id_imagen'];

$sql = "delete from imagen where id_imagen=$id;";
echo $result = mysqli_query($conexion,$sql);

?>