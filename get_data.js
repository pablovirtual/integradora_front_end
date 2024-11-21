$(document).ready(function() {
    /**
     * 🚀 Carga los datos desde el servidor y los procesa para generar una tabla HTML.
     * 
     * Realiza una solicitud AJAX de tipo POST a "data_base.php" para obtener datos en formato JSON.
     * Si la solicitud es exitosa y los datos son recibidos correctamente, se genera una tabla HTML
     * con los datos y se inserta en el DOM dentro del elemento con id "tablaDatos".
     * 
     * 📊 La tabla generada incluye las siguientes columnas:
     * - ID del propietario
     * - Nombre del propietario
     * - Apellido del propietario
     * - Teléfono del propietario
     * - ID de la casa
     * - Número de la casa
     * - Dirección de la casa
     * - Estado de la casa
     * - Tipo de operación
     * - Botón para editar
     * - Botón para eliminar
     * 
     * ⚠️ En caso de error en la solicitud AJAX, se muestra un mensaje de error en la consola.
     * 
     * @function cargarDatos
     */
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
                        table += '<td><button class="editar">Editar</button></td>';
                        table += '<td><button class="eliminar">Eliminar</button></td>';
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
