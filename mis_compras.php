<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.html");
    exit();
}

require 'conexion.php';

$usuario = $_SESSION["usuario"];

$sql = "SELECT c.referencia_producto, p.nombre, p.precio, p.imagen, c.fecha
        FROM compras c
        JOIN productos p ON c.referencia_producto = p.referencia
        WHERE c.usuario = ?
        ORDER BY c.fecha DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Mis Compras</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .compra {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
    }
    .compra img {
      width: 120px;
      height: auto;
      border-radius: 5px;
      margin-right: 20px;
      object-fit: cover;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h2 class="mb-4 text-center">🛍️ Mis compras - <?php echo $usuario; ?></h2>
  <a href="tienda.php" class="btn btn-outline-primary mb-4">← Volver a la tienda</a>

  <?php
  if ($resultado->num_rows > 0) {
      while ($fila = $resultado->fetch_assoc()) {
          echo '<div class="compra">';
          echo '<img src="' . $fila["imagen"] . '" alt="Camiseta comprada">';
          echo '<div>';
          echo '<h5>' . $fila["nombre"] . '</h5>';
          echo '<p><strong>Precio:</strong> ' . $fila["precio"] . ' €</p>';
          echo '<p><strong>Fecha de compra:</strong> ' . $fila["fecha"] . '</p>';
          echo '</div>';
          echo '</div>';
      }
  } else {
      echo '<p class="text-center">❌ Aún no has realizado ninguna compra.</p>';
  }

  $stmt->close();
  $conn->close();
  ?>
</div>

</body>
</html>
