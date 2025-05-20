<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.html");
    exit();
}

require 'conexion.php';

$usuario = $_SESSION["usuario"];
$referencia = $_POST["referencia"];

$sql = "INSERT INTO compras (usuario, referencia_producto) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $referencia);

if ($stmt->execute()) {
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>Compra exitosa</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
        body {
          background-color: #f8f9fa;
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
        <h2>✅ Compra realizada con éxito</h2>
        <p>Gracias por tu compra. ¡Esperamos que disfrutes tu camiseta retro!</p>
        <a href="tienda.php" class="btn btn-primary mt-3">Volver a la tienda</a>
      </div>
    </body>
    </html>
    ';
} else {
    echo "❌ Error en la compra: " . $stmt->error;
}
?>
