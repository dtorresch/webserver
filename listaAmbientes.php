<?php
// Incluir el archivo de conexión a la base de datos
include 'conn.php';

// Consulta para obtener la lista de productos con solo id y nombre
$sql = "SELECT id_amb, desc_amb FROM ambiente";
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar los productos
    $ambientes = array();

    // Iterar a través de los resultados y agregar cada producto al array
    while ($row = $result->fetch_assoc()) {
        $ambiente = array(
            
            'nombre' => $row['desc_amb'],
            'id' => $row['id_amb']
        );
        $ambientes[] = $ambiente;
    }

    // Convertir el array a formato JSON y mostrarlo
    echo json_encode($ambientes);
} else {
    // No se encontraron productos
    echo "No se encontraron productos.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>