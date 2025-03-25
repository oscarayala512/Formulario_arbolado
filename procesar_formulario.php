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

// Asignar un valor predeterminado si las variables no existen en el formulario
$nombreEdificio = isset($_POST['nombreEdificio']) ? $_POST['nombreEdificio'] : NULL; 
$fotos = isset($_POST['fotos']) ? $_POST['fotos'] : NULL;

// Manejo de archivos (fotos/videos)
$archivos = $_FILES['archivo']; // Accede a los archivos cargados

// Array para almacenar las rutas de los archivos
$rutasDestino = [];

foreach ($archivos['tmp_name'] as $key => $tmpName) {
    $archivoNombre = $archivos['name'][$key];
    $rutaDestino = "uploads/" . $archivoNombre;
    
    if (move_uploaded_file($tmpName, $rutaDestino)) {
        $rutasDestino[] = $rutaDestino; // Almacena la ruta de los archivos cargados
    } else {
        echo "Error al cargar el archivo: $archivoNombre";
    }
}

// Convertir el array de rutas en una cadena separada por comas
$archivosSubidos = implode(', ', $rutasDestino);

// Sentencia SQL para insertar los datos en la base de datos
$sql = "INSERT INTO solicitudes 
    (nombre_completo, telefono, email, direccion_contacto, ubicacion, nombre_edificio, direccion_arbol, coordenadas, tipo_solicitud, altura_aproximada, poda, razon_derribo, caracteristicas_derribo, razon_trasplante, riesgo, detalle_riesgo, fotos, archivo, declaracion, autorizacion)
    VALUES 
    ('$nombre', '$telefono', '$email', '$direccion', '$ubicacion', '$nombreEdificio', '$direccionArbol', '$coordenadas', '$tipoSolicitud', '$alturaAproximada', '$poda', '$razonDerribo', '$caracteristicas', '$razonTrasplante', '$riesgo', '$detalleRiesgo', '$fotos', '$archivosSubidos', '$declaracion', '$autorizacion')";

// Ejecutar la consulta SQL
if ($conn->query($sql) === TRUE) {
    echo "Solicitud enviada correctamente.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
