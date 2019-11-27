<div class="row">
  <div class="col-sm-12">
  <div class="table-responsive">
    <table id="tabla" class="table table-haver table-condensed table-bordered">
      <tr>
        <th scope='col'>Nombre              </th>
        <th scope='col'>Descripcion         </th>
        <th scope='col'>Ultima modificacion </th>
        <th scope='col'>Imagen              </th>
        <th scope='col'>Actualizar          </th>
        <th scope='col'>Eliminar            </th>
      </tr>
      <?php
      include("configuraBD.php");
      $sql = "select id_imagen,nombre_imagen,descripcion,fecha_subida,archivo from imagen;";
      $result = mysqli_query($conexion,$sql);
      $aux = 0;
      while($row=mysqli_fetch_row($result)){
        $datos = $row[0]."||".$row[1]."||".$row[2]."||".$row[3];
        ?>
        <tr>
        <td><?php echo $row[1] ?></td>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[3] ?></td>

<!--MODAL IMAGEN-->
<div class="modal fade bd-example-modal-lg show" id="myModal<?php echo $aux;?>" role="dialog" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="dynamic-content">
                  <!--Siempre sale la misma imagen-->
                  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row[4]).'" class="img-fluid" width="500"/>'; ?>
                </div>
            </div>
       </div>
</div> 
</div>
      

        <td>
          <a href="#myModal<?php echo $aux;?>" role="button" class="btn btn-success" data-toggle="modal">View</a>
        </td>
        <td>
          <button type="button" class="btn bn-lg btn-secondary" data-toggle="modal" data-target="#modalEdicion" onclick="llenaFormulario('<?php echo $datos ?>')" >Update</button>
        </td>
        <td>
          <button type="button" class="btn bn-lg btn-danger" onclick="eliminarImagen('<?php echo $datos ?>')">Delete</button>
        </td>
      </tr>
      <?php
      $aux = $aux + 1;
      }
      ?>
    </table>
  </div>
</div>