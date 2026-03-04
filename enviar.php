<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];
    
    $destinatario = "contacto@daadco.com.mx";
    $asunto = "Nueva Cotización: " . $nombre;
    
    // Formato mejorado con tabla y mejores espacios
    $cuerpo = "
    <html>
    <body style='font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;'>
      <div style='max-width: 600px; margin: 0 auto; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 5px rgba(0,0,0,0.1);'>
        <div style='background-color: #0056b3; color: #ffffff !important; padding: 25px; text-align: center;'>
          <img src='https://raw.githubusercontent.com/cesarperez6228/industrias-daadco/main/logo.png' alt='Logo DAADCO' style='width: 120px; height: auto; margin-bottom: 15px; display: block; margin-left: auto; margin-right: auto;'>
          
          <h1 style='margin: 0; font-size: 22px; color: #ffffff !important;'>Industrias DAADCO</h1>
          <p style='margin: 5px 0 0; opacity: 0.8; color: #ffffff !important;'>Nueva solicitud de cotización</p>
        </div>
        <div style='padding: 30px;'>
          <table style='width: 100%; border-collapse: collapse;'>
            <tr>
              <td style='padding: 10px 0; border-bottom: 1px solid #eee; font-weight: bold; width: 30%;'>Cliente:</td>
              <td style='padding: 10px 0; border-bottom: 1px solid #eee;'>$nombre</td>
            </tr>
            <tr>
              <td style='padding: 10px 0; border-bottom: 1px solid #eee; font-weight: bold;'>Correo:</td>
              <td style='padding: 10px 0; border-bottom: 1px solid #eee;'>$email</td>
            </tr>
          </table>
          <div style='margin-top: 25px;'>
            <p style='font-weight: bold; margin-bottom: 10px;'>Mensaje del interesado:</p>
            <div style='background: #f4f4f4; padding: 15px; border-radius: 5px; font-style: italic;'>
              $mensaje
            </div>
          </div>
        </div>
        <div style='background: #eee; padding: 15px; text-align: center; font-size: 12px; color: #666;'>
          Este es un correo automático enviado desde daadco.com.mx
        </div>
      </div>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: DAADCO Web <contacto@daadco.com.mx>" . "\r\n";

    if(mail($destinatario, $asunto, $cuerpo, $headers)){
        header("Location: index.html?status=success");
    } else {
        header("Location: index.html?status=error");
    }
}
?>
