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
  <div class="row mt-4 mb-3">
        <div class="">
            <h2>RECIBIDAS</h2>
        </div>
    </div>
    <div class="table-responsive">
    <table id="tabla" class="table table-haver table-condensed table-bordered">
      <tr>
        <th scope='col'>Remitente</th>
        <th scope='col'>Dedicatoria   </th>
        <th scope='col'>Fecha de Envio</th>
        <th scope='col'>Ver Imagen    </th>
        <th scope='col'>Descarga PDF  </th>
      </tr>


      <?php
      include("configuraBD.php");
      $correo = $_SESSION['correo'];
      $sql = "select * from envio_imagen where correo_destino='$correo';";
      $result = mysqli_query($conexion,$sql);
      $aux = 0;
      while($row=mysqli_fetch_row($result)){
        $sql1 = "select archivo from imagen where id_imagen = $row[1];";
        $result1 = mysqli_query($conexion,$sql1);
        $row1=mysqli_fetch_row($result1);
        ?>
        <tr>
        <td><?php echo $row[2] ?></td>
        <td><?php echo $row[4] ?></td>
        <td><?php echo $row[5] ?></td>
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
                  <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row1[0]).'" class="img-fluid" width="500"/>'; ?>
                </div>
            </div>
       </div>
</div> 
      

        <td>
          <a href="#myModal<?php echo $aux;?>" role="button" class="btn btn-success" data-toggle="modal">View</a>
        </td>
        <td>
          <button type="button" class="btn bn-lg btn-primary" onclick="">Download</button>
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
</div>

<!--MODAL CAMBIOS-->
<?php
include("modal_cambio.php");
?>
<!--FIN-->


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