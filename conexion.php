<?php
$servername = "localhost";  // Cambia si es necesario
$username = "root";         // Usuario de MySQL
$password = "";             // Contraseña de MySQL
$dbname = "arbolado_urbano"; // Nombre de la base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Establecer codificación de caracteres UTF-8
$conn->set_charset("utf8");
?>
