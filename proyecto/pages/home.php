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
        <p>Bienvenido <?php echo $_SESSION["usuario"];?><br></p>
        <p>Correo: <?php echo $_SESSION["correo"];?><br></p>
        <p>Nombre: <?php echo $_SESSION["nombre"];?><br></p>
        <p>Tipo: <?php echo $_SESSION["tipo"];?><br></p>
        <p><?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($_SESSION["imagen"]).'" height = "100" width = "100"/>';?><br></p>
        <a href="http://localhost/proyecto/pages/cat1.php"><br>Categoria 1</a>
        <a href="http://localhost/proyecto/pages/cat2.php"><br>Categoria 2</a>
        <a href="http://localhost/proyecto/pages/cat3.php"><br>Categoria 3 </a>
        <a href="http://localhost/proyecto/pages/cat4.php"><br>Categoria 4</a>
        <a href="http://localhost/proyecto/pages/cat.php"><br>Todas las categorias</a>
        <a href="http://localhost/proyecto/pages/cerrar.php"><br>Cerrar sesion</a>
    </body>
</html>
<?php
    } else{
        header('Location: http://localhost/proyecto/index.html');        
    }
?>