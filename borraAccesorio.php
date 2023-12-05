<?php
include 'conn.php';

// Supongamos que $idAccesorio contiene el ID del accesorio que deseas actualizar
$idAccesorio = $_POST['idAcc']; // Asegúrate de obtener el ID del accesorio desde tu solicitud POST

$sql = "UPDATE accesorio SET estado = 'B' WHERE id_acc = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $idAccesorio);

    if ($stmt->execute()) {
        echo "Estado del accesorio actualizado exitosamente.";
    } else {
        echo "Error al ejecutar la actualización: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Error al preparar la consulta: " . $conn->error;
}

$conn->close();
?>