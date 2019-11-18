<?php
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
    $sql = "select correo,nombre,tipo,imagen from usuario where id_usuario = '$usuario' and clave = '$clave'";
    $res = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion) > 0){
        $filas = mysqli_fetch_array($res,MYSQLI_BOTH);
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['correo'] = $filas[0];
        $_SESSION['nombre'] = $filas[1];
        $_SESSION['tipo'] = $filas[2];
        $_SESSION['imagen'] = $filas[3];
        //echo $filas[0].$filas[1].$filas[2];
        header('Location: http://localhost/proyecto/pages/home.php');
    } else{
        header('Location: http://localhost/proyecto/pages/login.php');       
    }
    mysqli_close($conexion);
?>