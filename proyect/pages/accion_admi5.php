<?php
session_start();

if(isset($_SESSION["usuario"]) and $_SESSION['tipo'] == "admin"){
    $usuario = $_GET['usuario'];
    $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
    $sql = "update usuario set tipo='admin' where id_usuario='$usuario'";
    if(mysqli_query($conexion, $sql)){
        mysqli_close($conexion);
        header('Location: alta_admin.php'); 
    } else {
        die ("Error al realizar consulta");
        echo '<a href="admin.php"><br>Volver</a>';
    }

} else if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] != "admin"){
    echo "<p>No es administrador</p>";
    echo '<a href="home.php"><br>Volver</a>';

} else{
    header('Location: index.php');        
}
?>