<?php

$servername = "localhost";
$username = "user_ejem";
$password = "user";
$dbname = "base_ejemplo";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>