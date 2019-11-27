<?php

include("configuraBD.php");
include('gmailData.php');
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$webName = "Kartolina";

$usuario = $_SESSION['usuario'];
$username = $_SESSION['nombre'];
$usermail = $_SESSION['correo'];
$destName = 'TestDude';

$id_imagen = $_POST['id'];
$correo = $_POST['correo'];
$dedicatoria = $_POST['dedicatoria'];

$sql = "insert into envio_imagen values (0,$id_imagen,'$usuario','$correo','$dedicatoria',curdate());";
$res = mysqli_query($conexion,$sql);

if(mysqli_affected_rows($conexion) == 1){
    $sql = "update imagen set envios = envios+1 where id_imagen=$id_imagen;";
    echo $res = mysqli_query($conexion,$sql);
}
mysqli_close($conexion);

$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = $gmail;                                 // SMTP username
    $mail->Password   = $pass;                                  // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('fernandojos44@gmail.com', $webName);
    $mail->addAddress($correo,$destName);     // Add a recipient

    $pagina = strtolower(trim($webName));
    $body = "<h1 style='text-align: center; font-family: cambria;'>$usuario te ha enviado una postal a trav&eacute;s de <strong><span style='color: #0000ff;'><span style='color: #3949ab;'>$webName</span></span></strong>!</h1>";
    if(empty($dedicatoria)){
      $body.="<p style='text-align: left;'>Hola $destName, has recibido una nueva postal de $username</p>";
    }else{
      $body.="<p style='text-align: left;'>Hola $destName, has recibido una nueva postal de $username con la siguiente dedicatoria:</p>
              <p style='text-align: left; padding-left: 30px;'><em>\"$dedicatoria\"</em></p>";
    }
    $body.="  <p style='text-align: left;'>&nbsp;</p>
              <h3 style='text-align: center;'>Podr&aacute;s ver la postal completa registrandote con este correo en:</h3>
              <h1 style='text-align: center; font-family: courier,arial,helv&eacute;tica;'><strong><a title='Postales' href='http://localhost/proyecto/original/index.php'>www.$pagina.com</a></strong></h1>
              <p style='text-align: left; padding-left: 30px;'>&nbsp;</p>
              <p style='text-align: left; padding-left: 30px;'><span style='color: #ff0000;'>Datos del remitente:</span></p>
              <p style='text-align: left; padding-left: 30px;'><span style='color: #ff0000;'>Nombre: $username&nbsp;</span></p>
              <p style='text-align: left; padding-left: 30px;'><span style='color: #ff0000;'>Correo: $usermail&nbsp;</span></p>";

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Nueva Postal de '.$usuario;
    $mail->Body    = $body;
    $mail->AltBody = strip_tags($body);

    $mail->send();

} catch (Exception $e) {
    //echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
}
?>
