$(function() {
			load(1);// este es el buscador de la variable
		});
		function load(page){
			var query=$("#q").val();
			var query1=$("#w").val();
			var query2=$("#e").val();
			var query3=$("#f").val();
			var query4=$("#g").val();
			var per_page=5000;
			var parametros = {"action":"ajax","page":page,'query':query,'query1':query1,'query2':query2,'query3':query3,'query4':query4,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/tarea_ajax/vista_usuario.php',
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Carga de Tareas...");
			  },
				success:function(data){
					$(".outer_div").html(data).fadeIn('slow');
					$("#loader").html("");
				}
			})
		}
		$('#editProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  
		 
            var fecha = button.data('fecha') 
            if( fecha==""){
            	fecha= new Date();
            }
		  $('#fecha_ped_edit').val(fecha)
             var estado = button.data('estado') 
		  $('#estado_edit').val(estado)
            var obs = button.data('obs') 
		  $('#obs_edit').val(obs)
            var facilicitador = button.data('facilicitador') 
		  $('#facilitador_edit').val(facilicitador)
		  var color_add = button.data('color_add') // crea la variable lote_add y la informacion lo guarda en el boton.data (LOTE_ADD)
		  $('#color_edit').val(color_add)

			var id2 = button.data('id2') 
			$('#id2').val(id2) 

            var id = button.data('id') 
		  $('#edit_id').val(id)
		})

		
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id2') 
		  $('#delete_id').val(id)
		})
	
		
		
		$( "#edit_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/tarea_ajax/editar_producto.php",
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
					url: "ajax/tarea_ajax/guardar_producto.php",
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
					url: "ajax/tarea_ajax/eliminar_producto.php",
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


		function openForm() {
			document.getElementById("myForm").style.display = "block";
		  }
		  
		  function closeForm() {
			document.getElementById("myForm").style.display = "none";
		  }
