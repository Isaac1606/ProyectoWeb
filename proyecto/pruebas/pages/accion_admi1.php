<?php
session_start();
if(isset($_SESSION["usuario"]) and $_SESSION['tipo'] == "admin"){
    if(isset($_POST['categoria'])){
        $usuario = $_SESSION["usuario"];
        $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
        $descripcion = $_POST['descripcion'];
        date_default_timezone_set("America/Mexico_City");
        $date = date("Y-m-d")." ".date("h:i:s");
        //echo $date;

        $conexion = mysqli_connect("localhost","root","","proyecto") or die("Error al conectarse con la base de datos");
        $sql = "insert into imagen values (0,'$usuario','$descripcion',?,'$date')";
        $stmt = mysqli_prepare($conexion,$sql);
        mysqli_stmt_bind_param($stmt, "s",$imagen);

        if(mysqli_stmt_execute($stmt)){
            //
            $categoria = $_POST['categoria'];
            for($i=0;$i<count($categoria);$i++){
                //echo $categoria[$i];
                $sql = "insert into categoria values ((select id_imagen from imagen where fecha_subida = '$date'),'$categoria[$i]')";
                if(mysqli_query($conexion, $sql)){
                } else{
                    die("Error al subir categoria");
                }
            }
        } else{
            die("No se pudo subir la imagen");
        }
        header('Location: home.php');    
    } else{
        header('Location: sube_imagen.php');    
    }
    mysqli_close($conexion);
} else if(isset($_SESSION["tipo"]) and $_SESSION['tipo'] != "admin"){
    echo "<p>No es administrador</p>";
    echo '<a href="home.php"><br>Volver</a>';
} else{
    header('Location: index.php');        
}
?>
