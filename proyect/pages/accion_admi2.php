<?php
session_start();

if(isset($_SESSION["usuario"]) and $_SESSION['tipo'] == "admin"){
    $imagen = $_GET['imagen'];
    //echo $imagen;
    $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
    $sql = "delete from imagen where id_imagen = $imagen";
    //echo $sql;
    $res = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    header('Location: elimina_imagen.php');        

} else if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] != "admin"){
    echo "<p>No es administrador</p>";
    echo '<a href="home.php"><br>Volver</a>';

} else{
    header('Location: index.php');        
}
?>