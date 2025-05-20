<?php
require 'conexion.php';

$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$fecha_nacimiento = $_POST["fecha_nacimiento"];
$genero = $_POST["genero"];

$sql = "INSERT INTO clientes (nombre, apellidos, correo, fecha_nacimiento, genero)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $nombre, $apellidos, $correo, $fecha_nacimiento, $genero);

if ($stmt->execute()) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>Registro completado</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
        body {
          background-color: #f4f4f4;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
        .message-box {
          background-color: white;
          padding: 40px;
          border-radius: 10px;
          box-shadow: 0 0 10px rgba(0,0,0,0.1);
          text-align: center;
        }
      </style>
    </head>
    <body>
      <div class="message-box">
        <h2>✅ Cliente registrado correctamente</h2>
        <p>Gracias por completar tus datos.</p>
        <a href="tienda.php" class="btn btn-primary mt-3">Volver a la tienda</a>
      </div>
    </body>
    </html>
    ';
} else {
    echo "❌ Error: " . $stmt->error;
}
?>
