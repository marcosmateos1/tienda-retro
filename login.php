<?php
session_start(); // Inicia la sesión

require 'conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    // Preparamos la consulta para evitar inyecciones SQL
    $sql = "SELECT contraseña FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hash);
        $stmt->fetch();

        if (password_verify($contraseña, $hash)) {
            $_SESSION["usuario"] = $usuario;
            header("Location: tienda.php");
            exit();
        } else {
            echo "❌ Contraseña incorrecta.";
        }
    } else {
        echo "❌ Usuario no encontrado.";
    }

    $stmt->close();
}
$conn->close();
?>
