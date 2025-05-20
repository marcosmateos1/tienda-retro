<?php
require 'conexion.php';

$usuario = $_POST["usuario"];
$contraseña = password_hash($_POST["contraseña"], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (usuario, contraseña) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $contraseña);

if ($stmt->execute()) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>Registro Exitoso</title>
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
        <h2>✅ Usuario registrado correctamente</h2>
        <p>Puedes iniciar sesión ahora mismo:</p>
        <a href="login.html" class="btn btn-primary mt-3">Iniciar sesión</a>
      </div>
    </body>
    </html>
    ';
} else {
    echo "❌ Error: " . $stmt->error;
}
?>
