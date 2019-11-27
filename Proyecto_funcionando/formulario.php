<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Formulario</title>
</head>
<body>
<!--OPCIONES USUARIO-->
<?php
include("barra_principal.php");
?>
<!--FIN-->


<main class="container-fluid h-100 text-dark mt-4">
    <div class="row justify-content-center mb-1 mt-3">
        <div class="col col-sm-9 col-md-7 col-xl-6">
            <h2>Crea tu cuenta</h2>
        </div>
    </div>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12  col-sm-9 col-md-7 col-lg-7 col-xl-6">
            <!-- In case you require server side, you can indicate invalid and valid form fields with .is-invalid and .is-valid. Note that .invalid-feedback is also supported with these classes.-->
            <form action="registrarse.php" method="post" enctype="multipart/form-data">

                <div class="form-row align-items-center bg">
                    <div class="col-xl-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control mb-2" id="nombre" name="nombre" placeholder="Nombre" required>
                        <div class="valid-feedback">
                            <!--Mensaje que se mostrara si es valido el nombre con la clase is-valid en el placeholder-->
                            Looks good!
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-4">
                        <label for="apellidoP">Apellido Paterno</label>
                        <input type="text" class="form-control mb-2" id="apellidoP" name="apellidoP" placeholder="Apellido Paterno" >
                        <div class="valid-feedback">
                            <!--Mensaje que se mostrara si es valido el nombre con la clase is-valid en el placeholder-->
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <label for="apellidoM">Apellido Materno</label>
                        <input type="text" class="form-control mb-2" id="apellidoM" name="apellidoM" placeholder="Apellido Materno" >
                        <div class="valid-feedback">
                            <!--Mensaje que se mostrara si es valido el nombre con la clase is-valid en el placeholder-->
                            Looks good!
                        </div>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col">
                        <label for="emaul">Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="name@example.com" required>
                    </div>
                </div>


                <div class="form-row align-items-center">
                    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mt-2">
                        <label class="sr-only" for="usuario">Username</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-5 col-xl-5 mt-sm-3 mb-sm-3 mt-3 mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="imagen" name="imagen">
                            <label class="custom-file-label text-truncate" for="imagen">Elige tu foto de perfil...</label>
                            <div class="invalid-feedback">Example invalid custom file feedback</div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 mt-sm-3 mb-sm-3 mt-2 mb-3 text-center">
                        <img src="" height="100" alt="" id="imagen1" class="rounded">
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-12 col-md-12">
                        <label for="pass">Contraseña</label>
                        <input type="password" class="form-control" placeholder="Contraseña" name="clave" id="clave" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col">
                        <label for="date">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>
                </div>


                <div class="form-group row"> <!-- -->
                    <div class="col-6"><!-- -->
                        <label for="sexo">Sexo</label><!-- -->
                        <div class="form-check" id="sexo" name="sexo">
                            <div class="custom-control custom-radio">
                                <input type="radio" value="Hombre" name="Hombre" id="radioPersonalizado1" class="custom-control-input">
                                <label for="radioPersonalizado1"class="custom-control-label">Hombre</label>
                            </div>

                            <div class="custom-control custom-radio">
                                <input type="radio" value="Mujer" name="Mujer" id="radioPersonalizado2" class="custom-control-input">
                                <label for="radioPersonalizado2"  class="custom-control-label">Mujer</label>
                            </div>
                        </div>
                    </div><!-- -->
                </div><!-- -->



                <div class="form-group row ">
                    <div class="col text-center text-md-right">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="" id="checkboxPersonalizado2" class="custom-control-input">
                            <label for="checkboxPersonalizado2" class="custom-control-label mr-2 mt-1">Acepto las
                                Politicas de Privacidad </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="" id="checkboxPersonalizado1" class="custom-control-input">
                            <label for="checkboxPersonalizado1" class="custom-control-label">Acepto los Terminos y
                                condiciones</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center text-md-right">
                        <button class="btn btn-primary mt-3 mb-3" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<!--MODAL-->
<?php
include("modal.php");
?>
<!--FIN DEL MODAL-->

<!--
<div class="container">
    <div class="row">
        <div class="col">
            <form action="" class="mt-3">
                <h2>Checkbox Personalizado</h2>
                <hr>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="" id="checkboxPersonalizado3" class="custom-control-input">
                    <label for="checkboxPersonalizado3" class="custom-control-label">Acepto los Terminos y
                        condiciones</label>
                </div>

                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="" id="checkboxPersonalizado4" class="custom-control-input">
                    <label for="checkboxPersonalizado4" class="custom-control-label">Acepto las Politicas de
                        Privacidad</label>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <form action="" class="mt-3">
                <h2>Radio Button Personalizado</h2>
                <hr>
                <div class="custom-control custom-radio">
                    <input type="radio" name="sexo" id="radioPersonalizado0" class="custom-control-input">
                    <label for="radioPersonalizado0" class="custom-control-label">Hombre</label>
                </div>

                <div class="custom-control custom-radio">
                    <input type="radio" name="sexo" id="radioPersonalizado01" class="custom-control-input">
                    <label for="radioPersonalizado01" class="custom-control-label">Mujer</label>
                </div>

                <br>


                <div class="custom-control custom-control-inline custom-radio">
                    <input type="radio" name="edad" id="radioPersonalizado3" class="custom-control-input">
                    <label for="radioPersonalizado3" class="custom-control-label">Menor de Edad</label>
                </div>

                <div class="custom-control custom-control-inline custom-radio">
                    <input type="radio" name="edad" id="radioPersonalizado4" class="custom-control-input">
                    <label for="radioPersonalizado4" class="custom-control-label">Mayor de Edad</label>
                </div>

            </form>
        </div>
    </div>
</div>
-->

<script src="Bootstrap/js/jquery-3.4.1.min.js"></script>
<script src="Bootstrap/js/popper.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
<script src="js/js.js"></script>
</body>
</html>