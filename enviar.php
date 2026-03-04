<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Recoger los datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];
    
    // 2. Configuración del correo
    $destinatario = "contacto@daadco.com.mx";
    $asunto = "Nueva Cotización de: " . $nombre;
    
    // 3. Diseño del cuerpo del correo (HTML)
    $cuerpo = "
    <html>
    <head>
      <title>Nueva Cotización DAADCO</title>
    </head>
    <body style='font-family: Arial, sans-serif; color: #333;'>
      <div style='background-color: #0056b3; color: white; padding: 20px; text-align: center;'>
        <h2>Industrias DAADCO</h2>
      </div>
      <div style='padding: 20px; border: 1px solid #eee;'>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Correo:</strong> $email</p>
        <p><strong>Mensaje:</strong><br>$mensaje</p>
      </div>
      <p style='font-size: 12px; color: #777;'>Este correo fue enviado desde el formulario de daadco.com.mx</p>
    </body>
    </html>
    ";

    // 4. Encabezados para enviar HTML y remitente
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: DAADCO Web <contacto@daadco.com.mx>" . "\r\n";

    // 5. Enviar correo
    if(mail($destinatario, $asunto, $cuerpo, $headers)){
        header("Location: index.html?status=success");
    } else {
        header("Location: index.html?status=error");
    }
}
?>
