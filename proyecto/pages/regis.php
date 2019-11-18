<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        header('Location: http://localhost/proyecto/pages/home.php');        
    } else{
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            REGISTRO
        </h1>
        <form action="http://localhost/proyecto/pages/registro.php" method="post" enctype="multipart/form-data">
            <p>Usuario: <input type="text" name="usuario"></p>
            <p>Correo: <input type="text" name="correo"></p>
            <p>Nombre: <input type="text" name="nombre"></p>
            <p>Apellido 1: <input type="text" name="apellido1"></p>
            <p>Apellido 2: <input type="text" name="apellido2"></p>
            <p>Clave: <input type="text" name="clave"></p>
            <p>Genero: <br><input type="radio" name="genero" value="Hombre">Hombre<br>
                <input type="radio" name="genero" value="Mujer">Mujer</p>
            <p>Foto de perfil: <input type="file" name="imagen"></p>
            <p>Fecha de nacimiento: <input type="text" name="fecha_nacimiento"></p>
            <p><input type="submit" value="Registrarse"></p>
        </form>
    </body>
</html>
<?php
    }
?>