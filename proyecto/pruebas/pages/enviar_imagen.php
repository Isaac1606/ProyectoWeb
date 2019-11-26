<?php
session_start();
//echo $_SESSION['usuario'];
if(isset($_SESSION["usuario"])){
    $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
    $imagen = $_GET['imagen'];
    $sql = "select archivo from imagen where id_imagen = $imagen";
    $res = mysqli_query($conexion, $sql);
    $row=mysqli_fetch_array($res);
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row[0]).'" height="200" width="200"/>';
?>
<!DOCTYPE html>
<html>
    <body>
        <form action="" method="post">
            <p>Dedicatoria:<br> <input type="text" name="dedicatoria"></p>
            <p>Correo: <br> <input type="text" name="correo"></p>
            <p><input type="submit" name="envio" value="Enviar"></p>
            <a href="home.php"><br>Volver</a>
        </form>
    </body>
</html>
<?php
    if(isset($_POST["envio"])){
        $correo = $_POST['correo'];
        $usuario= $_SESSION['usuario'];
        $dedicatoria = $_POST['dedicatoria'];
        $sql = "insert into envio_imagen values(0,$imagen,'$usuario','$correo','$dedicatoria',curdate());";
        echo $sql;
        if($res = mysqli_query($conexion, $sql)){
            echo "ok";
        } else {
            echo "no";
        }
        mysqli_close($conexion);
        
    } else{
        //no hace nada
    }
} else{
    header('Location: index.php');        
}
?>