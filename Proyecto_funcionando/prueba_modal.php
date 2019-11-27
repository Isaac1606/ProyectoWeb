<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Iniciar Sesion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label class="sr-only" for="usuario">Username</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" name="" id="usuario" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="" id="clave">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button input" class="btn btn-primary" id="ingresar" onclick="ingresaDatos()">Ingresar</button>
            </div>
        </div>
    </div>
</div>

<script>
function ingresaDatos(){
    usuario = $("#usuario").val();
    clave = $("#clave").val();
    cadena = "usuario="+usuario+"&clave="+clave;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'ingresar.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Bienvenido de nuevo");
                window.location="index.php";
            } else{
                alert("Datos incorrectos");
            }
        }
    });
}


</script>