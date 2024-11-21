/**
 * This script sets up a click event handler for the element with the ID "ActualizarTabla".
 * When the element is clicked, it shows all rows in the table with the ID "TablaDatos"
 * and calls the function `TotaldeRegistros` to update the total number of records.
 *
 * Dependencies:
 * - jQuery library
 *
 * @file /c:/Users/ferra/OneDrive/CUARTO SEMESTRE/DESARROLLO FRONT END/Unidad 3/Producto integrador. Aplicación Web con JavaScript/ActualizarTabla.js
 */
$(document).ready(function(){
    $("#ActualizarTabla").on("click", function () {
        $("#TablaDatos tr").show();
        TotaldeRegistros();
      });

});