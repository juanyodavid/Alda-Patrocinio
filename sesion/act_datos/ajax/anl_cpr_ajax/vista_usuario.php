<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
    $test = 'CLIENT_NAME ASC';
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $tables="beneficiario_externo";
	$campos="*";
	$sWhere=" beneficiario_externo.CLIENT_NAME LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by beneficiario_externo.".$test;
	
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table
	$count_query   = mysqli_query($con,"SELECT count(*) AS numrows FROM $tables where $sWhere ");
	if ($row= mysqli_fetch_array($count_query)){$numrows = $row['numrows'];}
	else {echo mysqli_error($con);}
	$total_pages = ceil($numrows/$per_page);
	//main query to fetch the data
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table  id="myTable" class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center' onclick="sortTable(0)">Id </a> </th>
						<th class='text-center' onclick="sortTable(1)">Nombre</a></th>  
						<th class='text-center' onclick="sortTable(2)">Pendiente</a></th>
						<th class='text-center' onclick="sortTable(3)">Sexo</a> </th>
						<th class='text-center' onclick="sortTable(4)">Fec. Nac.</a> </th>
						<th class='text-center' onclick="sortTable(5)">Estado.</a> </th>
						<th class='text-center' onclick="sortTable(6)">Id Sponsor</a> </th>
						<th class='text-center' onclick="sortTable(7)">Id Programa</a> </th>
						<th class='text-center' onclick="sortTable(8)">Id Facilitador</a> </th>
						<?php //if (isset($_POST["subject"])){
							//echo "heyy acaa";
						//}
						//else {echo "no pasa nada";}
						?>
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$CLIENT_ID=$row['CLIENT_ID'];
							$CLIENT_NAME=$row['CLIENT_NAME'];
							$PENDDING_YN=$row['PENDDING_YN'];
							$CLIENT_GENDER_DESC=$row['CLIENT_GENDER_DESC'];						
							$ENROLLMENT_STATUS=$row['ENROLLMENT_STATUS'];						
							$CLIENT_DOB=$row['CLIENT_DOB'];						
							$SPONSOR_ID=$row['SPONSOR_ID'];		
							$PGM_ID=$row['PGM_ID'];		
							
							$finales++;
							
						?>	
						<tr >
							<td class='text-center'><?php echo $CLIENT_ID;?></td>
							<td class='text-center'><?php echo $CLIENT_NAME;?></td>					
							<td class='text-center'><?php if ($PENDDING_YN =='Y') {$imp="SI";}else{$imp="NO";}echo $imp;?></td>
							<td class='text-center'><?php echo $CLIENT_GENDER_DESC;?></td>
							<td class='text-center'><?php echo $CLIENT_DOB;?></td>
							<td class='text-center'><?php echo $ENROLLMENT_STATUS;?></td>
							<td class='text-center'><?php echo $SPONSOR_ID;?></td>
							<td class='text-center'><?php echo $PGM_ID;?></td>
							<td>	<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar" >assignment_ind</i></a>
							<a href="#deleteProductModal" class="delete" data-toggle="modal" ><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
					
							<!--	<a <?php if ($estado==0 && $asiento != "") {  ?>href="#checkProductModal" class="check" data-toggle="modal" data-id="<?php echo $par;?>"><i class="material-icons" data-toggle="tooltip" title="Confirmar reserva">done_all</i></a><?php } // libreria en custom.css?>
								 <a <?php if ($asiento == "") {  ?>href="#editAsientoModal"  class="chair" data-toggle="modal" data-asiento_add="<?php echo $asiento?>"data-id="<?php echo $par;?>"><i class="material-icons" data-toggle="tooltip"  title="Confirmar asiento">event_seat</i></a><?php } // libreria en custom.css?>

							<?php  $a="$destino";$b="$par";"\$a = $a";"\$b = $b";?>
							<?php  if ($estado==1&&$asiento != "") { echo "<a href='boleto/imp.php?a=$a&b=$b' target='_blank'  class='print'><i class='material-icons' data-toggle='tooltip' title='Imprimir'>print</i></a>";}?>

								
								
                    		</td>	 -->
						</tr>
						<?php }?>
						<tr>
							
						</tr>
				</tbody>			
			</table>
<script>
function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("myTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc"; 
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
          shouldSwitch= true;
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
      switchcount ++;      
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>
		</div>	
	<?php	
	}	
}
?>          