$(function() {
			load(1);// este es el buscador de la variable
		});
		function load(page){
			var query=$("#q").val();
			var per_page=20;
			var parametros = {"action":"ajax","page":page,'query':query,'per_page':per_page};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'ajax/cliente_interno_ajax/vista_usuario.php',
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
		  var id_add = button.data('id_add') 

		  if (typeof(id_add) != "undefined"){
		  	document.getElementById("titModal").innerHTML = "Editar";//APARTADO PARA EDITAR


				$( "#edit_product" ).submit(function( event ) {
				  var parametros = $(this).serialize();
					$.ajax({
							type: "POST",
							url: "ajax/cliente_interno_ajax/editar_producto.php",
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
		
		  }else{
		  	document.getElementById("titModal").innerHTML = "Agregar Nuevo";//APARTADO PARA AGREGAR NUEVO


				$( "#edit_product" ).submit(function( event ) {
				  var parametros = $(this).serialize();
					$.ajax({
							type: "POST",
							url: "ajax/cliente_interno_ajax/guardar_producto.php",
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
				

		  }

		$('#imgModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		

		  	$("#subirimg").click(function(){

		        var fd = new FormData();
		        var files = $('#fileToUpload')[0].files;
		        if(files.length > 0 ){
		        	fd.append('fileToUpload',files[0]);
        			$.ajax({
							url: "ajax/cliente_interno_ajax/upload.php",
							type: "post",
							data: fd,
							contentType: false,
							processData: false,							
							beforeSend: function(objeto){
								$("#resultados").html("Subiendo...");
							  },
							success: function(response){						
								$("#resultados").html(response);
								load(1);                            
						  	}
					});
				  event.preventDefault();
        		}else{
                    alert("Seleccione Un Archivo");
                }
			});

		  $('#edit_id').val(id_add)
		 	var id_add2 = button.data('id_add') 
		  $('#edit_id2').val(id_add)

          var nombre = button.data('nombre') 
		  $('#nombre_edit').val(nombre)
          var apellido = button.data('apellido') 
		  $('#apellido_edit').val(apellido)
		  var nd = button.data('nd') 
		  $('#nd_edit').val(nd)
		  var  sexo = button.data('sexo') 
		  $('#sexo_edit').val(sexo)
          var tipo_doc = button.data('tipo_doc') 
		  $('#tipo_doc_edit').val(tipo_doc)
		  var fecha = button.data('fecha') 
		  $('#fecha_edit').val(fecha)
		  var grado = button.data('grado') 
		  $('#grado_edit').val(grado)
          var escuela = button.data('escuela') 
		  $('#escuela_edit').val(escuela)
             var barrio = button.data('barrio') 
		  $('#barrio_edit').val(barrio)
             var np1 = button.data('np1') 
		  $('#np1_edit').val(np1)
		  var c1 = button.data('c1') 
		  $('#c1_edit').val(c1)
             var np2 = button.data('np2') 
		  $('#np2_edit').val(np2)
		  var c2 = button.data('c2') 
		  $('#c2_edit').val(c2)
             var np4 = button.data('np4') 
		  $('#np4_edit').val(np4)
		  var c4 = button.data('c4') 
		  $('#c4_edit').val(c4)
		  var np3 = button.data('np3')
		  $('#np3_edit').val(np3)         
		  var c3 = button.data('c3') 
		  $('#c3_edit').val(c3)
		  var parent1 = button.data('parent1') 
		  $('#parent1_edit').val(parent1)		  
		  var parent2 = button.data('parent2') 
		  $('#parent2_edit').val(parent2)		  
		  var parent3 = button.data('parent3') 
		  $('#parent3_edit').val(parent3)		  
		  var parent4 = button.data('parent4') 
		  $('#parent4_edit').val(parent4)		  
		  var ref_dom = button.data('ref_dom')
		  $('#ref_dom_edit').val(ref_dom)
             var observacion = button.data('observacion') 
		  $('#observacion_edit').val(observacion)
             var ins = button.data('ins') 
		  $('#ins_edit').val(ins)
             var zona = button.data('zona') 
		  $('#zona_edit').val(zona)
             var prog = button.data('prog') 
		  $('#prog_edit').val(prog)
 
var cdff = button.data('cdff')
var altura = button.data('altura')
var peso = button.data('peso')*1
var slev = button.data('slev')*1
var sgrd = button.data('sgrd')
var fsub = button.data('fsub')
var fsu2 = button.data('fsu2')
var eact = button.data('eact')
var rsch = button.data('rsch')
var sdst = button.data('sdst')
var trns = button.data('trns')
var hlth = button.data('hlth')
var hlt2 = button.data('hlt2')
var hlt3 = button.data('hlt3')
var sphn = button.data('sphn')
var chrs = button.data('chrs')
var cact = button.data('cact')
var cac2 = button.data('cac2')
var wtob = button.data('wtob')
var hohh = button.data('hohh')
var lwth = button.data('lwth')
var tbro = button.data('tbro')*1
var tsis = button.data('tsis')*1
var toth = button.data('toth')*1
var focc = button.data('focc')
var mocc = button.data('mocc')
var mnah = button.data('mnah')
var fnah = button.data('fnah')
var gocc = button.data('gocc')
var relg = button.data('relg')
var othrelg = button.data('othrelg')
var lang = button.data('lang')
var lan2 = button.data('lan2')
var hous = button.data('hous')
var latr = button.data('latr')
var latd = button.data('latd')
var fpwc = button.data('fpwc')
var wdws = button.data('wdws')
var comh = button.data('comh')
var orph = button.data('orph')
var ben1 = button.data('ben1')
var ben2 = button.data('ben2')
var ben3 = button.data('ben3')
var famb = button.data('famb')
var fam2 = button.data('fam2')
var oth = button.data('oth')
var informante = button.data('informante')
var relinf = button.data('relinf')
var fechaen = button.data('fechaen')
var positiontext = button.data('positiontext')
//var fileToUpload = button.data('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAABr0AAADtCAMAAAFCNX4gAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAASUExURQAAAP7+/v7+/v7+/v7+/v7+/i4hX0kAAAAGdFJOUwAcXQsjXsz+Th4AAAAJcEhZcwAAFxEAABcRAcom8z8AAAG2SURBVHhe7cdBDgAQDADBov7/ZSK9c5aZ024AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAF5k5KgEAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgAe5VQIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAD/oxWy0AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAjyIW/xUAMkl/C7UAAAAASUVORK5CYII=')
var fileToUpload = button.data('fileToUpload')
//var fileToUpload = button.data('')
$('#cdff_edit').val(cdff)
$('#altura_edit').val(altura)
$('#peso_edit').val(peso)
$('#slev_edit').val(slev)
$('#sgrd_edit').val(sgrd)
$('#fsub_edit').val(fsub)
$('#fsu2_edit').val(fsu2)
$('#eact_edit').val(eact)
$('#rsch_edit').val(rsch)
$('#sdst_edit').val(sdst)
$('#trns_edit').val(trns)
$('#hlth_edit').val(hlth)
$('#hlt2_edit').val(hlt2)
$('#hlt3_edit').val(hlt3)
$('#sphn_edit').val(sphn)
$('#chrs_edit').val(chrs)
$('#cact_edit').val(cact)
$('#cac2_edit').val(cac2)
$('#wtob_edit').val(wtob)
$('#hohh_edit').val(hohh)
$('#lwth_edit').val(lwth)
$('#tbro_edit').val(tbro)
$('#tsis_edit').val(tsis)
$('#toth_edit').val(toth)
$('#focc_edit').val(focc)
$('#mocc_edit').val(mocc)
$('#mnah_edit').val(mnah)
$('#fnah_edit').val(fnah)
$('#gocc_edit').val(gocc)
$('#relg_edit').val(relg)
$('#othrelg_edit').val(othrelg)
$('#lang_edit').val(lang)
$('#lan2_edit').val(lan2)
$('#hous_edit').val(hous)
$('#latr_edit').val(latr)
$('#latd_edit').val(latd)
$('#fpwc_edit').val(fpwc)
$('#wdws_edit').val(wdws)
$('#comh_edit').val(comh)
$('#orph_edit').val(orph)
$('#ben1_edit').val(ben1)
$('#ben2_edit').val(ben2)
$('#ben3_edit').val(ben3)
$('#famb_edit').val(famb)
$('#fam2_edit').val(fam2)
$('#oth_edit').val(oth)
$('#informante_edit').val(informante)
$('#relinf_edit').val(relinf)
$('#fechaen_edit').val(fechaen)
$('#positiontext').val(positiontext)
$('#fileToUpload').val(fileToUpload)


		})
		
		$('#deleteProductModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var id = button.data('id') 
		  $('#delete_id').val(id)
		})
		
		

		$( "#delete_product" ).submit(function( event ) {
		  var parametros = $(this).serialize();
			$.ajax({
					type: "POST",
					url: "ajax/cliente_interno_ajax/eliminar_producto.php",
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