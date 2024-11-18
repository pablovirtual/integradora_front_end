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