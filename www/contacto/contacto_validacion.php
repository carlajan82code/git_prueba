<?php
session_start();

// Incluir las clases de PHPMailer
require ('../src/PHPMailer.php');
require ('../src/Exception.php');

// Instanciar un objeto de la clase PHPMailer
$correo = new PHPMailer\PHPMailer\PHPMailer();

// Recoger datos del formulario
$nombreUsuario = $_POST['nombre'] ?? '';
$apellidoUsuario = $_POST['apellido'] ?? '';
$mail = $_POST['mail'] ?? '';
$tel = $_POST['telefono'] ?? '';
$mensaje = $_POST['comentarios'] ?? '';

// Verificar si se ha enviado el formulario
if (isset($_POST['contacto'])) {
    // Configurar el remitente y el destinatario
    $correo->setFrom($mail, "$nombreUsuario $apellidoUsuario");
    $correo->addAddress("jorgesr10@gmail.com");

    // Construir el cuerpo del correo
    $cuerpo = "
        <html> 
            <head> 
                <title>Prueba de envio de correo</title> 
            </head>
            <body> 
                <h1>Solicitud de contacto desde correo de prueba</h1>
                <p> 
                    Nombre: $nombreUsuario $apellidoUsuario <br>
                    Contacto: $mail - $tel <br>
                    Mensaje: $mensaje
                </p> 
            </body>
        </html>";

    // Configurar el cuerpo del correo
    $correo->isHTML(true);
    $correo->Subject = 'Solicitud de contacto';
    $correo->Body = $cuerpo;

    // Enviar el correo y mostrar un mensaje al usuario
    if ($correo->send()) {
        echo "<h4>Enviado Exitosamente</h4>";
    } else {
        echo "<h4>No se pudo enviar el correo</h4>";
    }

    // Redireccionar al usuario si es necesario
    // header("Location: ../index.php");
}
?>

