<?php
$servername = "localhost";  // Cambia si es necesario
$username = "root";         // Tu usuario de MySQL
$password = "";             // Tu contraseña de MySQL
$dbname = "arbolado_urbano";       // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
