<?php

include("configuraBD.php");
session_start();
$usuario = $_SESSION['usuario'];
$archivo = file_get_contents($_FILES['archivo']['tmp_name']);
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

$sql = "insert into imagen values (0,'$usuario','$nombre','$descripcion',?,curdate(),0);";

//$sql = "insert into imagen values (0,'$usuario','$nombre','$descripcion',?,curdate());";
$stmt = mysqli_prepare($conexion,$sql);
mysqli_stmt_bind_param($stmt, "s",$archivo);

if(mysqli_stmt_execute($stmt)){

    $sql = "select MAX(id_imagen) from imagen;";
    $res = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($res);

        if(isset($_POST['fiestas'])){
            $sql = "insert into categoria values($row[0],'fiestas_religiosas');";
            $res = mysqli_query($conexion,$sql);
        } 
        if(isset($_POST['sentimientos'])){
            $sql = "insert into categoria values($row[0],'sentimientos');";
            $res = mysqli_query($conexion,$sql);
        } 
        if(isset($_POST['felicidades'])){
            $sql = "insert into categoria values($row[0],'felicidades');";
            $res = mysqli_query($conexion,$sql);
        } 
        if(isset($_POST['festejos'])){
            $sql = "insert into categoria values($row[0],'festejos');";
            $res = mysqli_query($conexion,$sql);
        } 

    mysqli_close($conexion);
    header('Location: imagenes.php');
} else{
    mysqli_close($conexion);
    //mensaje de error
    echo("Error al subir imagen");
}


?>