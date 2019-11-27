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
</header>
<div class="container">
<div class="row">
  <div class="col-sm-12">
  <div class="row mt-4 mb-3">
        <div class="">
            <h2>USUARIOS</h2>
        </div>
    </div>
    <div class="table-responsive">
    <table id="tabla" class="table table-haver table-condensed table-bordered">
      <tr>
        <th scope='col'>Usuario         </th>
        <th scope='col'>Correo          </th>
        <th scope='col'>Nombre          </th>
        <th scope='col'>Apellido Paterno</th>
        <th scope='col'>Apellido Materno</th>
        <th scope='col'>Genero          </th>
        <th scope='col'>Edad            </th>
        <th scope='col'>Registro        </th>
        <th scope='col'>Tipo            </th>
        <th scope='col'>Eliminar        </th>
        <th scope='col'>Ascender        </th>
        <th scope='col'>Descender       </th>
      </tr>
      <?php
      include("configuraBD.php");
      $sql = "select id_usuario,correo,nombre,apellidoP,apellidoM,genero,floor(timestampdiff(DAY,fecha_nacimiento,curdate())/365),fecha_registro,tipo from usuario;";
      $result = mysqli_query($conexion,$sql);
      while($row=mysqli_fetch_row($result)){
        $datos = $row[0]."||".$row[1]."||".$row[2]."||".$row[3]."||".$row[4]."||".$row[4]."||".$row[5]."||".$row[6]."||".$row[7]."||".$row[8];
        ?>
        <tr>
        <td><?php echo $row[0] ?></td>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
        <td><?php echo $row[6] ?></td>
        <td><?php echo $row[7] ?></td>
        <td><?php echo $row[8] ?></td>
        <td>
          <button type="button" class="btn bn-lg btn-danger" onclick="eliminarUsuario('<?php echo $row[0] ?>')">Delete</button>
        </td>
        <td>
          <button type="button" class="btn bn-lg btn-success" onclick="ascenderUsuario('<?php echo $row[0] ?>')">Ascend</button>
        </td>
        <td>
          <button type="button" class="btn bn-lg btn-secondary" onclick="descenderUsuario('<?php echo $row[0] ?>')">Descend</button>
        </td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>
</div>
</div>
</div>

<!--MODAL CAMBIOS-->
<?php
include("modal_cambio.php");
?>
<!--FIN-->

<script src="Bootstrap/js/jquery-3.4.1.min.js"></script>
<script src="Bootstrap/js/popper.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<script src="ajax.js"></script>
<script src="js/js.js"></script>
<script src="js/jquery-3.4.1.js"></script>

</body>
</html>

<?php
} else{
  echo '<script>
  window.location="index.php";
  </script>';         
}
?>