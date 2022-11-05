<?php
	
	/* Connect To Database*/
require_once ("../../conexion.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
    $test = 'id_boleto DESC';
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
    $tables="boleto";
	$campos="*";
	$sWhere=" boleto.id_boleto LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by boleto.".$test;
	$suma=0;
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
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Cod. boleto</a> </th>
						<th class='text-center'>C.I.</a></th>  
						<th class='text-center'>Nombre</a></th>
						<th class='text-center'>Apellido</a> </th>
						<th class='text-center'>Destino</a> </th>
						<th class='text-center'>Precio</a> </th>
						<th class='text-center'>D. de salida</a> </th>
						<th class='text-center'>H. de salida</a> </th>
						<th class='text-center'>Asiento</a> </th>
						<th class='text-center'>Estado</a> </th>
						<th class='text-center'>Obs.</a> </th>
						<th class='text-center'>Chapa de Bus</a> </th>
				
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$par=$row['id_boleto'];
							$cria=$row['doc_pas'];
							$carimbo=$row['apellido'];
							$fecha=$row['estado'];						
							$estado=$row['obs'];						
							$padre=$row['id_destino'];						
							$asiento=$row['asiento'];		
							$pelaje=$row['nombre'];		
				
							$finales++;
							if ($fecha== 1) {
							
						?>	
						<tr >
							<td class='text-center'><?php echo $par;?></td>
							<td class='text-center'><?php echo $cria;?></td>					
							<td class='text-center'><?php echo $pelaje;?></td>
							<td class='text-center'><?php echo $carimbo;?></td>
							<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT  `destino` FROM `destino` WHERE id_destino =".$padre."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['destino'] ;}
          						?></td>
       						<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT  `precio`FROM `destino` WHERE id_destino =".$padre."");
         						 while ($valores = mysqli_fetch_array($query2)) {$suma = $suma +$valores['precio'];
         						 	echo $valores['precio']." gs  ".'';}
          						?></td>
       						<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT `salida_dia` FROM `destino` WHERE id_destino =".$padre."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['salida_dia'] ;}
          						?></td>
       						<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT `salida_hora` FROM `destino` WHERE id_destino =".$padre."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['salida_hora'] ;}
          						?></td>
							<td class='text-center'><?php echo $asiento;?></td>
							<td class='text-center'><?php if ($fecha==1) {$imp="Comprado";}else{$imp="Reservado";}echo $imp;?></td>
							<td class='text-center'><?php echo $estado;?></td>

							<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT `chapa` FROM `bus` WHERE id_bus IN(SELECT id_bus FROM destino WHERE (".$padre." = destino.id_destino))");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['chapa'] ;}
          						?></td>
	
						</tr>
						<?php }}
						?>
						<tr>
							<td colspan='14'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
								echo "Venta total : ", $suma," GS"."<br><br>";
									echo "Mostrando $inicios al $finales de $numrows registros";
									echo paginate( $page, $total_pages, $adjacents);
								?>
							</td>
						</tr>
				</tbody>			
			</table>
		</div>	
	<?php	
	}	
}
?>          