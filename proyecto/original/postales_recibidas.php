<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Admin</title>
</head>
<body>

<!--OPCIONES USUARIO-->
<?php
include("barra_principal.php");
if(isset($_SESSION['tipo'])){
?>
<!--FIN-->

<div class="container">
<div class="row">
  <div class="col-sm-12">
    <h2> POSTALES RECIBIDAS </h2>
    <table id="tabla" class="table table-haver table-condensed table-bordered">
      <tr>
        <td>ID Usuario</td>
        <td>Correo Destino</td>
        <td>Dedicatoria</td>
        <td>Fecha de Envio</td>
        <td>Ver Imagen</td>
        <td>Descarga PDF</td>

      </tr>
      <?php
      include("configuraBD.php");
      $correo = $_SESSION['correo'];
      $sql = "select * from envio_imagen where correo_destino='$correo';";
      $result = mysqli_query($conexion,$sql);
      while($row=mysqli_fetch_row($result)){
        $datos = $row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[4]."||".$row[5];
        ?>
        <tr>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
        <td>
          <button type="button" class="btn bn-lg btn-success" onclick="">View</button>
        </td>
        <td>
          <button type="button" class="btn bn-lg btn-primary" onclick="">Download</button>
        </td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>
</div>
</div>

<script src="Bootstrap/js/jquery-3.4.1.min.js"></script>
<script src="Bootstrap/js/popper.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<script src="js/jquery-3.4.1.js"></script>
<script src="js/js.js"></script>
<script src="ajax.js"></script>

</body>
</html>

<?php
} else{
    header('Location: index.php');        
}
?>