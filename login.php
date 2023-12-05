<?php

// Incluir el archivo de conexión
include 'conn.php';


    // Obtener los datos del formulario
    $email = $_POST['user'];
    
    $password = $_POST['pass'];
    
 
    // Consulta para verificar las credenciales
    $sql = "SELECT id_usu FROM usuario WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $idUsuario = $row['id_usu'];
        // Credenciales válidas
        echo "Login exitoso|" . $idUsuario;
    } else {
        // Credenciales inválidas
        echo "Login fallido";
    }



// Cerrar la conexión a la base de datos (puedes mover esto al final del script si lo prefieres)
$conn->close();

?>