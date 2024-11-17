$(document).ready(function () {
  // Función para paginar los elementos de la tabla
  function paginacion() {
    var itemsPerPage = 10; // número de elementos por página
    var $table = $("#tablaDatos");
    var $rows = $table.find("tr");
    var totalItems = $rows.length;
    var totalPages = Math.ceil(totalItems / itemsPerPage);
    // Crear controles de paginación
    var $paginationControls = $("#paginationControls");
    $paginationControls.empty();

    for (var i = 1; i <= totalPages; i++) {
      $paginationControls.append(
        `<button class="page-link" data-page="${i}">${i}</button>`
      );
    }

    // Event listener for pagination buttons
    $paginationControls.on("click", ".page-link", function () {
      var page = $(this).data("page");
      var startItem = (page - 1) * itemsPerPage;
      var endItem = startItem + itemsPerPage;

      $rows.hide();
      $rows.slice(startItem, endItem).show();
    });
  }

  paginacion();
});
