$(document).ready(function () {
  /**
   * Initializes event listeners for searching and updating table data.
   * 
   * The function sets up the following event listeners:
   * 1. Click event on the element with ID "buscarDato" to filter table rows based on the input value.
   *    - If the input is empty, an alert is shown and the function exits.
   *    - Filters table rows to show only those that contain the input value.
   *    - Updates the total number of visible rows.
   *    - Clears the search input field.
   * 2. Click event on the element with ID "ActualizarTabla" to show all table rows and update the total count.
   */
  function buscarDatos() {
    $("#buscarDato").on("click", function () {
      var elementos = $("#buscar").val().toLowerCase();
      // Validar si el input está vacío
      if (elementos.trim() === "") {
        alert("Debes ingresar un dato para realizar la búsqueda.");
        return; // Salir de la función si el input está vacío
      }
      var totalVisible = 0;
      $("#tablaDatos tr").filter(function () {
        var isVisible = $(this).text().toLowerCase().indexOf(elementos) > -1;
        $(this).toggle(isVisible);
        if (isVisible) {
          totalVisible++;
        }
      });
      $("#TotaldeRegistros").text("Total de registros: " + totalVisible);
        limpiarCampoBusqueda();
    });

    // Actualiza la tabla con el total de elementos de la tabla
    $("#ActualizarTabla").on("click", function () {
      $("#tablaDatos tr").show();
      TotaldeRegistros();
    });
  }

  function limpiarCampoBusqueda() {
    $("#buscar").val(""); 

  
  }
 
  buscarDatos();
  
});
