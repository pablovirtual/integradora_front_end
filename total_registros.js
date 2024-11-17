$(document).ready(function(){
    function TotaldeRegistros() {
        var total = $("#TablaDatos tr").length;
        $("#TotaldeRegistros").text("Total de registros: " + total);
      } 
        TotaldeRegistros();
});