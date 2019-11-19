<?php
    session_start();
    if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] == "admin"){
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            ADMINISTRADOR
        </h1>
        <a href="sube_imagen.php"><br>Subir imagen</a>
        <a href="elimina_imagen.php"><br>Eliminar imagen</a>
        <a href="edita_imagen.php"><br>Editar imagen</a>
        <a href="baja_usuario.php"><br>Dar de baja usuario</a>
        <a href="alta_admin.php"><br>Dar de alta admin</a>
        <a href="baja_admin.php"><br>Dar de baja admin</a>
        <a href="detalles.php"><br>Detalles de pagina</a>
        <a href="cerrar.php"><br>Cerrar sesion</a>
        <a href="home.php"><br>Volver</a>

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