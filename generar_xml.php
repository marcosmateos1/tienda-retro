<?php
require 'conexion.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $xml = new DOMDocument("1.0", "UTF-8");
    $xml->formatOutput = true;

    $catalogo = $xml->createElement("catalogo");
    $xml->appendChild($catalogo);

    while ($row = $result->fetch_assoc()) {
        $producto = $xml->createElement("producto");

        $referencia = $xml->createElement("referencia", $row["referencia"]);
        $nombre = $xml->createElement("nombre", $row["nombre"]);
        $precio = $xml->createElement("precio", $row["precio"]);

        $producto->appendChild($referencia);
        $producto->appendChild($nombre);
        $producto->appendChild($precio);

        $catalogo->appendChild($producto);
    }

    // Guardar el archivo XML
    $xml->save("productos.xml");

    // Mostrar HTML bonito
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>Catálogo generado</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
        body {
          background-color: #f8f9fa;
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
        .box {
          background-color: white;
          padding: 40px;
          border-radius: 10px;
          box-shadow: 0 0 8px rgba(0,0,0,0.1);
          text-align: center;
        }
      </style>
    </head>
    <body>
      <div class="box">
        <h2>📦 Catálogo generado con éxito</h2>
        <p>Tu archivo XML ya está listo para descargar.</p>
        <a href="productos.xml" class="btn btn-success mb-2" download>⬇️ Descargar catálogo XML</a><br>
        <a href="tienda.php" class="btn btn-outline-primary">← Volver a la tienda</a>
      </div>
    </body>
    </html>
    ';
} else {
    echo "❌ No hay productos disponibles.";
}

$conn->close();
?>
