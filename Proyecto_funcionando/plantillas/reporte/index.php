<?php
  function getPlantilla($datos){
    session_start();
    $username = $_SESSION['nombre'];
    $usermail = $_SESSION['correo'];
    $fechaActual = date('d-m-Y');
    $plantilla =
  '<body>
    <header class="clearfix">
      <div id="logo">
        <img src="logo.png" alt="logo_vergas" height="150px">
      </div>
      <div id="company">
        <h2 class="name">POSTALES MX</h2>
        <div>Av. Juan de Dios B&aacute;tiz S/N, Nueva Industrial Vallejo, Gustavo A. Madero, 07738 Ciudad de M&eacute;xico, CDMX</div>
        <div>55 5729 6000</div>
        <div><a href="http://localhost/proyecto/original/index.php">www.postaleschidasmx.com</a></div>
      </div>
      </div>
    </header>
    <main>
      <div id="details" class="clearfix">
        <div id="client">
          <div class="to">Reporte generado para:</div>
          <h2 class="name">'.$username.'</h2>
          <div class="email"><a href="mailto:'.$usermail.'">'.$usermail.'</a></div>
        </div>
        <div id="invoice">
          <h1>REPORTE DE ENVIOS</h1>
          <div class="date">Fecha de creaci&oacute;n: '.$fechaActual.'</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">ID</th>
            <th class="desc">DESCRIPCION</th>
            <th class="unit">Subida por</th>
            <th class="total"># Envios</th>
          </tr>
        </thead>
        <tbody>';
        $envios = 0;
        foreach($datos as $dato){
          $envios = $envios+$dato["envios"];
          $plantilla.= '
            <tr>
              <td class="no">'.$dato["id_imagen"].'</td>
              <td class="desc"><h3 style="color: #57B223;font-size: 1.2em;font-weight: normal;margin: 0 0 0.2em 0;">'.$dato["nombre_imagen"].'</h3>'.$dato["descripcion"].'</td>
              <td class="unit">'.$dato["id_usuario"].'</td>
              <td class="total">'.$dato["envios"].'</td>
            </tr>';
        }
        $plantilla.= '
        </tbody>
        <tfoot>
          <tr>
            <td colspan="1"></td>
            <td colspan="2" style="color: #57B223;font-size: 1.4em; border: none;">TOTAL DE PLANTILLAS ENVIADAS</td>
            <td style="color: #57B223;font-size: 1.4em; border: none;">'.$envios.'</td>
          </tr>
        </tfoot>
      </table>
      <div id="thanks">MAS COSAS POR ACA?</div>
      <div id="notices">
        <div>NOTA:</div>
        <div class="notice">Esta informaci&oacute;n no representa ningun tipo de validez oficial porque son solo stats alv.</div>
      </div>
    </main>
    <footer>
      Copyright 2019. Escuela Superior de Computo
    </footer>
  </body>';

  return $plantilla;
}
?>
