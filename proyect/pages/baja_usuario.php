<?php
    session_start();
    if(isset($_SESSION["usuario"]) and $_SESSION['tipo'] == "admin"){
?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            DAR DE BAJA USUARIO
        </h1>
<?php
    $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
    $sql = "select imagen,id_usuario,genero,fecha_nacimiento,fecha_registro from usuario where tipo='normal'";
    $res = mysqli_query($conexion, $sql);

    while($row=mysqli_fetch_array($res)){
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row[0]).'" height="150" width="150"/><br>';
        echo "Usuario: $row[1]<br>";
        echo "Genero: $row[2]<br>";
        echo "Fecha de registro: $row[4]<br>";
        echo "Fecha de nacimiento: $row[3]<br>";
        echo "<a href='accion_admi4?usuario=$row[1]'> Dar de baja </a><br>";

    } 
    echo '<a href="home.php"><br>Volver</a>';
    mysqli_close($conexion);
?>
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