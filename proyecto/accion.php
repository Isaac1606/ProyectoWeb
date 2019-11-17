<?php
    $usuario = "'".$_POST['usuario']."'";
    $clave = "'".$_POST['clave']."'";
    $conexion = mysqli_connect("localhost","root","","proyecto");
    if($conexion->connect_error){
        die("Error al conectarse con la base de datos: ".$conn->connect_error);
    }
    $sql = "select * from usuario where id_usuario = ".$usuario." and clave = ".$clave;
    //echo $sql;
    $res = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($res)>0){
        session_start();
        $_SESSION['usuario'] = $_POST['usuario'];
        header('Location: http://localhost/proyecto/home.php');
    } else{
        header('Location: http://localhost/proyecto/login.html');        
    }
    mysqli_close($conexion);
?>