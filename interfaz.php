<?php
include 'data_base.php';
// Verificar si una sesión ya está activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("location: login.php");
    exit();
}

// Establecer la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de las tablas
$sql = "SELECT 
            p.idpropietario AS propietario_id, 
            p.nombres AS propietario_nombre, 
            p.apellidos AS propietario_apellido, 
            p.telefono AS propietario_telefono,
            c.idcasa AS casa_id, 
            c.no_casa AS casa_numero, 
            c.direccion AS casa_direccion, 
            c.estado AS casa_estado,
            t.Id_operacion AS operacion_id, 
            t.tipo_operacion AS tipo_operacion
        FROM propietario p
        JOIN casa c ON p.idpropietario = c.Id_propietario
        JOIN tipo_operacion t ON c.tipo_de_operacion = t.Id_operacion";

// Ejecutar la consulta y verificar errores
$result = $conn->query($sql);
if (!$result) {
    die("Error en la consulta SQL: " . $conn->error);
}

// Mostrar los datos en una tabla HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.structure.css">
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.theme.css">
    <link rel="stylesheet" href="style.css">
    <title>Interfaz</title>
</head>
<body>
    <h2>Bienvenido <?php echo $_SESSION['usuario']; ?></h2>
    <div id="tabla_info">
        <table class="ui-widget ui-widget-content">
            <thead class="ui-widget-header">
                <tr>
                    <th>Idpropietario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Idcasa</th>
                    <th>Numero de casa</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Tipo de operacion</th>
                </tr>
            </thead>
            <tbody id="tablaDatos" class="ui-widget-content">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['propietario_id'] . "</td>";
                        echo "<td>" . $row['propietario_nombre'] . "</td>";
                        echo "<td>" . $row['propietario_apellido'] . "</td>";
                        echo "<td>" . $row['propietario_telefono'] . "</td>";
                        echo "<td>" . $row['casa_id'] . "</td>";
                        echo "<td>" . $row['casa_numero'] . "</td>";
                        echo "<td>" . $row['casa_direccion'] . "</td>";
                        echo "<td>" . $row['casa_estado'] . "</td>";
                        echo "<td>" . $row['tipo_operacion'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>No se encontraron resultados.</td></tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr id="totalDeRegistros">Total de registros: <?php echo $result->num_rows; ?></tr>
            </tfoot>
        </table>
    </div>
    <script src="./jquery-3.7.1.min.js"></script>
    <script src="./jquery-ui-1.14.1.custom/jquery-ui.js"></script>
</body>
</html>
<?php
$conn->close();
?>