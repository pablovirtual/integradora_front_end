$(document).ready(function () {
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
