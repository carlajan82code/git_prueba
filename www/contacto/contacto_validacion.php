<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../src/Exception.php';
require '../src/PHPMailer.php';
require '../src/SMTP.php';

// Instanciar un objeto de la clase PHPMailer
$mail = new PHPMailer();

// Recoger datos del formulario
$nombreUsuario = $_POST['nombre'] ?? '';
$correito = $_POST['mail'] ?? '';
$tel = $_POST['telefono'] ?? '';
$mensaje = $_POST['comentarios'] ?? '';

$cuerpo = "
<html>
    <head>
        <title>Prueba de envio de correo</title>
    </head>
    <body>
        <h1>Solicitud de contacto desde correo de prueba</h1>
        <p>
            Nombre: $nombreUsuario <br>
            Mensaje: $mensaje
        </p>
    </body>
</html>";

// Verificar si se ha enviado el formulario
if (isset($_POST['contacto'])) {
    try{

        $mail->SMTPDebug = 0;
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.office365.com';   
        //Servers
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'seyfert@outlook.es';                     //SMTP username
        $mail->Password   = 'grupo142024';                               //SMTP password
        $mail->SMTPSecure = 'STARTTLS';            //Enable implicit TLS encryption
        $mail->Port       = 587; 
    //Recipients
    $mail->setFrom('carlajan82@hotmail.com'); 
    $mail->addAddress('rojascarlajanet@gmail.com');
    $mail->addAddress('jorgesr10@gmail.com');     //Add a recipient
    $mail->addAddress('sabrina.eliana.sanchez@gmail.com');     //Add a recipient
    $mail->addAddress('marcomarquezb09@gmail.com');     //Add a recipient
    // $mail->addReplyTo('jorgesr10@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML();                                  //Set email format to HTML
    $mail->Subject = 'Asunto muy Importante';
    $mail->Body    = $cuerpo;

    $mail->send();

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


}

header("Location: ../index.php");
 

?>

