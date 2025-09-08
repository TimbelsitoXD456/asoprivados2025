<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $tipo = htmlspecialchars($_POST['tipo']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $nuevo = [
        "nombre" => $nombre,
        "correo" => $correo,
        "tipo" => $tipo,
        "mensaje" => $mensaje,
        "fecha" => date("Y-m-d H:i:s")
    ];

    $archivo = "mensajes.json";

    if (file_exists($archivo)) {
        $mensajes = json_decode(file_get_contents($archivo), true);
    } else {
        $mensajes = [];
    }

    $mensajes[] = $nuevo;

    file_put_contents($archivo, json_encode($mensajes, JSON_PRETTY_PRINT));

    header("Location: pqr.html?enviado=true");
    exit();
}
?>
