
$(document).ready(function () {
  /**
   * 📋 Función para editar un elemento en la tabla de datos.
   * 
   * Esta función se activa cuando se hace clic en un botón con la clase "editar" dentro de la tabla con el ID "tablaDatos".
   * Solicita al usuario que edite varios campos a través de prompts y luego envía una solicitud AJAX para actualizar el elemento en el servidor.
   * Si la solicitud es exitosa, actualiza la fila correspondiente en la tabla con los nuevos valores.
   * 
   * ⚠️ Asegúrate de que todos los campos estén llenos antes de enviar la solicitud.
   * 
   * @function
   * @name editarElemento
   * @returns {void}
   */
  function editarElemento() {
    $("#tablaDatos").on("click", ".editar", function () {
      var row = $(this).closest("tr");
      var idpropietario = row.find("td:eq(0)").text(); // Asumiendo que el idpropietario está en la primera columna
      var Nombres = prompt("Editar Nombres:", row.find("td:eq(1)").text());
      var Apellidos = prompt("Editar Apellidos:", row.find("td:eq(2)").text());
      var Telefono = prompt("Editar Telefono:", row.find("td:eq(3)").text());
      var numero = prompt("Editar Numero de casa:", row.find("td:eq(5)").text());
      var direccion = prompt("Editar direccion:", row.find("td:eq(6)").text());
      var estado = prompt("Editar estado:", row.find("td:eq(7)").text());
      var tipo_operacion = prompt("Editar tipo de operacion:", row.find("td:eq(8)").text());
      var id_operacion = row.find("td:eq(9)").text(); // Asumiendo que el id_operacion está en la décima columna

      // Validar que los campos no estén vacíos
      if (!Nombres || !Apellidos || !Telefono || !numero || !direccion || !estado || !tipo_operacion || !id_operacion) {
        alert("Por favor, llene todos los campos.");
        return; // Salir de la función
      }

      // Petición AJAX al servidor
      $.ajax({
        url: "editar_elemento.php",
        type: "POST",
        data: {
          idpropietario: idpropietario,
          nombres: Nombres,
          apellidos: Apellidos,
          telefono: Telefono,
          no_casa: numero,
          direccion: direccion,
          estado: estado,
          tipo_operacion: tipo_operacion,
          id_operacion: id_operacion // Asegúrate de que el nombre coincida
        },
        success: function (response) {
          console.log("Respuesta del servidor:", response);
          // Actualizar la fila en la tabla con los nuevos valores
          row.find("td:eq(1)").text(Nombres);
          row.find("td:eq(2)").text(Apellidos);
          row.find("td:eq(3)").text(Telefono);
          row.find("td:eq(5)").text(numero);
          row.find("td:eq(6)").text(direccion);
          row.find("td:eq(7)").text(estado);
          row.find("td:eq(8)").text(tipo_operacion);
        },
        error: function (xhr, status, error) {
          console.error("Error al editar el elemento: " + error);
        }
      });
    });
  }
  editarElemento();
});