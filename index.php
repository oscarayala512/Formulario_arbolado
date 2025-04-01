<?php
include 'conexion.php';  // Conexión a la base de datos

$sql = "SELECT * FROM solicitudes ORDER BY id DESC"; // Consulta SQL
$resultado = $conn->query($sql);

// Verificar si la consulta tuvo éxito
if (!$resultado) {
    die("Error en la consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Solicitudes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f8f9fa;
        }
        h2 {
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #007bff;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>Lista de Solicitudes de Arbolado Urbano</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Teléfono</th>
        <th>Email</th>
        <th>Dirección</th>
        <th>Ubicación</th>
        <th>Dirección Árbol</th>
        <th>Coordenadas</th>
        <th>Tipo de Solicitud</th>
        <th>Detalles</th>
        <th>Riesgo</th>
        <th>Archivos</th>
        <th>Fecha</th>
    </tr>

    <?php
    if ($resultado->num_rows > 0) {
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($fila['id']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['nombre_completo']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['telefono']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['email']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['direccion_contacto']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['ubicacion']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['direccion_arbol']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['coordenadas']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['tipo_solicitud']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['detalle_riesgo']) . "</td>";
            echo "<td>" . htmlspecialchars($fila['riesgo']) . "</td>";

            // Mostrar archivos si existen
            echo "<td>";
            if (!empty($fila['archivo'])) {
                $archivos = explode(',', $fila['archivo']);
                foreach ($archivos as $archivo) {
                    echo "<a href='" . htmlspecialchars($archivo) . "' target='_blank'>Ver Archivo</a><br>";
                }
            } else {
                echo "Sin archivos";
            }
            echo "</td>";

            echo "<td>" . htmlspecialchars($fila['fecha_registro']) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='13'>No hay solicitudes registradas.</td></tr>";
    }
    ?>
</table>

</body>
</html>

<?php
$conn->close();
?>


