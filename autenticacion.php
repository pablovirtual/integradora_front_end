<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <!--concexion a la base de datos-->
    <?php
    include 'data_base.php';
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = isset($_POST['usuario']) ? $_POST['usuario'] : null;
        $password = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;

        if (empty($email) || empty($password)) {
            echo "<h2>Por favor llena todos los campos</h2>";
        } else {
            // Mover la declaración de $stmt dentro del bloque else
            $stmt = $conn->prepare("SELECT * FROM usuarios_autorizados WHERE email = ? AND password = ?");
            if ($stmt) { // Verificar si $stmt se creó correctamente
                $stmt->bind_param("ss", $email, $password);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows > 0) {
                    $stmt->bind_result($id, $email, $password); // Vincula las columnas ID, email y password
                    $stmt->fetch();
                    $_SESSION['usuario'] = $email; // Almacena el email del usuario en la sesión
                    header("location: interfaz.php");
                    exit(); // Detener la ejecución del script después de redirigir
                } else {
                    echo "<h2>Usuario o contraseña incorrectos</h2>";
                }
                $stmt->close(); // Cerrar $stmt después de su uso
            } else {
                echo "Error en la consulta: " . $conn->error;
            }
        }
    }
    ?>


</body>

</html>