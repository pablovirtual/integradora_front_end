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
        FROM casa c
        JOIN propietario p ON c.Id_propietario = p.idpropietario
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
    <!--boton para actualizar la tabla-->
    <button id="ActualizarTabla" type="reset">Mostrar todos los registros</button>
    <!--aqui debo de agregar  el apartado para agregar un nuevo elemento-->
    <div class="agregar">
        <h2>Agregar datos</h2>
        <div class="ui-widget ui-widget-content">
            <input type="text" id="nombres" name="nombres" placeholder="Nombres">
            <input type="text" id="apellidos" name="apellidos" placeholder="Apellidos">
            <input type="text" id="telefono" name="telefono" placeholder="Telefono">
            <input type="text" id="no_casa" name="no_casa" placeholder="No. Casa">
            <input type="text" id="direccion" name="direccion" placeholder="Direccion">
            <input type="text" id="estado" name="estado" placeholder="Estado">
            <input type="text" id="tipo_operacion" name="tipo_operacion" placeholder="Tipo de Operacion">
            <button id="agregarElemento">Agregar</button>
        </div>
    </div>
    <!--aqui debe de terminal la tabla-->
    <!-- input buscar--->
    <h2>Buscar</h2>
    <div class="entradaBusqueda">
        <input type="text" class="ui-widget ui-widget-content" id="buscar" name="busqueda" placeholder="Ingresa el dato" required />
        <!--boton de busqueda-->
        <button id="buscarDato" type="submit" class="ui-widget ui-accordion-content">Buscar</button>
    </div>
    <!--paginacion-->
    <div id="paginationControls"></div> 
    <!--tabla de informacion-->
    <div id="tabla_info">
        <table class="ui-widget ui-widget-content">
            <thead class="ui-widget-header">
                <tr>
                    <th>Id propietario</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Telefono</th>
                    <th>Id casa</th>
                    <th>Numero de casa</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Tipo de operacion</th>
                    <th>Id operacion</th> <!-- Agregar esta línea -->
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <!--cuerpo de la tabla-->
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
                        echo "<td>" . $row['operacion_id'] . "</td>"; // Corregir esta línea
                        echo "<td><button class='editar' data-id='" . $row['operacion_id'] . "'>Editar</button></td>"; // Corregir esta línea
                        echo "<td><button class='eliminar' data-id='" . $row['operacion_id'] . "'>Eliminar</button></td>"; // Corregir esta línea
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No se encontraron resultados.</td></tr>"; // Corregir el colspan
                }
                ?>
            </tbody>
            <tfoot>
            <tr>
            <th id="TotaldeRegistros">Total de registros</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <form action="close_session.php" method="post">
      <button type="submit" id="closesession">Cerrar sesión</button>
    </form>
    <script src="./jquery-3.7.1.min.js"></script>
    <script src="./jquery-ui-1.14.1.custom/jquery-ui.js"></script>
    <script src="/agregar_elemento.js"></script>
    <script src="/total_registros.js"></script>
    <script src="/buscar_elemento.js"></script>
    <script src="/paginacion.js"></script>
    <script src="/editar_elemento.js"></script>
   
</body>

</html>
<?php
$conn->close();
?>