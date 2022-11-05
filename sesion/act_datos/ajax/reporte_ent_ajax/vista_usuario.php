<?php

/* Connect To Database*/
require_once("../../conexion.php"); // conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : ''; // en la variable accion se pregunta si se realizo alguna accion
if ($action == 'ajax') {
	$test = 'id_entrega DESC';
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$query1 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query1'], ENT_QUOTES)));
	$query2 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query2'], ENT_QUOTES)));
	$query3 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query3'], ENT_QUOTES)));
	$query4 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query4'], ENT_QUOTES)));
	$tables = "entregas";
	$campos = "*";
	$sWhere = " id_entrega LIKE '%" . $query . "%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere1 = " fecha LIKE '%" . $query1 . "%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere2 = " observacion LIKE '%" . $query2 . "%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere3 = " CLIENT_ID LIKE '%" . $query3 . "%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere4 = " id_producto LIKE '%" . $query4 . "%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	// $sWhere1 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where barrio LIKE '%" . $query1 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	// $sWhere2 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where nomap LIKE '%" . $query2 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	// $sWhere3 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where zona LIKE '%" . $query3 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	// $sWhere4 = " CLIENT_ID in(SELECT CLIENT_ID from beneficiario_interno Where escuela LIKE '%" . $query4 . "%')"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere .= " order by entregas." . $test;

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
	$query = mysqli_query($con, utf8_decode("SELECT $campos FROM  $tables where $sWhere1 AND $sWhere2 AND $sWhere3  AND $sWhere4  AND $sWhere   LIMIT $offset,$per_page"));
	//loop through fetched data
	if ($numrows > 0) {

?>
		<div class="table-responsive">
			<table id="myTable" class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center' onclick="sortTable(1)" style="cursor: pointer;">Id de la entrega</th>
						<th class='text-center' onclick="sortTable(2)" style="cursor: pointer;">Cliente Id</th>
						<th class='text-center' onclick="sortTable(3)" style="cursor: pointer;">Nombre</th>
						<th class='text-center' onclick="sortTable(4)" style="cursor: pointer;">Producto</th>
						<th class='text-center' onclick="sortTable(5)" style="cursor: pointer;">Fecha</th>
						<th class='text-center' onclick="sortTable(6)" style="cursor: pointer;">Observación</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$finales=0;
					while ($row = mysqli_fetch_array($query)) {
						$id = $row['id_entrega'];
						$fecha = $row['fecha'];
						$producto = $row['id_producto'];
						$cliente = $row['CLIENT_ID'];
						$obs = $row['observacion'];
						$finales++;
						$query22 =mysqli_query($con,"SELECT `nomap` FROM `beneficiario_interno` WHERE `CLIENT_ID` = ".$cliente."");
						while ($valores = mysqli_fetch_array($query22)) {$nombre= $valores['nomap'] ;}
						$query11 =mysqli_query($con,"SELECT `nombre` FROM `productos` WHERE `id_producto` = ".$producto."");
						while ($valores = mysqli_fetch_array($query11)) {$nombre_prod= $valores['nombre'] ;}

					?>	
					<tr >
					<td class='text-center'><?php echo $id; ?></td>
						<td class='text-center'><?php echo $cliente; ?></td>
						<td class='text-center'><?php echo $nombre; ?></td>
						<td class='text-center'><?php echo $producto .' - '. $nombre_prod; ?></td>
						<td class='text-center'><?php echo $fecha; ?></td>
						<td class='text-center'><?php echo $obs; ?></td>
						
											<td>
							

								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id2="<?php echo $id; ?>">
									<i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
							</td>

					

						</tr>
					<?php }
					?>
					

					<div><?php
							$cont = 0;
							$query = mysqli_query($con, utf8_decode("SELECT $campos FROM  $tables where $sWhere1 AND $sWhere2 AND $sWhere3  AND $sWhere4 AND $sWhere   LIMIT $offset,$per_page"));
							while ($row = mysqli_fetch_array($query)) {
								$id = $row['id_entrega'];
								$cont++;
							}
							echo "Total: ";
							echo ($cont);
							// if($)
							// $sql = "UPDATE tarea SET id_facilitador='".$facilitador2."' WHERE id='".$id."' ";
							// $query6 = mysqli_query($con,$sql);
							?>

				
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