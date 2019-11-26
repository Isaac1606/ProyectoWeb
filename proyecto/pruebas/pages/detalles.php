<?php
    session_start();
    if(isset($_SESSION["usuario"]) and $_SESSION['tipo'] == "admin"){
        $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");

?>
<!DOCTYPE html>
<html>
    <body>
        <h1>
            DETALLES
        </h1>

        <form action="" method="post" enctype="multipart/form-data">
            <p><input type="submit" name='uno' value="Categorias mas gustadas"></p>
            <p><input type="submit" name='dos' value="Postales mas gustadas"></p>
            <p><input type="submit" name='tres' value="Genero/Edad de usuarios"></p>
            <p><input type="submit" name='cuatro' value="Detalle de postales"></p>
        </form>
        <a href="home.php">Volver</a>
    </body>
</html>
<?php
        if(isset($_POST['uno'])){
            $sql = "select count(id_imagen),nombre_categoria from categoria group by nombre_categoria order by 1 desc;";
            $res = mysqli_query($conexion, $sql);
            while($row=mysqli_fetch_array($res)){
                echo "<p>Categoria: ".$row[1]." --- ";
                echo "Envios: ".$row[0]."</p>";
            }
        } else{}

        if(isset($_POST['dos'])){
            $sql = "select count(id_imagen),id_imagen from envio_imagen group by id_imagen order by 1 desc;";
            $res = mysqli_query($conexion, $sql);
            while($row=mysqli_fetch_array($res)){
                $sql1 = "select archivo from imagen where id_imagen= '$row[1]';";
                $res1 = mysqli_query($conexion, $sql1);
                $row1 = mysqli_fetch_array($res1);
                if($row1[0] == ''){
                    echo "<br>IMAGEN NO DISPONIBLE: ";
                } else{
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row1[0]).'" height="200" width="200"/>';
                }
                echo "Envios: $row[0]<br>";
            }
        } else{}

        if(isset($_POST['tres'])){
            $sql = "select count(genero),genero from usuario group by genero order by 1 desc;";
            $res = mysqli_query($conexion, $sql);
            while($row=mysqli_fetch_array($res)){
                echo "<p>$row[0]: ".$row[1]."</p>";
            }
            $sql = "select sum(floor(timestampdiff(DAY,fecha_nacimiento,curdate())/365))/count(id_usuario) as 'edad' from usuario;";
            $res = mysqli_query($conexion, $sql);
            $row=mysqli_fetch_array($res);
            echo "Edad promedio: ".$row[0];
        } else{}

        if(isset($_POST['cuatro'])){
            echo "<a href=descarga_detalles.php'><br>Descargar detalles (PDF)<br></a><br>";

            $sql = "select id_imagen,id_usuario,fecha_envio,correo_destino,dedicatora from envio_imagen";
            $res = mysqli_query($conexion, $sql);

            while($row=mysqli_fetch_array($res)){
                $sql1 = "select archivo from imagen where id_imagen= '$row[0]';";
                $res1 = mysqli_query($conexion, $sql1);
                $row1=mysqli_fetch_array($res1);
                if($row1[0] == ''){
                    echo "<p>IMAGEN NO DISPONIBLE</p>";
                } else{
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row1[0]).'" height="200" width="200"/>';
                }
                echo "<p>usuario: ".$row[1]."</p>";
                echo "<p>fecha: ".$row[2]."</p>";
                echo "<p>para: ".$row[3]."</p>";
                echo "<p>dedicatoria: ".$row[4]."</p>";
            }
        } else{}

    } else if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] != "admin"){
        echo "<p>No es administrador</p>";
        echo '<a href="home.php"><br>Volver</a>';
    } else{
        header('Location: index.php');        
    }
?>