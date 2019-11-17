<?php
    session_start();
    if(isset($_SESSION["usuario"])){
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            HOME
        </h1>
        <p>bienvenido <?php echo $_SESSION["usuario"];?></p>
    </body>
</html>
<?php
    } else{
        header('Location: http://localhost/proyecto/login.html');        
    }
?>