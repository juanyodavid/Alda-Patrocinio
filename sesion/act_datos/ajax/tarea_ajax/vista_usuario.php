<script>
	var $str;
	$(document).ready(function() {
		checkall(); //Habilita la fi=uncion checkall en #checkall
		$('[name="checks[]"]').change(function() {
			listcheck(); //lista elementos marcados 
			// alert($str);
		});
	});

	function listcheck() {
		var arr = $('[name="checks[]"]:checked').map(function() {
			return this.value;
		}).get();
		$str = arr.join('x'); //separa elementos por una x
		var link = document.getElementById("cliente_idq");
		link.setAttribute("data-idm", $str); //pasa el valor al atributo data-idm del boton cliente_idq
		document.getElementById("idm").value = $str; //pasa el valor al formulario modal
		$('#arr').text(JSON.stringify(arr));
		$('#str').text($str);
	}

	function checkall() {
		$('#checkall').change(function() {
			$('.checks').prop('checked', this.checked); // copia este check a todos los demás
			listcheck();
		});

		$('.checks').change(function() {
			if ($('.checks:checked').length == $('.checks').length) {
				$('#checkall').prop('checked', true);
			} else {
				$('#checkall').prop('checked', false);
			}
		});
		listcheck();
	}

	function clickcheck(id) {
		idd = "#" + id;
		if (document.getElementById(id).checked) {
			$(idd).prop('checked', false);
		} else {
			$(idd).prop('checked', true);
		}

	}
</script>
<?php

/* Connect To Database*/
require_once("../../conexion.php"); // conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : ''; // en la variable accion se pregunta si se realizo alguna accion
if ($action == 'ajax') {
	$test = 'estado DESC';
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$query1 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query1'], ENT_QUOTES)));
	$query2 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query2'], ENT_QUOTES)));
	$query3 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query3'], ENT_QUOTES)));
	$query4 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query4'], ENT_QUOTES)));
	$query5 = "Pendiente";
	$tables = "tarea";
	$campos = "*";
	$sWhere = " CLIENT_ID LIKE '%" . $query . "%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere1 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where barrio LIKE '%" . $query1 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere2 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where nomap LIKE '%" . $query2 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere3 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where zona LIKE '%" . $query3 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere4 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where escuela LIKE '%" . $query4 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere5 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where estado  LIKE '%" . $query5 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere .= " order by tarea." . $test;

	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table
	$count_query   = mysqli_query($con, utf8_decode("SELECT count(*) AS numrows FROM $tables where $sWhere "));
	if ($row = mysqli_fetch_array($count_query)) {
		$numrows = $row['numrows'];
	} else {
		echo mysqli_error($con);
	}
	$total_pages = ceil($numrows / $per_page);
	//main query to fetch the data
	//echo "SELECT $campos FROM  $tables where $sWhere1 AND $sWhere2 AND $sWhere3  AND $sWhere4 AND $sWhere   LIMIT $offset,$per_page";
	$query = mysqli_query($con, utf8_decode("SELECT $campos FROM  $tables where $sWhere1 AND $sWhere2 AND $sWhere3  AND $sWhere4 AND $sWhere5 AND $sWhere   LIMIT $offset,$per_page"));
	//loop through fetched data
	if ($numrows > 0) {

?>
		<div class="table-responsive">
			<table id="myTable" class="table table-striped table-hover">
				<thead>
					<tr>
						<th style="cursor: pointer;"><input type="checkbox" name="all" id="checkall" /><label for="checkall">Todo</label></th>
						<th class='text-center' onclick="sortTable(1)" style="cursor: pointer;">Id Cliente </th>
						<th class='text-center' onclick="sortTable(2)" style="cursor: pointer;">Nombre </th>
						<th class='text-center' onclick="sortTable(3)" style="cursor: pointer;">Barrio </th>
						<th class='text-center' onclick="sortTable(4)" style="cursor: pointer;">Zona </th>
						<th class='text-center' onclick="sortTable(5)" style="cursor: pointer;">Escuela </th>
						<th class='text-center' onclick="" style='display:none;'>Contacto 1 </th>
						<th class='text-center' onclick="" style='display:none;'>Contacto 2 </th>
						<th class='text-center' onclick="" style='display:none;'>Contacto 3 </th>
						<th class='text-center' onclick="" style='display:none;'>Contacto 4 </th>
						<th class='text-center' onclick="sortTable(10)" style="cursor: pointer;">F. de pedido</th>
						<th class='text-center' onclick="sortTable(11)" style="cursor: pointer;">Estado</th>
						<th class='text-center' onclick="sortTable(12" style="cursor: pointer;">Tipo de tarea </th>
						<th class='text-center' onclick="sortTable(13)" style="cursor: pointer;">Obs</th>
						<th class='text-center' onclick="sortTable(14)" style="cursor: pointer;">Facilitador </th>

					</tr>
				</thead>
				<tbody>
					<?php
					$finales = 0;
					//	echo $id2 = "<script>document.write(str)</script>";
					while ($row = mysqli_fetch_array($query)) {
						$id = $row['id'];
						$fecped = $row['fecped'];
						$estado = $row['estado'];
						$t_tarea = $row['tipo_tarea'];
						// 	echo'<script type="text/javascript">
						// alert('."$id".');
						//  window.location.href="index.php";
						//  </script>';
						$obs = $row['obs'];
						$cliente = $row['CLIENT_ID'];
						$facilitador = $row['id_facilitador'];
						$finales++;
						$query2 = mysqli_query($con, utf8_decode("SELECT * FROM `beneficiario_interno` WHERE `CLIENT_ID` = " . $cliente . ""));
						while ($valores = mysqli_fetch_array($query2)) {
							$nombre = $valores['nomap'];
							$barrio = $valores['barrio'];
							$zona = utf8_encode($valores['zona']);
							$escuela = $valores['escuela'];
							$nom1 = $valores['nombre_paren1'];
							$nom2 = $valores['nombre_paren2'];
							$nom3 = $valores['nombre_paren4'];
							$nom4 = $valores['nombre_paren4'];
							$cont1 = $valores['contacto1'];
							$cont2 = $valores['contacto2'];
							$cont3 = $valores['contacto3'];
							$cont4 = $valores['contacto4'];
						}
						// if($)
						// $sql = "UPDATE tarea SET id_facilitador='".$facilitador2."' WHERE id='".$id."' ";
						// $query6 = mysqli_query($con,$sql);

					?>
						<tr>
							<td><input type="checkbox" id="<?php echo $cliente; ?>" name="checks[]" class="select checks" value='<?php echo $id; ?>'></td>

							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $cliente; ?></td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $nombre; ?> </td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $barrio; ?></td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $zona; ?> </td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $escuela; ?> </td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')" style='display:none;'><?php echo $nom1 . '<br>' . $cont1; ?> </td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')" style='display:none;'><?php echo $nom2 . '<br>' . $cont2; ?> </td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')" style='display:none;'><?php echo $nom3 . '<br>' . $cont3; ?> </td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')" style='display:none;'><?php echo $nom4 . '<br>' . $cont4; ?> </td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $fecped; ?></td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $estado; ?></td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $t_tarea; ?></td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $obs; ?></td>
							<td class='text-center' onclick="clickcheck('<?php echo $cliente; ?>')"><?php echo $facilitador; ?></td>


							<td>
								<a href="#" data-target="#editProductModal" class="edit" data-toggle="modal" data-fecha="<?php echo $fecped ?>" data-facilitador="<?php echo $facilitador ?>" data-id2="<?php echo $id; ?>">
									<i class="material-icons" data-toggle="tooltip" title="Editar">assignment_ind</i></a>

								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id2="<?php echo $id; ?>">
									<i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
							</td>

							<!-- echo'<script type="text/javascript">
    					alert('."$id".');
   						 window.location.href="index.php";
   						 </script>'; -->

						</tr>
					<?php }
					?>
					<tr>
						<a href="#" id="cliente_idq" data-target="#editProductModal" class="edit" data-toggle="modal" data-fecha="" data-facilitador="" data-id2="" data-idm=""><i class="material-icons" data-toggle="tooltip" title="Editar">assignment_ind</i>
						</a>




						<div><?php
								$cont = 0;
								$query = mysqli_query($con, utf8_decode("SELECT $campos FROM  $tables where $sWhere1 AND $sWhere2 AND $sWhere3  AND $sWhere4 AND $sWhere5 AND $sWhere   LIMIT $offset,$per_page"));
								while ($row = mysqli_fetch_array($query)) {
									$id = $row['id'];
									$cont++;
								}
								echo ($cont);
								// if($)
								// $sql = "UPDATE tarea SET id_facilitador='".$facilitador2."' WHERE id='".$id."' ";
								// $query6 = mysqli_query($con,$sql);
								?>

							<button id="showhide" class="btn" onclick="fire()">mostrar contactos</button>
						</div>
					</tr>
				</tbody>
			</table>
			<!---->
			<script>
				function sortTable(n) {
					var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
					table = document.getElementById("myTable");
					switching = true;
					//Set the sorting direction to ascending:
					dir = "asc";
					//        	  	$("#loader").html("Ordenando...");
					/*Make a loop that will continue until
					no switching has been done:*/
					while (switching) {
						//start by saying: no switching is done:
						switching = false;
						rows = table.rows;
						/*Loop through all table rows (except the
						first, which contains table headers):*/
						for (i = 1; i < (rows.length - 1); i++) {
							//start by saying there should be no switching:
							shouldSwitch = false;
							/*Get the two elements you want to compare,
							one from current row and one from the next:*/
							x = rows[i].getElementsByTagName("TD")[n];
							y = rows[i + 1].getElementsByTagName("TD")[n];
							/*check if the two rows should switch place,
							based on the direction, asc or desc:*/
							if (dir == "asc") {
								if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
									//if so, mark as a switch and break the loop:
									shouldSwitch = true;
									break;
								}
							} else if (dir == "desc") {
								if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
									//if so, mark as a switch and break the loop:
									shouldSwitch = true;
									break;
								}
							}
						}

						if (shouldSwitch) {
							/*If a switch has been marked, make the switch
							and mark that a switch has been done:*/
							rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
							switching = true;
							//Each time a switch is done, increase this count by 1:
							switchcount++;
						} else {
							/*If no switching has been done AND the direction is "asc",
							set the direction to "desc" and run the while loop again.*/
							if (switchcount == 0 && dir == "asc") {
								dir = "desc";
								switching = true;
							} else {}
						}

					}

				}
			</script>
			<!---->
		</div>
<?php
	}
}
?>