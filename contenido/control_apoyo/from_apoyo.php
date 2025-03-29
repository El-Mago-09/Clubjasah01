<?php
require '../../PHPMailer-master/src/PHPMailer.php';
require '../../PHPMailer-master/src/SMTP.php';
require '../../PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $mail = new PHPMailer(true);
    
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Servidor SMTP (Gmail, Outlook, etc.)
        $mail->SMTPAuth = true;
        $mail->Username = 'zambrano2310m@gmail.com';  // Tu correo
        $mail->Password = 'ogzl pcrk knpv xyic';  // Tu contraseña (O usa una contraseña de aplicación)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom($email, $nombre);
        $mail->addAddress('zambrano2310m@gmail.com'); // Tu correo donde recibirás los mensajes

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = "Mensaje de contacto de $nombre";
        $mail->Body = "<p><strong>Nombre:</strong> $nombre</p>
                       <p><strong>Correo:</strong> $email</p>
                       <p><strong>Mensaje:</strong> $mensaje</p>";

        // Enviar correo
        $mail->send();
        echo '<script>
                alert("El mensaje fue enviado correctamente.");
                window.location.href = "../donaciones.php";
                </script>';

    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
}
?>
