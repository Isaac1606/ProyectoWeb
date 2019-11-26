<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        $usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            ACTUALIZA DATOS
        </h1>
        <p><?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($_SESSION["imagen"]).'" height = "200" width = "200"/>';?><br></p>

        <form action="" method="post" enctype="multipart/form-data">
            <p>Nueva Foto:<br> <input type="file" name="imagen"></p>
            <p>Nuevo Usuario: <input type="text" name="usuario"></p>
            <p>Nuevo Clave: <input type="text" name="clave"></p>
            <p><input type="submit" name='update' value="Actualizar"></p>
        </form>
        <a href="home.php">Volver</a>
    </body>
</html>
<?php
    if(isset($_POST["update"])){
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
        $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
        if(isset($_FILES['imagen']['tmp_name'])){
            if($imagen==''){
                //no hace nada
            } else{
                $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
                $sql = "update usuario set imagen=? where id_usuario='$usuario';";
                $stmt = mysqli_prepare($conexion,$sql);
                mysqli_stmt_bind_param($stmt, "s",$imagen);
                if(mysqli_stmt_execute($stmt)){
                    $_SESSION['imagen'] = $imagen;
                    //header('Location: home.php');        
                } else{
                    echo "<script>alert('no se actualizo foto de perfil');</script>";     
                }
                //echo $sql;
            }
        } else{}

        if(isset($_POST["clave"])){
            if($_POST["clave"]==''){
                //no hace nada
            } else{
                $clave = $_POST['clave'];
                $sql = "update usuario set clave='$clave' where id_usuario='$usuario';";
                $res = mysqli_query($conexion, $sql);
            }
        } else{}

        if(isset($_POST["usuario"])){
            if($_POST["usuario"]==''){
                //no hace nada
            } else{
                $nuevo_usuario = $_POST['usuario'];
                $sql = "select id_usuario from usuario where id_usuario='$nuevo_usuario';";
                $res = mysqli_query($conexion, $sql);
                if(mysqli_affected_rows($conexion) > 0){
                    die("El nombre de usuario ya existe");
                    echo "<a href='home.php'>Volver</a>";
                } else{
                    $sql = "update usuario set id_usuario='$nuevo_usuario' where id_usuario='$usuario';";
                    $res = mysqli_query($conexion, $sql);
                    $sql = "update envio_imagen set id_usuario='$nuevo_usuario' where id_usuario='$usuario';";
                    $res = mysqli_query($conexion, $sql);

                    $_SESSION['usuario'] = $_POST['usuario'];
                }
            }
        } else{}
        //header('Location:home.php');

    } else{}

    } else{
        header('Location:index.php');
    }
    

?>