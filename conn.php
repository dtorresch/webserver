<?php
    $server="localhost";
    $username="id20822099_jiro15";
    $password= "Jose1595/";
    $database = "id20822099_bd_inventario";
    
    $conn = new mysqli($server, $username, $password, $database);
    $conn->set_charset("utf8");
    
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    
?>