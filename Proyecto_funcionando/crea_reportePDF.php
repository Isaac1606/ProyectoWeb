<?php
  require_once('vendor/autoload.php');

  //Plantilla HTML
  require_once('plantillas/reporte/index.php');

  //Codigo CSS de la plantillas
  $css = file_get_contents('plantillas/reporte/style.css');

  //Parte de Base de Datos
  include('configuraBD.php');

  $query = "SELECT id_imagen, id_usuario, nombre_imagen, descripcion, envios from Imagen";
  $stmt = mysqli_prepare($conexion,$query);
  $stmt -> execute();

  $resultado = $stmt->get_result();
  $imagenes = array();
  while($row = $resultado->fetch_assoc()) $imagenes[] = $row;
  mysqli_close($conexion);/*
  var_dump($imagenes);
  die();*/
  //END Parte de Base de Datos

  $mpdf = new \Mpdf\Mpdf([]);

  $plantilla = getPlantilla($imagenes);

  $mpdf -> writeHtml($css, \Mpdf\HTMLParserMode::HEADER_CSS);
  $mpdf -> writeHtml($plantilla, \Mpdf\HTMLParserMode::HTML_BODY);

  $mpdf-> Output();
?>
