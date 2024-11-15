<?php
// Datos de la base de datos
$servername = "localhost";
$username = "root";
$password = "Ufax1824";
$dbname = "bdvh";
// Creando la conexxion con la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
// revisar la conexion
if ($conn->connect_error) {
    // si hay un error en la conexion, se muestra un mensaje de error
die("Connection failed: " . $conn->connect_error);
}
// si la conexion es exitosa, se muestra un mensaje de exito
//echo "Connected successfully";

?>