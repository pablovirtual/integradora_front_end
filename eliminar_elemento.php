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