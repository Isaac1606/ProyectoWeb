<?php
    session_start();
    if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html>
    <body>

<?php
    $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
    if(isset($_GET['categoria'])){
        $categoria = $_GET['categoria'];
        $sql = "select archivo from imagen where id_imagen in (select id_imagen from categoria where nombre_categoria = '$categoria')";
    } else{
        $sql = "select archivo from imagen";
    }
    $res = mysqli_query($conexion, $sql);

    while($row=mysqli_fetch_array($res)){
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row[0]).'" height="200" width="200"/>';
    } 
    echo '<a href="home.php"><br>Volver</a>';
    mysqli_close($conexion);
?>
    </body>
</html>
<?php
    } else{
        header('Location: index.php');        
    }
?>