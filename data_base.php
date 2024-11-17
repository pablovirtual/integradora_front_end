<?php
// data_base.php
$servername = "localhost";
$username = "root";
$password = "Ufax1824";
$dbname = "bdvh";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>