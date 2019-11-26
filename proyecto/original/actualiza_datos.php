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
    <h2> ACTUALIZAR DATOS (EN PROCESO) </h2>
</div>

</div>
</div>


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