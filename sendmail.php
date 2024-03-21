<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Configura la dirección de correo electrónico a la que quieres que se envíen los mensajes
    $destinatario = "tudirecciondecorreo@example.com";

    // Recoge los datos del formulario
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $asunto = $_POST['asunto'];
    $mensaje = $_POST['mensaje'];

    // Construye el mensaje de correo electrónico
    $contenido = "Nombre: $nombre\n";
    $contenido .= "Apellidos: $apellidos\n";
    $contenido .= "Email: $email\n";
    $contenido .= "Asunto: $asunto\n";
    $contenido .= "Mensaje:\n$mensaje\n";

    // Envía el correo electrónico
    $asunto = "Nuevo mensaje de formulario de contacto";
    $headers = "From: $email";

    if (mail($destinatario, $asunto, $contenido, $headers)) {
        // Envío exitoso
        echo json_encode(array("status" => "success", "message" => "Mensaje enviado correctamente."));
    } else {
        // Error en el envío
        echo json_encode(array("status" => "error", "message" => "Error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde."));
    }
} else {
    // Si el método de solicitud no es POST, devuelve un error
    echo json_encode(array("status" => "error", "message" => "Método de solicitud incorrecto."));
}
?>