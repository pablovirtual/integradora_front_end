/**
 * 📄 editar_elemento.php
 * 
 * Este script PHP permite editar los datos de un propietario, su casa y el tipo de operación en una base de datos.
 * 
 * 🔗 Incluye:
 * - data_base.php: Archivo que contiene la conexión a la base de datos.
 * 
 * 🚀 Funcionalidad:
 * - Recibe datos a través de una solicitud POST.
 * - Inicia una transacción para asegurar la integridad de los datos.
 * - Actualiza los datos en las tablas `propietario`, `casa` y `tipo_operacion`.
 * - Confirma la transacción si todas las actualizaciones son exitosas.
 * - Revierte la transacción en caso de error.
 * 
 * 📥 Datos recibidos:
 * - `idpropietario` (int): Identificador del propietario.
 * - `id_operacion` (int): Identificador de la operación.
 * - `nombres` (string): Nombres del propietario.
 * - `apellidos` (string): Apellidos del propietario.
 * - `telefono` (int): Teléfono del propietario.
 * - `no_casa` (int): Número de casa.
 * - `direccion` (string): Dirección de la casa.
 * - `estado` (string): Estado de la casa.
 * - `tipo_operacion` (string): Tipo de operación.
 * 
 * 🛠️ Proceso:
 * 1. Inicia una transacción.
 * 2. Actualiza la tabla `propietario` con los nuevos datos.
 * 3. Actualiza la tabla `casa` con los nuevos datos.
 * 4. Actualiza la tabla `tipo_operacion` con los nuevos datos.
 * 5. Confirma la transacción si todas las actualizaciones son exitosas.
 * 6. Revierte la transacción en caso de error.
 * 
 * 📋 Respuesta:
 * - En caso de éxito: `{"message": "Datos actualizados correctamente"}`
 * - En caso de error: `{"message": "Error al actualizar los datos: " . $e->getMessage()}`
 * 
 * ⚠️ Notas:
 * - Asegúrese de que la conexión a la base de datos esté correctamente configurada en `data_base.php`.
 * - Los datos recibidos deben ser validados y sanitizados adecuadamente antes de ser procesados.
 */

<?php
include 'data_base.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idpropietario = $_POST['idpropietario'];
    $id_operacion = $_POST['id_operacion']; 
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $no_casa = $_POST['no_casa'];
    $direccion = $_POST['direccion'];
    $estado = $_POST['estado'];
    $tipo_operacion = $_POST['tipo_operacion'];

    // Log the received data
    error_log("Received data: " . print_r($_POST, true));

    try {
        // iniciar transacción
        $conn->begin_transaction();

        // editar en la tabla propietarios
        $stmt = $conn->prepare("UPDATE propietario SET Nombres = ?, Apellidos = ?, telefono = ? WHERE idpropietario = ?");
        $stmt->bind_param("ssii", $nombres, $apellidos, $telefono, $idpropietario);
        $stmt->execute();

        // editar en la tabla casa
        $stmt = $conn->prepare("UPDATE casa SET no_casa = ?, direccion = ?, estado = ? WHERE Id_propietario = ?");
        $stmt->bind_param("issi", $no_casa, $direccion, $estado, $idpropietario);
        $stmt->execute();

        // editar en la tabla tipo_operacion
        $stmt = $conn->prepare("UPDATE tipo_operacion SET tipo_operacion = ? WHERE Id_operacion = ?");
        $stmt->bind_param("si", $tipo_operacion, $id_operacion);
        $stmt->execute();

        // confirmar la transacción
        $conn->commit();
        echo json_encode([
            "message" => "Datos actualizados correctamente"
        ]);
    } catch (Exception $e) {
        // revertir la transacción en caso de error
        $conn->rollback();
        echo json_encode([
            "message" => "Error al actualizar los datos: " . $e->getMessage()
        ]);
    } finally {
        $stmt->close();
        $conn->close();
    }
}
?>