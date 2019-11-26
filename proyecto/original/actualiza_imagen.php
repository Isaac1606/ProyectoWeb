<?php

include("configuraBD.php");

$id_imagen = $_POST['id_imagen'];
$nombre_imagen = $_POST['nombre_imagen'];
$descripcion = $_POST['descripcion'];

$sql = "update imagen set nombre_imagen='$nombre_imagen',descripcion='$descripcion',fecha_subida=curdate() where id_imagen = $id_imagen;";
echo $result = mysqli_query($conexion,$sql);

?>