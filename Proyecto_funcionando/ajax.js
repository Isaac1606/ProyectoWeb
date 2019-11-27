
function llenaFormulario(datos){
    d = datos.split("||");
    $("#id_imagen").val(d[0]);
    $("#nombreNew").val(d[1]);
    $("#descripcionNew").val(d[2]);
}

function actualizaImagen(){
    id_imagen = $("#id_imagen").val();
    nombre_imagen = $("#nombreNew").val();
    descripcion = $("#descripcionNew").val();
    cadena = "id_imagen="+id_imagen+"&nombre_imagen="+nombre_imagen+"&descripcion="+descripcion;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'actualiza_imagen.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Datos modificados");
                $('#tabla').load("tabla_imagenes.php");
            } else{
                alert("Error al modificar");
            }
        }
    });
}

function eliminarImagen(datos){
    d = datos.split("||");
    id_imagen = d[0];
    nombre_imagen = d[1];
    descripcion = d[2];
    cadena = "id_imagen="+id_imagen+"&nombre_imagen="+nombre_imagen+"&descripcion="+descripcion;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'eliminar_imagen.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Datos eliminados");
                $('#tabla').load("tabla_imagenes.php");
            } else{
                alert("Error al eliminar");
            }
        }
    });
}

function eliminarUsuario(datos){
    d = datos.split("||");
    id = d[0];
    cadena = "id_usuario="+id;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'eliminar_usuario.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Datos eliminados");
                $('#tabla').load("tabla_usuarios.php");
            } else{
                alert("Error al eliminar");
            }
        }
    });
}

function ascenderUsuario(datos){
    d = datos.split("||");
    id = d[0];
    cadena = "id_usuario="+id;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'ascender_usuario.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Usuario ascendido");
                $('#tabla').load("tabla_usuarios.php");
            } else{
                alert("Error al actualizar");
            }
        }
    });
}

function descenderUsuario(datos){
    d = datos.split("||");
    id = d[0];
    cadena = "id_usuario="+id;
    console.log(cadena);
    $.ajax({
        type:"post",
        url:'descender_usuario.php',
        data:cadena,
        success:function(r){
            if(r==1){
                alert("Usuario descendido");
                $('#tabla').load("tabla_usuarios.php");
            } else{
                alert("Error al actualizar");
            }
        }
    });
}
