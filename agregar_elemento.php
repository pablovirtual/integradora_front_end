/**
 * 📄 agregar_elemento.php
 * 
 * Este archivo se encarga de manejar la inserción de datos en la base de datos.
 * 
 * 🚀 Funcionalidad:
 * - Recibe datos a través de una solicitud POST.
 * - Inserta datos en las tablas `propietario`, `tipo_operacion` y `casa`.
 * - Utiliza transacciones para asegurar la integridad de los datos.
 * - Devuelve una respuesta en formato JSON indicando el éxito o error de la operación.
 * 
 * 📥 Variables recibidas por POST:
 * - `nombres`: Nombre del propietario.
 * - `apellidos`: Apellidos del propietario.
 * - `telefono`: Teléfono del propietario.
 * - `no_casa`: Número de la casa.
 * - `direccion`: Dirección de la casa.
 * - `estado`: Estado de la casa.
 * - `tipo_operacion`: Tipo de operación (compra, renta, etc.).
 * 
 * 📦 Dependencias:
 * - Requiere el archivo `data_base.php` para la conexión a la base de datos.
 * 
 * ⚠️ Manejo de errores:
 * - En caso de error durante la inserción, se revierte la transacción y se devuelve un mensaje de error.
 * 
 * 🛠️ Ejemplo de respuesta JSON en caso de éxito:
 * {
 *   "message": "Datos agregados correctamente",
 *   "propietario_id": 1,
 *   "casa_id": 1,
 *   "operacion_id": 1
 * }
 * 
 * 🛠️ Ejemplo de respuesta JSON en caso de error:
 * {
 *   "message": "Error: mensaje de error"
 * }
 */
<?php
// incluir base de datos 'data_base.php';
require 'data_base.php';

// variables para insertar datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $no_casa = $_POST['no_casa'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    $tipo_operacion = $_POST['tipo_operacion'];

    try {
        // iniciar transacción
        $conn->begin_transaction();

        // insertar en la tabla propietarios
        $stmt = $conn->prepare("INSERT INTO propietario (Nombres, Apellidos, telefono) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nombres, $apellidos, $telefono);
        $stmt->execute();
        $propietario_id = $conn->insert_id;

        // insertar en la tabla tipo_operacion
        $stmt = $conn->prepare("INSERT INTO tipo_operacion (tipo_operacion) VALUES (?)");
        $stmt->bind_param("s", $tipo_operacion);
        $stmt->execute();
        $tipo_operacion_id = $conn->insert_id;

        // insertar en la tabla casa
        $stmt = $conn->prepare("INSERT INTO casa (no_casa, direccion, estado, tipo_de_operacion, Id_propietario) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issii", $no_casa, $direccion, $estado, $tipo_operacion_id, $propietario_id);
        $stmt->execute();
        $casa_id = $conn->insert_id;

        // confirmar la transacción
        $conn->commit();
        echo json_encode([
            "message" => "Datos agregados correctamente",
            "propietario_id" => $propietario_id,
            "casa_id" => $casa_id,
            "operacion_id" => $tipo_operacion_id
        ]);
    } catch (Exception $e) {
        // en caso de error, se revierte la transacción
        $conn->rollback();
        echo json_encode(["message" => "Error: " . $e->getMessage()]);
    }
    // cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>