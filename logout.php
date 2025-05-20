<?php
session_start();
session_unset();     // Borra todas las variables de sesión
session_destroy();   // Elimina la sesión actual

header("Location: login.html"); // Redirige al login
exit();
?>
