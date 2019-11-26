<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        header('Location: home.php');        
    } else{
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            LOGIN
        </h1>
        <form action="accion.php" method="post">
            <p>Usuario: <input type="text" name="usuario"></p>
            <p>Clave: <input type="text" name="clave"></p>
            <p><input type="submit" value="Entrar"></p>
        </form>
    </body>
</html>
<?php
    }
?>
