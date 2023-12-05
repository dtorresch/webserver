<?php
// Incluir el archivo de conexión a la base de datos
include 'conn.php';

// Consulta para obtener datos de la tabla categoria
$sql = "SELECT id_cat, desc_cat FROM categoria";

// Ejecutar la consulta
$result = $conn->query($sql);

// Verificar si se encontraron resultados
if ($result->num_rows > 0) {
    // Crear un array para almacenar las categorías
    $categorias = array();

    // Iterar a través de los resultados y agregar cada categoría al array
    while ($row = $result->fetch_assoc()) {
        $categoria = array(
            'id_cat' => $row['id_cat'],
            'desc_cat' => $row['desc_cat']
            // Puedes agregar más campos según sea necesario
        );
        $categorias[] = $categoria;
    }

    // Convertir el array a formato JSON y mostrarlo
    echo json_encode(array("categoria" => $categorias));
} else {
    // No se encontraron categorías
    echo json_encode(array("mensaje" => "No se encontraron categorías."));
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
