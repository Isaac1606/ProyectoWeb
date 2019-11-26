<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <title>Envio</title>
</head>
<body>

<!--OPCIONES USUARIO-->
<?php
include("barra_principal.php");
?>
<!--FIN-->

<main class="container-fluid h-100 text-dark mt-4">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12  col-sm-9 col-md-7 col-lg-7 col-xl-6">
            <!-- In case you require server side, you can indicate invalid and valid form fields with .is-invalid and .is-valid. Note that .invalid-feedback is also supported with these classes.-->
            <form action="">

                    <div class="form-group row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <label for="mensaje" class="text-uppercase">Añadir un Mensaje</label>
                            <textarea class="form-control" name="mensaje" id="mensaje"></textarea>
                        </div>
                    </div>



                <div class="form-group row">
                    <div class="col">
                        <label for="exampleFormControlInput1" class="text-uppercase">Email del destinatario</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                               placeholder="name@example.com">
                    </div>
                </div>



                <!--                <div class="form-group row">-->
                <!--                    <div class="col-12 col-md-12">-->
                <!--                        <label for="pais">País</label>-->
                <!--                        <select name="pais" id="pais" class="form-control">-->
                <!--                            <option value="mexico">México</option>-->
                <!--                            <option value="españa">España</option>-->
                <!--                            <option value="colombia">Colombia</option>-->
                <!--                        </select>-->
                <!--                    </div>-->
                <!--                </div>-->


                <!--                <div class="input-group">-->
                <!--                    <input type="text" name="" id="buscar" class="form-control" placeholder="Buscar">-->
                <!--                    <div class="input-group-append">-->
                <!--                        <button class="btn btn-primary">Buscar</button>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="row">
                    <div class="col text-center text-md-right">
                        <button class="btn btn-primary mt-3 mb-3" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<footer class="bg-dark2 text-white mt-5 pt-5">

    <!--    &lt;!&ndash; Footer Links &ndash;&gt;-->
    <!--    <div class="container mb-5 mt-2">-->

    <!--        &lt;!&ndash; Grid row &ndash;&gt;-->
    <!--        <div class="row justify-content-around">-->

    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->
    <!--            <div class="col-12 col-md mb-md-0 mb-3">-->

    <!--                &lt;!&ndash; Links &ndash;&gt;-->
    <!--                <h5 class="text-uppercase">Explorar</h5>-->

    <!--                <ul class="list-unstyled">-->
    <!--                    <li>-->
    <!--                        <a href="#">Tipos de diseño</a>-->
    <!--                    </li>-->
    <!--                    <li>-->
    <!--                        <a href="#">Plantillas</a>-->
    <!--                    </li>-->
    <!--                </ul>-->

    <!--            </div>-->
    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->

    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->
    <!--            <div class="col-12 col-md mb-md-0 mb-3">-->

    <!--                &lt;!&ndash; Links &ndash;&gt;-->
    <!--                <h5 class="text-uppercase">Funciones</h5>-->

    <!--                <ul class="list-unstyled">-->
    <!--                    <li>-->
    <!--                        <a href="#">Imprimir</a>-->
    <!--                    </li>-->
    <!--                </ul>-->

    <!--            </div>-->
    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->

    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->
    <!--            <div class="col-12 col-md mb-md-0 mb-3">-->

    <!--                &lt;!&ndash; Links &ndash;&gt;-->
    <!--                <h5 class="text-uppercase">Aprende</h5>-->

    <!--                <ul class="list-unstyled">-->
    <!--                    <li>-->
    <!--                        <a href="#">Blog</a>-->
    <!--                    </li>-->
    <!--                </ul>-->

    <!--            </div>-->
    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->

    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->
    <!--            <div class="col-12 col-md mb-md-0 mb-3">-->

    <!--                &lt;!&ndash; Links &ndash;&gt;-->
    <!--                <h5 class="text-uppercase">Recursos</h5>-->

    <!--                <ul class="list-unstyled">-->
    <!--                    <li>-->
    <!--                        <a href="#">Editor de fotos</a>-->
    <!--                    </li>-->
    <!--                </ul>-->

    <!--            </div>-->
    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->

    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->
    <!--            <div class="col-12 col-md mb-md-0 mb-3 ">-->

    <!--                &lt;!&ndash; Links &ndash;&gt;-->
    <!--                <h5 class="text-uppercase">Nosotros</h5>-->

    <!--                <ul class="list-unstyled">-->
    <!--                    <li>-->
    <!--                        <a href="#">Conocenos</a>-->
    <!--                    </li>-->
    <!--                    <li>-->
    <!--                        <a href="#">Términos y política de privacidad</a>-->
    <!--                    </li>-->
    <!--                </ul>-->

    <!--            </div>-->
    <!--            &lt;!&ndash; Grid column &ndash;&gt;-->

    <!--        </div>-->
    <!--        &lt;!&ndash; Grid row &ndash;&gt;-->
    <!--    </div>-->
    <!--    &lt;!&ndash; Footer Links &ndash;&gt;-->



    <div class="container-fluid bg-dark3 pt-3 pr-5 pl-5">


        <!-- Grid row-->
        <div class="row pb-3 justify-content-around py-4">

            <!--            &lt;!&ndash; Grid column &ndash;&gt;-->
            <!--            <div class="col-12 col-md-6 text-center">-->

            <!--                <div class="flex-center">-->

            <!--                    &lt;!&ndash; Facebook &ndash;&gt;-->
            <!--                    <a href="#" class="fb-ic text-decoration-none">-->
            <!--                        <i class="fab fa-facebook-f fa-lg white-text mr-4 text-white"> </i>-->
            <!--                    </a>-->
            <!--                    &lt;!&ndash; Twitter &ndash;&gt;-->
            <!--                    <a href="#" class="tw-ic btn-outline-white text-decoration-none">-->
            <!--                        <i class="fab fa-twitter fa-lg white-text mr-4 text-white"> </i>-->
            <!--                    </a>-->
            <!--                    &lt;!&ndash; Google +&ndash;&gt;-->
            <!--                    <a href="#" class="gplus-ic">-->
            <!--                        <i class="fab fa-google-plus-g fa-lg white-text mr-4 text-white text-decoration-none"> </i>-->
            <!--                    </a>-->
            <!--                    &lt;!&ndash;Linkedin &ndash;&gt;-->
            <!--                    <a href="#" class="li-ic">-->
            <!--                        <i class="fab fa-linkedin-in fa-lg white-text mr-4 text-white text-decoration-none"> </i>-->
            <!--                    </a>-->
            <!--                    &lt;!&ndash;Instagram&ndash;&gt;-->
            <!--                    <a href="#" class="ins-ic">-->
            <!--                        <i class="fab fa-instagram fa-lg white-text mr-4 text-white text-decoration-none"> </i>-->
            <!--                    </a>-->
            <!--                    &lt;!&ndash;Whatsapp&ndash;&gt;-->
            <!--                    <a href="#" class="wha-ic">-->
            <!--                        <i class="fab fa-whatsapp fa-lg white-text text-white text-decoration-none"> </i>-->
            <!--                    </a>-->

            <!--                </div>-->

            <!--            </div>-->


            <!-- Grid column -->
            <div class="col-12 col-md-6 mt-4 text-center text-white-50">
                <p>© 2019 Copyright: PhotoMex</p>
            </div>

            <!-- Copyright -->
        </div>
        <!-- Grid row-->
    </div>



</footer>


<!--MODAL-->
<?php
include("modal.php");
?>
<!--FIN DEL MODAL-->


<script src="Bootstrap/js/jquery-3.4.1.min.js"></script>
<script src="Bootstrap/js/popper.min.js"></script>
<script src="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
