<?php
    session_start();
    if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] == "admin"){
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            SUBE IMAGEN
        </h1>
        <form action="accion_admi1.php" method="post" enctype="multipart/form-data">
            <p>Imagen: <input type="file" name="imagen"></p>
            <p>Descripcion: <input type="text" name="descripcion"></p>
            <input type = "checkbox" name = "categoria[]" value = "cat1"> Categoria 1 <br>
            <input type = "checkbox" name = "categoria[]" value = "cat2"> Categoria 2 <br>
            <input type = "checkbox" name = "categoria[]" value = "cat3"> Categoria 3 <br>
            <input type = "checkbox" name = "categoria[]" value = "cat4"> Categoria 4 <br>
            <p><input type="submit" value="Subir"></p>
        </form>
    </body>
</html>
<?php
    } else if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] != "admin"){
        echo "<p>No es administrador</p>";
        echo '<a href="home.php"><br>Volver</a>';
    } else{
        header('Location: index.php');        
    }
?>