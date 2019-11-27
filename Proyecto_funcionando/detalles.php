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
if($_SESSION['tipo'] == "admin"){
?>
<!--FIN-->

<div class="container">
<div class="row">
  <div class="col-sm-12">
    <div class="row mt-4 mb-3">
        <div class="">
            <h2>DETALLES</h2>
        </div>
    </div>
    <button type="button" class="form-group btn bn-lg btn-primary" onclick="">Descargar detalles</button>
    <div class="table-responsive">
    <table class="form-group table table-haver table-condensed table-bordered">
      <tr>
        <th scope='col'>Postal +          </th>
        <th scope='col'>Categoria +       </th>
        <th scope='col'>Total de envios   </th>
        <th scope='col'>Total de hombres  </th>
        <th scope='col'>Total de mujeres  </th>
        <th scope='col'>Total de usuarios </th>
        <th scope='col'>Edad promedio     </th>
      </tr>
      <tr>

      <?php
      include("configuraBD.php");
      $sql = "SELECT nombre_imagen from imagen WHERE envios in (SELECT MAX(envios) FROM imagen);";
      $res = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_row($res);
      ?>
      <td><?php echo $row[0] ?></td>

      <?php
    $sql = "SELECT nombre_categoria from enviosxcat WHERE envios in (SELECT MAX(envios) FROM enviosxcat);";
    $res = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_row($res);
    ?>
      <td><?php echo $row[0] ?></td>

        <?php
      $sql = "select count(id_envio) from envio_imagen;";
      $res = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_row($res);
      ?>
        <td><?php echo $row[0] ?></td>

        <?php
      $sql = "select count(id_usuario) from usuario where genero='Hombre';";
      $res = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_row($res);
      ?>
        <td><?php echo $row[0] ?></td>

        <?php
      $sql = "select count(id_usuario) from usuario where genero='Mujer';";
      $res = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_row($res);
      ?>
        <td><?php echo $row[0] ?></td>

        <?php
      $sql = "select count(id_usuario) from usuario;";
      $res = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_row($res);
      ?>
        <td><?php echo $row[0] ?></td>

        <?php
      $sql = "select sum(floor(timestampdiff(DAY,fecha_nacimiento,curdate())/365))/count(id_usuario) from usuario;";
      $res = mysqli_query($conexion,$sql);
      $row = mysqli_fetch_row($res);
      ?>
        <td><?php echo $row[0] ?></td>
      </tr>
    </table>

        <div class="mb-3">
            <h2>POSTALES ENVIADAS</h2>
        </div>

    <table id="tabla" class="table table-haver table-condensed table-bordered">
      <tr>
        <td>ID Envio</td>
        <td>ID Imagen</td>
        <td>ID Usuario</td>
        <td>Correo Destino</td>
        <td>Dedicatoria</td>
        <td>Fecha Envio</td>
      </tr>
      <?php
      $sql = "select * from envio_imagen;";
      $result = mysqli_query($conexion,$sql);
      while($row=mysqli_fetch_row($result)){
        $datos = $row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[4]."||".$row[5];
        ?>
        <tr>
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>
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
