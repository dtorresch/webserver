<?php

// Incluir el archivo de conexión a la base de datos
include 'conn.php';

// Verificar si se recibieron los parámetros necesarios
if (isset($_POST['descAcc'], $_POST['idAmb'], $_POST['nombreCat'], $_POST['idUsu'], $_POST['estado'], $_POST['idAccesorio'])) {
    // Obtener los valores de los parámetros
    $descAcc = $_POST['descAcc'];
    $idAmb = $_POST['idAmb'];
    $nombreCat = $_POST['nombreCat'];
    $idUsu = $_POST['idUsu'];
    $estado = $_POST['estado'];
    $idAccesorio = $_POST['idAccesorio'];

    // Obtener el id de la categoría
    $sqlCat = "SELECT id_cat FROM categoria WHERE desc_cat = '$nombreCat' LIMIT 1";
    $resultCat = $conn->query($sqlCat);

    if ($resultCat->num_rows > 0) {
        $rowCat = $resultCat->fetch_assoc();
        $idCat = $rowCat['id_cat'];

        // Consulta SQL para actualizar el accesorio
        $sqlUpdate = "UPDATE accesorio 
                      SET desc_acc = '$descAcc', 
                          id_amb = '$idAmb', 
                          id_cat = '$idCat', 
                          fecha_traslado = CURRENT_DATE(),  -- Actualizar la fecha con la fecha actual
                          id_usu = '$idUsu', 
                          estado = '$estado' 
                      WHERE id_acc = '$idAccesorio'";

        // Ejecutar la consulta
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "Accesorio actualizado con éxito";
        } else {
            echo "Error al actualizar el accesorio: " . $conn->error;
        }
    } else {
        echo "Error al obtener el ID de la categoría";
    }
} else {
    // Si no se proporcionaron todos los parámetros, retornar un mensaje de error
    echo "Error: Falta uno o más parámetros.";
}

// Cerrar la conexión a la base de datos
$conn->close();

?>
