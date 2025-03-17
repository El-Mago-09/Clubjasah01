<?php

$conn = new mysqli('localhost', 'root', '', 'club_jasah');

// Comprobar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Habilitar modo de errores
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn->set_charset("utf8mb4"); // Asegurar compatibilidad de caracteres

?>