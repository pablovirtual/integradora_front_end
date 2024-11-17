<?php
// incluir base de datos 'data_base.php';
require 'data_base.php';

// variables para insertar datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_propietario = $_POST['id_propietario'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $id_casa = $_POST['id_casa'];
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

        // confirmar la transacción
        $conn->commit();
        echo "Datos agregados correctamente";
    } catch (Exception $e) {
        // en caso de error, se revierte la transacción
        $conn->rollback();
        echo "Error: " . $e->getMessage();
    }

    $stmt->close();
    $conn->close();
}
?>