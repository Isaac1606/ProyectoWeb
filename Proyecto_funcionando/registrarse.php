<?php
    include("configuraBD.php");
    $nombre = $_POST['nombre'];
    $apellidoP = $_POST['apellidoP'];
    $apellidoM = $_POST['apellidoM'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $fecha = $_POST['fecha'];
    $genero = $_POST['sexo'];

    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    $sql = "insert into usuario values ('$usuario','$email','$nombre','$apellidoP','$apellidoM','$clave','$genero',?,'$fecha',curdate(),'admin')";
    $stmt = mysqli_prepare($conexion,$sql);
    mysqli_stmt_bind_param($stmt, "s",$imagen);
    if(mysqli_stmt_execute($stmt)){
        mysqli_close($conexion);
        header("Location: index.php");

    } else{
        mysqli_close($conexion);
        header('Location: formulario.php');
    }
?>