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
        <p>Tipo: <?php echo $_SESSION["tipo"];?></p>
        <a href="modifica_datos.php">Modificar mis datos</a>
        <p><?php echo '<img src = "data:image/jpeg;base64,'.base64_encode($_SESSION["imagen"]).'" height = "100" width = "100"/>';?><br></p>
        <form action="envio_recibido.php" method="post">
            <p><input type="submit" name="enviado" value="Imagenes Enviadas"></p>
            <p><input type="submit" name="recibido" value="Imagenes Recibidas"></p>
        </form>
        <p>Categorias</p>
        <a href="imagenes.php?categoria=cat1">Categoria 1</a>
        <a href="imagenes.php?categoria=cat2"><br>Categoria 2</a>
        <a href="imagenes.php?categoria=cat3"><br>Categoria 3 </a>
        <a href="imagenes.php?categoria=cat4"><br>Categoria 4</a>
        <a href="imagenes.php"><br>Todas las imagenes</a><br>

        <a href="admin.php"><br>Modo administrador</a>
        <a href="cerrar.php"><br>Cerrar sesion</a>
    </body>
</html>
<?php
    } else{
        header('Location: index.php');        
    }
?>