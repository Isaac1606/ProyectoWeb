<div class="row">
  <div class="col-sm-12">
    <table id="tabla" class="table table-haver table-condensed table-bordered">
      <tr>
        <td>Nombre</td>
        <td>Descripcion</td>
        <td>Ultima modificacion</td>
        <td>Actualizar</td>
        <td>Eliminar</td>
      </tr>
      <?php
      include("configuraBD.php");
      $sql = "select id_imagen,nombre_imagen,descripcion,fecha_subida from imagen;";
      $result = mysqli_query($conexion,$sql);
      while($row=mysqli_fetch_row($result)){
        $datos = $row[0]."||".$row[1]."||".$row[2]."||".$row[3];
        ?>
        <tr>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>
        <td>
          <button type="button" class="btn bn-lg btn-secondary" data-toggle="modal" data-target="#modalEdicion" onclick="llenaFormulario('<?php echo $datos ?>')" >Update</button>
        </td>
        <td>
          <button type="button" class="btn bn-lg btn-danger" onclick="eliminarImagen('<?php echo $datos ?>')">Delete</button>
        </td>
      </tr>
      <?php
      }
      ?>
    </table>
  </div>
</div>