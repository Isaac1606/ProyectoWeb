<?php
session_start();

if(isset($_SESSION["usuario"]) and $_SESSION['tipo'] == "admin"){
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
            <p>Nueva descripcion:<br> <input type="text" name="descripcion"></p>
            <p>Nueva Categoria: <br></p>
            <input type = "checkbox" name = "categoria[]" value = "cat1"> Categoria 1 <br>
            <input type = "checkbox" name = "categoria[]" value = "cat2"> Categoria 2 <br>
            <input type = "checkbox" name = "categoria[]" value = "cat3"> Categoria 3 <br>
            <input type = "checkbox" name = "categoria[]" value = "cat4"> Categoria 4 <br>
            <p><input type="submit" name="edit" value="Editar"></p>
            <a href="admin.php"><br>Volver</a>
        </form>
    </body>
</html>
<?php
    if(isset($_POST["edit"])){
        
        if(isset($_POST['categoria'])){
            $sql = "delete from categoria where id_imagen = $imagen";
            if(mysqli_query($conexion, $sql)){
            } else{
                die("Error al subir categoria");
            }

            $categoria = $_POST['categoria'];
            for($i=0;$i<count($categoria);$i++){
                $sql = "insert into categoria values ($imagen,'$categoria[$i]')";
                if(mysqli_query($conexion, $sql)){
                } else{
                    die("Error al subir categoria");
                }
            }
        } else{
            //no cambio categoria
        }
        $descripcion = $_POST['descripcion'];
        $sql = "update imagen set descripcion = '$descripcion' where id_imagen = $imagen";
        $res = mysqli_query($conexion, $sql);
        mysqli_close($conexion);
        
    } else{
        //no hace nada
    }

} else if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] != "admin"){
    echo "<p>No es administrador</p>";
    echo '<a href="home.php"><br>Volver</a>';

} else{
    header('Location: index.php');        
}
?>