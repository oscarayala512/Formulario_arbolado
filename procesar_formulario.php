<?php
include 'conexion.php';  // Importar conexión

// Recibir datos del formulario
$nombre = $_POST['name'];
$telefono = $_POST['phone'];
$email = $_POST['email'];
$direccion = $_POST['address'];
$ubicacion = $_POST['ubicacion'];
$direccionArbol = $_POST['direccionArbol'];
$coordenadas = $_POST['coordenadas'];
$tipoSolicitud = $_POST['tipoSolicitud'];

// Verificar tipo de solicitud y almacenar datos específicos
$alturaAproximada = isset($_POST['alturaAproximada']) ? $_POST['alturaAproximada'] : NULL;
$poda = isset($_POST['poda']) ? implode(', ', $_POST['poda']) : NULL;
$razonDerribo = isset($_POST['razonDerribo']) ? $_POST['razonDerribo'] : NULL;
$caracteristicas = isset($_POST['caracteristicas']) ? implode(', ', $_POST['caracteristicas']) : NULL;
$razonTrasplante = isset($_POST['razonTrasplante']) ? $_POST['razonTrasplante'] : NULL;
$riesgo = $_POST['riesgo'];
$detalleRiesgo = $_POST['detalleRiesgo'];
$declaracion = isset($_POST['declaracion']) ? 1 : 0;
$autorizacion = isset($_POST['autorizacion']) ? 1 : 0;

// Manejo de archivos (fotos/videos)
$archivoNombre = $_FILES['archivo']['name'];
$archivoTmp = $_FILES['archivo']['tmp_name'];
$rutaDestino = "uploads/" . $archivoNombre;
move_uploaded_file($archivoTmp, $rutaDestino);

// Insertar en la base de datos
$sql = "INSERT INTO solicitudes (nombre, telefono, email, direccion, ubicacion, direccionArbol, coordenadas, tipoSolicitud, alturaAproximada, poda, razonDerribo, caracteristicas, razonTrasplante, riesgo, detalleRiesgo, declaracion, autorizacion, archivo)
VALUES ('$nombre', '$telefono', '$email', '$direccion', '$ubicacion', '$direccionArbol', '$coordenadas', '$tipoSolicitud', '$alturaAproximada', '$poda', '$razonDerribo', '$caracteristicas', '$razonTrasplante', '$riesgo', '$detalleRiesgo', '$declaracion', '$autorizacion', '$rutaDestino')";

if ($conn->query($sql) === TRUE) {
    echo "Solicitud enviada correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
