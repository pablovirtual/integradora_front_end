$(document).ready(function(){
    // Función para agregar un nuevo elemento a la tabla
    function agregarElemento() {
        $("#agregarElemento").on("click", function () {
            var id_propietario = $("#id_propietario").val();
            var nombres = $("#nombres").val();
            var apellidos = $("#apellidos").val();
            var telefono = $("#telefono").val();
            var id_casa = $("#id_casa").val();
            var no_casa = $("#no_casa").val();
            var direccion = $("#direccion").val();
            var estado = $("#estado").val();
            var tipo_operacion = $("#tipo_operacion").val();

            console.log("Datos capturados");
            console.log("ID Propietario: " + id_propietario);
            console.log("Nombres: " + nombres);
            console.log("Apellidos: " + apellidos);
            console.log("Telefono: " + telefono);
            console.log("ID Casa: " + id_casa);
            console.log("No. Casa: " + no_casa);
            console.log("Direccion: " + direccion);
            console.log("Estado: " + estado);
            console.log("Tipo de operación: " + tipo_operacion);

            $.ajax({
                url: "agregar_elemento.php",
                type: "POST",
                data: {

                    nombres: nombres,
                    apellidos: apellidos,
                    telefono: telefono,
                    id_casa: id_casa,
                    no_casa: no_casa,
                    direccion: direccion,
                    estado: estado,
                    tipo_operacion: tipo_operacion
                },
                success: function(response) {
                    console.log("Respuesta del servidor: " + response);

                    var row = `<tr>
                        <td>${id_propietario}</td>
                        <td>${nombres}</td>
                        <td>${apellidos}</td>
                        <td>${telefono}</td>
                        <td>${id_casa}</td>
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
                },
                error: function(xhr, status, error) {
                    console.error("Error al agregar el elemento: " + error);
                }
            });
        });
    }
    agregarElemento();
});