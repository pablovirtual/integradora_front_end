/**
 * 🗑️ eliminar_elemento.php
 *
 * Este script elimina registros de las tablas `casa`, `propietario` y `tipo_operacion` en la base de datos.
 * 
 * 📄 Instrucciones:
 * - Este script debe ser llamado mediante una solicitud POST.
 * - Se requiere un parámetro POST `id_operacion` que especifica la operación a eliminar.
 * 
 * 🔄 Proceso:
 * 1. Inicia una transacción.
 * 2. Obtiene el `Id_propietario` asociado a la operación.
 * 3. Elimina el registro correspondiente en la tabla `casa`.
 * 4. Elimina el registro correspondiente en la tabla `propietario`.
 * 5. Elimina el registro correspondiente en la tabla `tipo_operacion`.
 * 6. Confirma la transacción.
 * 
 * ⚠️ En caso de error:
 * - Revertir la transacción.
 * - Retornar un mensaje de error en formato JSON.
 * 
 * 📤 Respuesta:
 * - En caso de éxito: `{"success": true}`
 * - En caso de error: `{"success": false, "message": "Error: <mensaje_de_error>"}`
 * 
 * 📦 Dependencias:
 * - `data_base.php`: Archivo que contiene la conexión a la base de datos.
 * 
 * @package Aplicación Web con JavaScript
 */
<?php
include 'data_base.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_operacion = $_POST['id_operacion'];

    try {
        // Iniciar transacción
        $conn->begin_transaction();

        // Obtener el id del propietario asociado a la operación
        $stmt = $conn->prepare("SELECT Id_propietario FROM casa WHERE tipo_de_operacion = ?");
        $stmt->bind_param("i", $id_operacion);
        $stmt->execute();
        $stmt->bind_result($id_propietario);
        $stmt->fetch();
        $stmt->close();

        // Eliminar de la tabla casa
        $stmt = $conn->prepare("DELETE FROM casa WHERE tipo_de_operacion = ?");
        $stmt->bind_param("i", $id_operacion);
        $stmt->execute();
        $stmt->close();

        // Eliminar de la tabla propietario
        $stmt = $conn->prepare("DELETE FROM propietario WHERE Idpropietario = ?");
        $stmt->bind_param("i", $id_propietario);
        $stmt->execute();
        $stmt->close();

        // Eliminar de la tabla tipo_operacion
        $stmt = $conn->prepare("DELETE FROM tipo_operacion WHERE Id_operacion = ?");
        $stmt->bind_param("i", $id_operacion);
        $stmt->execute();
        $stmt->close();

        // Confirmar la transacción
        $conn->commit();

        echo json_encode(["success" => true]);
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conn->rollback();
        echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
    }

    $conn->close();
}
?>