<?php

// Incluir el archivo de conexión a la base de datos
include 'conn.php';

// Verificar si se recibieron datos por método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Obtener datos del formulario
    $nombreAmbiente = $_POST['nombre_ambiente'];

    // Llamar al procedimiento almacenado
    $stmt = $conn->prepare("CALL CreaAmb(?)");
    $stmt->bind_param("s", $nombreAmbiente);

    if ($stmt->execute()) {
        // Registro exitoso
        echo "Registro exitoso del ambiente";
    } else {
        // Error en la ejecución del procedimiento almacenado
        echo "Error al registrar el ambiente";
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();

} else {
    // Si la solicitud no es POST, retornar un mensaje de error
    echo "Error en la solicitud";
}

// Cerrar la conexión a la base de datos
$conn->close();

?>