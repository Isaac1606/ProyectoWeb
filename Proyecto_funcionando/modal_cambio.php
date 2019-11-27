
<!--MODAL DE CLAVE-->
<div class="modal fade" id="modalClave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cambio de Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Contraseña antigua</label>
        <input type="password" name="" id="antigua" class="form-control">
        <label>Nueva contraseña</label>
        <input type="password" name="" id="nueva" class="form-control">

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="" onclick="cambiarClave()" >Enviar</button>
      </div>
    </div>
  </div>
</div>
</div>

<div class="modal fade" id="modalImagen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Cambio de Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
        echo '
        <img src="data:image/jpeg;base64,'.base64_encode($_SESSION['imagen']).'" class="img-fluid">
        ';
        ?>

        <label>Nueva Imagen</label>
        <div class="custom-file">
        <input type="file" name="" id="imagen1" class="custom-file-input">
        <label class="custom-file-label text-truncate" for="imagen1">Elige tu nueva imagen</label>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="" onclick="cambiarImagen()" >Enviar</button>
      </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript" ></script>

<script>

function cambiarImagen(){
  alert("Opcion inhabilitada");
}

function cambiarClave(){
    antigua = $("#antigua").val();
    nueva = $("#nueva").val();
    cadena = "nueva="+nueva+"&antigua="+antigua;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'cambia_clave.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Contraseña actualizada");
            } else{
                alert("Error al cambiar contraseña");
            }
        }
    });
}
</script>