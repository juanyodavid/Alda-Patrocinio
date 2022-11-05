$(function () {
  load(1); // este es el buscador de la variable
});
function load(page) {
  var query = $("#q").val();
  var per_page = 10;
  var parametros = {
    action: "ajax",
    page: page,
    query: query,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/usuario_ajax/vista_usuario.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando...");
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
$("#editProductModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var cedula = button.data("cedula"); // crea la variable lote_edit
  $("#cedula_edit").val(cedula);

  var nomap = button.data("nomap"); // crea la variable lote_edit
  $("#nomap_edit").val(nomap);

  var cel = button.data("cel"); // crea la variable lote_edit
  $("#cel_edit").val(cel);

  var barrio = button.data("barrio"); // crea la variable lote_edit
  $("#barrio_edit").val(barrio);

  var estado = button.data("estado"); // crea la variable lote_edit
  $("#estado_edit").val(estado);

  var username = button.data("username"); // crea la variable lote_edit
  $("#username_edit").val(username);

  var obs = button.data("obs"); // crea la variable lote_edit
  $("#obs_edit").val(obs);

  var id = button.data("id");
  $("#edit_id").val(id);
});

$("#deleteProductModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  var id = button.data("id");
  $("#delete_id").val(id);
});

$("#edit_product").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/usuario_ajax/editar_producto.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados").html("Enviando...");
    },
    success: function (datos) {
      $("#resultados").html(datos);
      load(1);
      $("#editProductModal").modal("hide");
    }
  });
  event.preventDefault();
});

$("#add_product").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/usuario_ajax/guardar_producto.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados").html("Enviando...");
    },
    success: function (datos) {
      $("#resultados").html(datos);
      load(1);
      $("#addProductModal").modal("hide");
    }
  });
  event.preventDefault();
});

$("#delete_product").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "ajax/usuario_ajax/eliminar_producto.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#resultados").html("Enviando...");
    },
    success: function (datos) {
      $("#resultados").html(datos);
      load(1);
      $("#deleteProductModal").modal("hide");
    }//!aca quite una coma igual que en add y en edit
  });
  event.preventDefault();
});
