$(document).ready(function(){
  // Función para contar el total de registros en la tabla
    function TotaldeRegistros() {
        var total = $("#tablaDatos tr").length;
        $("#TotaldeRegistros").text("Total de registros: " + total);
    } 

    TotaldeRegistros(); // Llamar a la función TotaldeRegistros() para que se ejecute al cargar la página

   
});