<?php

// Incluir el archivo de conexión a la base de datos
include 'conn.php';

// Verificar si se recibieron los parámetros necesarios
if (isset($_POST['numIteraciones'], $_POST['descAcc'], $_POST['idAmb'], $_POST['nombreCat'], $_POST['idUsu'])) {
    // Obtener los valores de los parámetros
    $numIteraciones = $_POST['numIteraciones'];
    $descAcc = $_POST['descAcc'];
    $idAmb = $_POST['idAmb'];
    $nombreCat = $_POST['nombreCat'];
    $idUsu = $_POST['idUsu'];

    // Llamar al procedimiento almacenado
    $stmt = $conn->prepare("CALL CreaAcc(?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $numIteraciones, $descAcc, $idAmb, $nombreCat, $idUsu);
    
    // Verificar si la llamada al procedimiento fue exitosa
    if ($stmt->execute()) {
        echo "Accesorios creados exitosamente.";
    } else {
        echo "Error al crear accesorios: " . $stmt->error;
    }

    // Cerrar la conexión a la base de datos
    $stmt->close();
} else {
    // Si no se proporcionaron todos los parámetros, retornar un mensaje de error
    echo "Error: Falta uno o más parámetros.";
}

// Cerrar la conexión a la base de datos
$conn->close();

?>