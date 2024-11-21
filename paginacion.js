$(document).ready(function () {
  // Función para paginar los elementos de la tabla
  /**
   * Handles pagination for a table with the ID "tablaDatos".
   * Displays a specified number of items per page and creates pagination controls.
   * 
   * @function
   * @name paginacion
   * 
   * @param {number} itemsPerPage - The number of items to display per page (default is 10).
   * 
   * @description
   * This function calculates the total number of pages based on the number of rows in the table.
   * It then creates pagination controls and adds event listeners to handle page changes.
   * When a pagination button is clicked, it shows the corresponding set of rows and hides the others.
   * 
   * @example
   * // Call the function to initialize pagination
   * paginacion();
   */
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
