
$(function() {
			load(1);// este es el buscador de la variable
		});
		function load(page){
			var query=$("#q").val();
			var per_page=5000;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/cliente_externo_ajax/vista_usuario.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  
		  var cria_add = button.data('cria_add') 
		  $('#cria_edit').val(cria_add)
            var pelaje_add = button.data('pelaje_add') 
		  $('#pelaje_edit').val(pelaje_add)
             var carimbo_add = button.data('carimbo_add') 
		  $('#carimbo_edit').val(carimbo_add)
            var padre_add = button.data('padre_add') 
		  $('#padre_edit').val(padre_add)
            var fecha_add = button.data('fecha_add') 
		  $('#fecha_edit').val(fecha_add)
             var estado_add = button.data('estado_add') 
		  $('#estado_edit').val(estado_add)
            var raza_add = button.data('raza_add') 

             $('#asiento_edit').val(asiento_add)
            var asiento_add = button.data('asiento_add') 
		  
            var id = button.data('id') 
		  $('#edit_id').val(id)
		})


		
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
	
		
		
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/cliente_externo_ajax/editar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#editProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});

		
		
		
		$( "#add_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/cliente_externo_ajax/guardar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#addProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});

		$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/cliente_externo_ajax/eliminar_producto.php",
					data: parametros,
					 beforeSend: function(objeto){
						$("#resultados").html("Enviando...");
					  },
					success: function(datos){
					$("#resultados").html(datos);
					load(1);
					$('#deleteProductModal').modal('hide');
				  }
			});
		  event.preventDefault();
		});



		function filter(page,valor){
			var query= $("#q").val();
			var filter = valor ; 
			var per_page=5000;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page, 'filter':filter};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/cliente_externo_ajax/vista_usuario.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}