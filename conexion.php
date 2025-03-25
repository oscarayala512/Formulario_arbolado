<?php
$servername = "localhost";  
$username = "root";        
$password = "";             
$dbname = "arbolado_urbano";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);  // Muestra un mensaje de error si no se puede conectar
} else {
    echo "Conexión exitosa a la base de datos";  // Muestra un mensaje si la conexión es exitosa
}

// Habilitar reportes de errores en MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Establecer codificación de caracteres UTF-8
    $conn->set_charset("utf8");

} catch (Exception $e) {
    die("Error de conexión a la base de datos. Contacte al administrador.");
}
?>
