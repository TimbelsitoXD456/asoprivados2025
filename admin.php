<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.html");
    exit();
}

$archivo = "mensajes.json";
$mensajes = [];
if (file_exists($archivo)) {
    $mensajes = json_decode(file_get_contents($archivo), true);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mensajes PQR - Admin</title>
  <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
  <style>
    body { font-family:'Russo One',sans-serif;background:#f4fdf7;padding:2rem; }
    h2 { color:#27ae60;text-align:center;margin-bottom:2rem; }
    .mensaje { background:white;border-radius:12px;padding:1rem;margin-bottom:1rem;box-shadow:0 2px 6px rgba(0,0,0,0.1); }
    .mensaje strong { color:#27ae60; }
    .logout { display:block;text-align:center;margin-top:2rem; }
    .logout a { color:white;background:#c0392b;padding:0.7rem 1.5rem;border-radius:8px;text-decoration:none; }
    .logout a:hover { background:#922b21; }
  </style>
</head>
<body>
  <h2>📩 Mensajes recibidos</h2>
  <?php if(empty($mensajes)): ?>
    <p style="text-align:center;">No hay mensajes registrados.</p>
  <?php else: ?>
    <?php foreach($mensajes as $m): ?>
      <div class="mensaje">
        <p><strong>Nombre:</strong> <?= htmlspecialchars($m['nombre']) ?></p>
        <p><strong>Correo:</strong> <?= htmlspecialchars($m['correo']) ?></p>
        <p><strong>Tipo:</strong> <?= htmlspecialchars($m['tipo']) ?></p>
        <p><strong>Mensaje:</strong> <?= nl2br(htmlspecialchars($m['mensaje'])) ?></p>
        <p><em><?= $m['fecha'] ?></em></p>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
  <div class="logout">
    <a href="logout.php">Cerrar sesión</a>
  </div>
</body>
</html>
