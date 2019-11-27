<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Categorias</title>
</head>
<body>

<!--OPCIONES USUARIO-->
<?php
include("barra_principal.php");
?>
<!--FIN-->

<div class="container">

    <div class="row mt-4 mb-3">
        <div class="">
            <h2>FESTEJOS</h2>
        </div>
    </div>

  <div class="row text-center text-lg-left">
<?php 
include("configuraBD.php");
$sql = "select id_imagen,nombre_imagen,archivo from imagen where id_imagen in (select id_imagen from categoria where nombre_categoria = 'festejos');";
$result = mysqli_query($conexion,$sql);
$aux = 0;
while($row=mysqli_fetch_row($result)){
?>
            <div class="div-img col-lg-3 col-md-4 col-6" >
              <a href="#modal" class="d-block mb-4 h-100" data-toggle="modal" onclick="llenaImagen('<?php echo $row[0] ?>');">
              <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($row[2]).'" class="img-fluid img-thumbnail" title="'.$row[1].'"/>'; ?>
              </a>
            </div>

<?php
$aux = $aux + 1;
}
?>
</div>
</div>


<!--MODAL-->
<?php
include("modal.php");
?>
<!--FIN DEL MODAL-->

<!--MODAL DE ENVIO-->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ingrese datos de envio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!--<img id="archivo" src="images.jpg" class="img-fluid"/><br>-->
        <input type="text" hidden="" id="id_imagen" name="">
        <label>Correo destino</label>
        <input type="email" name="" id="correo_destino" class="form-control">
        <label>Dedicatoria</label>
        <!--<input type="text" name="" id="dedicatoria" class="form-control input-sm">-->
        <textarea id="dedicatoria" name="" class="form-control"></textarea>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="enviar" onclick="mandaPostal()" >Enviar</button>
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

<script type="text/javascript" ></script>
<script>

function llenaImagen(datos){
    d = datos.split("||");
    $("#id_imagen").val(d[0]);
}

function mandaPostal(){
    id = $("#id_imagen").val();
    correo = $("#correo_destino").val();
    dedicatoria = $("#dedicatoria").val();
    cadena = "id="+id+"&correo="+correo+"&dedicatoria="+dedicatoria;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'envia_postal.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Postal enviada con exito");
            } else{
                alert("Error al enviar la postal");
            }
        }
    });

}
</script>

</body>
</html>