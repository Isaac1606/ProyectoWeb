<?php

    include("configuraBD.php");
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $sql = "select correo,nombre,tipo,imagen from usuario where id_usuario = '$usuario' and clave = '$clave'";
    $res = mysqli_query($conexion, $sql);
    if(mysqli_affected_rows($conexion) == 1){
        session_start();
        $filas = mysqli_fetch_array($res,MYSQLI_BOTH);
        $_SESSION['usuario'] = $usuario;
        $_SESSION['correo'] = $filas[0];
        $_SESSION['nombre'] = $filas[1];
        $_SESSION['imagen'] = $filas[3];
        $_SESSION['tipo'] = $filas[2];
        mysqli_close($conexion);
        if($_SESSION['tipo']=='admin'){
            header('Location: detalles.php');
        }
        else{
            //mensaje bienvenido
            header('Location: index.php');
        }
    } else{
        //mensaje error
        mysqli_close($conexion);
        header('Location: index.php');       
    }
    mysqli_close($conexion);

?>