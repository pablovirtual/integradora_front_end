$(document).ready(function(){
    // Función para agregar un nuevo elemento a la tabla
    function agregarElemento() {
        $("#agregarElemento").on("click", function () {
            var nombres = $("#nombres").val();
            var apellidos = $("#apellidos").val();
            var telefono = $("#telefono").val();
            var no_casa = $("#no_casa").val();
            var direccion = $("#direccion").val();
            var estado = $("#estado").val();
            var tipo_operacion = $("#tipo_operacion").val();

            // Validar que los campos no estén vacíos
            if(!nombres || !apellidos || !telefono || !no_casa || !direccion || !estado || !tipo_operacion) {
                alert("Por favor, llene todos los campos.");
                return; // Salir de la función

            }

            $.ajax({
                url: "agregar_elemento.php",
                type: "POST",
                data: {
                    nombres: nombres,
                    apellidos: apellidos,
                    telefono: telefono,
                    no_casa: no_casa,
                    direccion: direccion,
                    estado: estado,
                    tipo_operacion: tipo_operacion
                },
                dataType: "json",
                success: function(response) {
                    console.log("Respuesta del servidor: ", response);

                    if (response && response.message && response.message.includes("Datos agregados correctamente")) {
                        var row = `<tr>
                            <td>${response.propietario_id}</td>
                            <td>${nombres}</td>
                            <td>${apellidos}</td>
                            <td>${telefono}</td>
                            <td>${response.casa_id}</td>
                            <td>${no_casa}</td>
                            <td>${direccion}</td>
                            <td>${estado}</td>
                            <td>${tipo_operacion}</td>
                            <td><button class="editar">Editar</button></td>
                            <td><button class="eliminar">Eliminar</button></td>
                        </tr>`;

                        console.log("Fila agregada: " + row);

                        $("#tablaDatos").append(row);
                        console.log("Elemento agregado a la tabla.");

                        // Limpiar los campos de entrada
                        limpiarCampos();
                        
                    } else {
                        console.error("Error en la respuesta del servidor: " + response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error al agregar el elemento: " + error);
                }
            });
        });
    }

    // Función para limpiar los campos de entrada
    function limpiarCampos() {
        $("#nombres").val("");
        $("#apellidos").val("");
        $("#telefono").val("");
        $("#no_casa").val("");
        $("#direccion").val("");
        $("#estado").val("");
        $("#tipo_operacion").val("");
        
    }

    agregarElemento();
});