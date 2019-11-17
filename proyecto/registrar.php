<?php
    $usuario = "'".$_POST['usuario']."'";
    $correo = "'".$_POST['correo']."'";
    $nombre = "'".$_POST['nombre']."'";
    $apellido1 = "'".$_POST['apellido1']."'";
    $apellido2 = "'".$_POST['apellido2']."'";
    $clave = "'".$_POST['clave']."'";
    $genero = "'".$_POST['genero']."'";
    $fecha_nacimiento = "'".$_POST['fecha_nacimiento']."'";

    $conexion = mysqli_connect("localhost","root","","proyecto");
    if($conexion->connect_error){
        die("Error al conectarse con la base de datos: ".$conn->connect_error);
    }
    $sql = "insert into usuario values (".$usuario.",".$correo.",".$nombre.",".$apellido1.",".$apellido2.",".$clave.",".$genero.",".$fecha_nacimiento.",curdate(),'normal')";
    echo $sql;
    
    if(mysqli_query($conexion,$sql)){
        header('Location: http://localhost/proyecto/login.html');
        //echo "<script>alert('Registro_exitoso');</script>";
    } else{
        echo "<script>alert('Error');</script>";
    }
?>

