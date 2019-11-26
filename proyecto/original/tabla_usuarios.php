<div class="container">
<div class="row">
  <div class="col-sm-12">
    <table id="tabla" class="table table-haver table-condensed table-bordered">
      <tr>
        <td>Usuario</td>
        <td>Correo</td>
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Genero</td>
        <td>Edad</td>
        <td>Registro</td>
        <td>Tipo</td>
        <td>Eliminar</td>
        <td>Ascender</td>
        <td>Descender</td>
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
          <button type="button" class="btn bn-lg btn-primary" onclick="ascenderUsuario('<?php echo $row[0] ?>')">Ascend</button>
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