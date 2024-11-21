/**
 * 🌐 Archivo de autenticación de usuarios
 * 
 * Este archivo PHP maneja la autenticación de usuarios mediante un formulario POST.
 * 
 * Funcionalidades principales:
 * - Inicia una sesión PHP.
 * - Verifica que los campos de usuario y contraseña no estén vacíos.
 * - Realiza una consulta a la base de datos para verificar las credenciales del usuario.
 * - Redirige al usuario a la interfaz principal si las credenciales son correctas.
 * - Muestra mensajes de error si los campos están vacíos o las credenciales son incorrectas.
 * 
 * Variables:
 * - $username: Almacena el nombre de usuario ingresado en el formulario.
 * - $password: Almacena la contraseña ingresada en el formulario.
 * - $sql: Consulta SQL para verificar las credenciales del usuario en la base de datos.
 * - $result: Resultado de la consulta SQL.
 * 
 * Dependencias:
 * - data_base.php: Archivo que contiene la conexión a la base de datos.
 * - interfaz.php: Archivo al que se redirige en caso de inicio de sesión exitoso.
 * 
 * ⚠️ Nota: Asegúrese de que la conexión a la base de datos esté correctamente configurada en 'data_base.php'.
 * 
 * @package Autenticacion
 */
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Document</title>
</head>
<body>
<?php
include 'data_base.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['usuario'];
    $password = $_POST['contraseña'];

    if (empty($username) || empty($password)) {
        echo "<h2>Por favor, complete todos los campos.</h2>";
    } else {
        // Aquí se ejecutan las consultas a la base de datos
        $sql = "SELECT * FROM usuarios_autorizados WHERE email='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['usuario'] = $username;
            echo "Inicio de sesión exitoso.";
           header("location:interfaz.php");
           exit();
        } else {
            echo "<h2>Nombre de usuario o contraseña incorrectos.</h2>";
        }
    }
}
?>   
</body>
</html>