<?php
session_start();
//echo $_SESSION['usuario'];
if(isset($_SESSION["usuario"])){
    $conexion = mysqli_connect("localhost","root","","proyecto") or die ("Error al conectar con la base de datos");
    $usuario = $_SESSION['usuario'];
    $correo = $_SESSION['correo'];

    if(isset($_POST["enviado"])){
        $sql = "select id_imagen,id_usuario,fecha_envio,correo_destino,dedicatora from envio_imagen where id_usuario='$usuario';";
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
            echo "<a href='descarga_pdf?imagen=$row[0]'>Descargar PDF<br></a><br>";
        }
        
    } else if(isset($_POST["recibido"])){
        $sql = "select id_imagen,id_usuario,fecha_envio,correo_destino,dedicatora from envio_imagen where correo_destino='$correo';";
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
            echo "<a href='descarga_pdf?imagen=$row[0]'>Descargar PDF<br></a><br>";
        }

    } else{
        //no hace nada
    }
    echo '<a href="home.php"><br>Volver</a>';
    mysqli_close($conexion);

} else{
    header('Location: index.php');        
}
?>