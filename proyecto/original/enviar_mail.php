<?php

    session_start();
    include('./configuraBD.php');
    include('./gmailData.php');

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Load Composer's autoloader
    require 'vendor/autoload.php';

    $webName = "POSTALES CHIDAS MX";

    //Datos del que envía
    $usernick = $_SESSION['usuario'];
    $username = $_SESSION['nombre'];
    $usermail = $_SESSION['correo'];

    //Datos para agregar al correo
    $imgID = $_POST['imgID'];
    $destMail = $_POST['destMail'];
    $destName = $_POST['destName'];
    $dedica = $_POST['dedicatoria']//?


    $query = 'SELECT nombre_imagen, archivo FROM imagen WHERE id_imagen = '$imgID';';
    $res = mysqli_query($conexion,$query);
    $row = mysqli_fetch_row($res);
    $imgName = $row[0];
    $img = $row[1];

    $sqlAlumno = 'SELECT * FROM alumno WHERE boleta = '$boleta'';
    $resAlumno = mysqli_query($conexion,$sqlAlumno);
    $infAlumno = mysqli_fetch_row($resAlumno);

    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                    // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $correo;                                // SMTP username
        $mail->Password   = $contrasena;                            // SMTP password
        $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('Esto al parecer no afecta por usar el servidor gmail :v', 'Postales Chidas MX');
        $mail->addAddress($destMail,$destName);     // Add a recipient

        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment($img, $imgName.'.jpg');    // Optional name
        $mail->AddEmbeddedImage($img, 'my-attach', $imgName.'.jpg');

        //Maybe mandar el logo de la pagina/empresa
        $body = " <h1 style='text-align: center; font-family: cambria;'>.$usernick. te ha enviado una postal a trav&eacute;s de <strong><span style='color: #0000ff;'><span style='color: #3949ab;'>.$webName.</span></span></strong>!</h1>
                  <p style='text-align: left;'>Hola .$destName., has recibido una nueva postal de .$username. la cual podr&aacute;s ver a continuaci&oacute;n:</p>
                  <p style='text-align: left; padding-left: 30px;'><em>'.$dedica.'</em></p>
                  <p style='padding-left: 30px; text-align: center;''><img src='cid:my-attach' alt='.$imgName.' /></p>
                  <p style='text-align: left; padding-left: 30px;'>&nbsp;</p>
                  <p style='text-align: left; padding-left: 30px;'><span style='color: #ff0000;'>Datos del remitente:</span></p>
                  <p style='text-align: left; padding-left: 30px;'><span style='color: #ff0000;'>Nombre: .$username.&nbsp;</span></p>
                  <p style='text-align: left; padding-left: 30px;'><span style='color: #ff0000;'>Correo: .$usermail.&nbsp;</span></p>
                  <p style='text-align: left;'>&nbsp;</p>
                  <h3 style='text-align: center;'>Envia postales personalizadas como esta accediendo a:</h3>
                  <h1 style='text-align: center; font-family: courier,arial,helv&eacute;tica;'><strong><a title='Postales' href='http://localhost/proyecto/original/index.php'>www.postaleschidasmx.com</a></strong></h1>";

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Nueva Postal de '.$usernick;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        mysqli_close($conexion);
        header('Location: PLANTILLA.php');//CAMBIAR AQUI PLANTILLA
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
    }
?>
