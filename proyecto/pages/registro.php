<?php
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $clave = $_POST['clave'];
    $genero = $_POST['genero'];
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $conexion = mysqli_connect("localhost","root","","proyecto") or die("Error al conectarse con la base de datos");
    $sql = "insert into usuario values ('$usuario','$correo','$nombre','$apellido1','$apellido2','$clave','$genero',?,'$fecha_nacimiento',curdate(),'normal')";
    $stmt = mysqli_prepare($conexion,$sql);
    mysqli_stmt_bind_param($stmt, "s",$imagen);
    if(mysqli_stmt_execute($stmt)){
        header('Location: http://localhost/proyecto/pages/login.php');        
    } else{
        header('Location: http://localhost/proyecto/pages/regis.php');        
    }
    mysqli_close($conexion);
?>

