/**
 * Establece una conexión con la base de datos MySQL.
 *
 * Variables:
 * $servername - Nombre del servidor de la base de datos.
 * $username - Nombre de usuario para acceder a la base de datos.
 * $password - Contraseña para acceder a la base de datos.
 * $dbname - Nombre de la base de datos.
 *
 * Proceso:
 * 1. Crear una nueva instancia de la clase mysqli con los parámetros de conexión.
 * 2. Verificar si la conexión ha fallado.
 *    - Si la conexión falla, se detiene la ejecución y se muestra un mensaje de error.
 *
 * @throws Exception Si la conexión a la base de datos falla.
 */
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