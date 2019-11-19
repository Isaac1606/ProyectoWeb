<?php
    session_start();
    if(isset($_SESSION["usuario"])){ 
        header('Location: index.php');
    } else{
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            INDEX
        </h1>
        <a href="login.php">Ingresar</a>
        <a href="regis.php">Registro</a>
    </body>
</html>
<?php 
    }
?>