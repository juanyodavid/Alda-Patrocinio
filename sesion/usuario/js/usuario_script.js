$(function () {
	load(1); // este es el buscador de la variable
});
function load(page) {
	var query = $("#q").val();
	var name = $("#n").val();
	var per_page = 10;
	var parametros = {
		action: "ajax",
		page: page,
		query: query,
		name: name,
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

	var fecha = button.data("fecha");
	$("#fecha_edit").val(fecha);
	var estado = button.data("estado");
	$("#estado_edit").val(estado);
	var obs = button.data("obs");
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
		},
	});
	event.preventDefault();
});

$("#edit_pass").submit(function (event) {
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
			$("#changePass").modal("hide");
		},
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
		},
	});
	event.preventDefault();
});

$("#check_product").submit(function (event) {
	var parametros = $(this).serialize();
	$.ajax({
		type: "POST",
		url: "ajax/usuario_ajax/check_producto.php",
		data: parametros,
		beforeSend: function (objeto) {
			$("#resultados").html("Enviando...");
		},
		success: function (datos) {
			$("#resultados").html(datos);
			load(1);
			$("#checkProductModal").modal("hide");
		},
	});
	event.preventDefault();
});
