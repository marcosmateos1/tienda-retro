<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: login.html");
    exit();
}

require 'conexion.php';

$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Tienda Retro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .card {
      margin-bottom: 20px;
    }
    .card img {
      height: 200px;
      object-fit: cover;
    }
    body {
      background-color: #f8f9fa;
    }
    .topbar {
      background-color: #343a40;
      color: white;
      padding: 10px 20px;
      margin-bottom: 30px;
    }
  </style>
</head>
<body>

<div class="topbar d-flex justify-content-between align-items-center px-4 py-2 bg-dark text-white mb-4 rounded">
  <div>
    <strong>Bienvenido, <?php echo $_SESSION["usuario"]; ?></strong>
  </div>
  <div class="d-flex gap-2">
    <a href="mis_compras.php" class="btn btn-outline-light btn-sm">🛍️ Mis Compras</a>
    <a href="generar_xml.php" class="btn btn-outline-success btn-sm">📦 Descargar catálogo XML</a>
    <a href="logout.php" class="btn btn-danger btn-sm">🔒 Cerrar sesión</a>
  </div>
</div>


<div class="mb-4 text-end">
  <a href="cliente.html" class="btn btn-outline-secondary">💬 Completar mis datos de cliente</a>
</div>


<div class="container">
  <h2 class="mb-4">Catálogo de camisetas retro</h2>
  <div class="row">

  <?php
  if ($resultado->num_rows > 0) {
      while ($fila = $resultado->fetch_assoc()) {
          echo '<div class="col-md-4">';
          echo '  <div class="card">';
          echo '    <img src="' . $fila["imagen"] . '" class="card-img-top" alt="Camiseta">';
          echo '    <div class="card-body">';
          echo '      <h5 class="card-title">' . $fila["nombre"] . '</h5>';
          echo '      <p class="card-text">Precio: ' . $fila["precio"] . ' €</p>';
          echo '      <form action="comprar.php" method="POST">';
          echo '        <input type="hidden" name="referencia" value="' . $fila["referencia"] . '">';
          echo '        <button type="submit" class="btn btn-primary">Comprar</button>';
          echo '      </form>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
      }
  } else {
      echo "<p>No hay productos disponibles.</p>";
  }
  ?>

  </div>
</div>

</body>
</html>
