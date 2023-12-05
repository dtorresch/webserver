<?php

// Incluir el archivo de conexión a la base de datos
include 'conn.php';

// Verificar si se recibió el id_ambiente por método POST
if (isset($_POST['id_ambiente'])) {
    // Obtener el id_ambiente desde la solicitud POST
    $idAmbiente = $_POST['id_ambiente'];

    // Consulta para obtener los accesorios según el id_ambiente
    $sql = "SELECT A.*, C.desc_cat FROM accesorio as A
JOIN categoria as C ON A.id_cat = C.id_cat
WHERE A.id_amb = '$idAmbiente'";
    
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        // Crear un array para almacenar los accesorios
        $accesorios = array();

        // Iterar a través de los resultados y agregar cada accesorio al array
        while ($row = $result->fetch_assoc()) {
            
                $accesorio = array(
                    'IDAccesorio' => $row['id_acc'],
                    'Descripcion' => $row['desc_acc'],
                    'idAmb' => $row['id_amb'],
                    'Tipo' => $row['desc_cat'],
                    'IDComputadora' => $row['id_comp'],
                    'fecha traslado' => $row['fecha_traslado'],
                    'idUsu' => $row['id_usu'],
                    'Estado' => $row['estado']
                    // Agrega más campos según sea necesario
                );
                $accesorios[] = $accesorio;
            
        }

        // Convertir el array a formato JSON y mostrarlo
        echo json_encode($accesorios);
    } else {
        // No se encontraron accesorios para el id_ambiente dado
        echo "No se encontraron accesorios para el id_ambiente proporcionado.";
    }
} else {
    // Si no se proporcionó el id_ambiente, retornar un mensaje de error
    echo "Error: id_ambiente no proporcionado en la solicitud.";
}

// Cerrar la conexión a la base de datos
$conn->close();

?>