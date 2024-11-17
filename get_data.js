$(document).ready(function() {
    function cargarDatos() {
        $.ajax({
            type: "POST",
            url: "data_base.php",
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    // Procesar los datos recibidos
                    console.log(response.data);
                    // Generar la tabla HTML
                    var table = '';
                    $.each(response.data, function(index, item) {
                        table += '<tr>';
                        table += '<td>' + item.propietario_id + '</td>';
                        table += '<td>' + item.propietario_nombre + '</td>';
                        table += '<td>' + item.propietario_apellido + '</td>';
                        table += '<td>' + item.propietario_telefono + '</td>';
                        table += '<td>' + item.casa_id + '</td>';
                        table += '<td>' + item.casa_numero + '</td>';
                        table += '<td>' + item.casa_direccion + '</td>';
                        table += '<td>' + item.casa_estado + '</td>';
                        table += '<td>' + item.tipo_operacion + '</td>';
                        table += '</tr>';
                    });
                    // Agregar la tabla al DOM
                    $('#tablaDatos').html(table);
                } else {
                    console.error(response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX: " + error);
            }
        });
    }
    cargarDatos();
});
