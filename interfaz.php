<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--jquery ui-->
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.css">
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.structure.css">
    <link rel="stylesheet" href="./jquery-ui-1.14.1.custom/jquery-ui.theme.css">
    <!--estilos-->
    <link rel="stylesheet" href="style.css">
    <title>Interfaz</title>
</head>
<body>
<?php
// Inicia la sesión
session_start();
// Conexión a la base de datos
require_once 'data_base.php';
// Verifica si la sesión está iniciada
if (isset($_SESSION['usuario'])) {
    $emailUsuario = $_SESSION['usuario'];
    echo "<h2>Bienvenido   $emailUsuario </h2>";
} else {
    echo "Error: No has iniciado sesión.";
}
?>

<div id="tabla_info">
    <table class="ui-widget ui-widget-content">
        <thead class="ui-widget-header">
            <tr>
                <th>Idpropietario</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>telefono</th>
                <th>idcasa</th>
                <th>Numero de  casa</th>
                <th>direccion</th>
                <th>estado</th>
                <th>tipo de operacion</th>
                <th>Id propietario</th>
            </tr>
        </thead>
        <tbody id="tablaDatos" class="ui-widget-content" ></tbody>
        <tfoot> 
            <tr id="totalDeRegistros">Total de registros</tr>
        </tfoot>
    </table>

</div>
<!--jquery-->
<script src="./jquery-3.7.1.min.js"></script>
<!--jquery ui-->
<script src="./jquery-ui-1.14.1.custom/jquery-ui.css"></script>
<!--script para obtener los datos de la base de datos con  ajax-->
<script src="/get_data.js"></script>
</body>
</html>

