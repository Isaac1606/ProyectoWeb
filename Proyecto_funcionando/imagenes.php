<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
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

<!--CONTENIDO-->
<div class="container">
<div class="row mt-4">
        <div class="">
            <h2>IMAGENES</h2>
        </div>
    </div>

      <div class="row p-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <form action="subir_imagen.php" id="formulario" method="post" enctype="multipart/form-data">
                <div class="custom-file form-group">
                    <input type="file" class="custom-file-input" id="archivo" name="archivo">
                    <label class="custom-file-label text-truncate" for="archivos">Elige una imagen</label>
                </div>

                <div class="form-group">
                  <input type="text" id="nombre" name="nombre" placeholder="Dale un nombre" class="form-control" required>
                </div>

                <div class="form-group">
                  <textarea id="descripcion" name="descripcion" cols="30" rows="10" class="form-control" placeholder="Escriba una descripcion" required></textarea>
                </div>

                <div class="form-group">Elige sus categorias:</div>

                <div class="col text-center text-md-left form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="fiestas" id="fiestas" class="custom-control-input">
                        <label for="fiestas" class="custom-control-label mr-2 mt-1">Fiestas religiosas</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="sentimientos" id="sentimientos" class="custom-control-input">
                        <label for="sentimientos" class="custom-control-label">Sentimientos</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="felicidades" id="felicidades" class="custom-control-input">
                        <label for="felicidades" class="custom-control-label mr-2 mt-1">Felicidades</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="festejos" id="festejos" class="custom-control-input">
                        <label for="festejos" class="custom-control-label">Festejos</label>
                    </div>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block text-center">
                  Guardar imagen
                </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      

<!--TABLA DE DATOS-->
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
</div>

<!--MODAL DE EDICION-->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifica datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" hidden="" id="id_imagen" name="">
        <label>Nuevo Nombre</label>
        <input type="text" name="" id="nombreNew" class="form-control input-sm">
        <label>Nueva descripcion</label>
        <input type="text" name="" id="descripcionNew" class="form-control input-sm">
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="actualizar" onclick="actualizaImagen()" >Actualizar</button>
      </div>
    </div>
  </div>
</div>

<!--MODAL CAMBIOS-->
<?php
include("modal_cambio.php");
?>
<!--FIN-->

<!--CODIGOS-->
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
    </script>';  }
?>