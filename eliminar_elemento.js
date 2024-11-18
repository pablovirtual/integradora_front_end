$(document).ready(function(){
    // Función para eliminar un elemento
    function eliminarElemento(){
        $("#tablaDatos").on("click", ".eliminar", function(){
            var idOperacion = $(this).data("id");
            var row = $(this).closest("tr");

            if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
                $.ajax({
                    url: "eliminar_elemento.php",
                    type: "POST",
                    data: { id_operacion: idOperacion },
                    success: function(response) {
                        var result = JSON.parse(response);
                        if (result.success) {
                            row.remove();
                            alert("Elemento eliminado correctamente.");
                            TotaldeRegistros(); // Llamar a la función TotalRegistros() para que se ejecute al eliminar un registro
                        } else {
                            alert("Error al eliminar el elemento: " + result.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error en la solicitud AJAX: " + error);
                    }
                });
            }
        });
    }
   
    eliminarElemento();
    
    
   
});