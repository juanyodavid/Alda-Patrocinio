<?php
	
	/* Connect To Database*/
require_once ("../../cnx.php");// conecta con la base de datos
//require_once ("../../usuario.php");// conecta con la base de datos


// Esto evaluará a TRUE así que el texto se imprimirá.

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';// en la variable accion se pregunta si se realizo alguna accion
if($action == 'ajax'){
    $test = 'id DESC';
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
	$name = mysqli_real_escape_string($con,(strip_tags($_REQUEST['name'], ENT_QUOTES)));

// apartado para hacer el query del id

		$query2 =mysqli_query($con,"SELECT `id_facilitador` FROM `facilitador` WHERE nombre = '".$name."'");
		while ($valores = mysqli_fetch_array($query2)) {
			$id_fin= $valores['id_facilitador'] ;}

    $tables="tarea";
	$campos="*";
	$sWhere=" tarea.id LIKE '%".$query."%'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere2=" tarea.id_facilitador LIKE '".$id_fin."'"; // los ampersand hacen que sea una busqueda en toda la palabra y no solo el inicio
	$sWhere.=" order by tarea.".$test;
	
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
	$query = mysqli_query($con,"SELECT $campos FROM  $tables where $sWhere2 AND $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	if ($numrows>0){
		
	?>
		<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th class='text-center'>Id de tarea</a> </th>
						<th class='text-center'>F.de pedido</a></th>  
						<th class='text-center'>F. de visita</a></th>
						<th class='text-center'>Estado</a> </th>
						<th class='text-center'>Obs</a> </th>
						<th class='text-center'>Tipo de tarea</a> </th>
						<th class='text-center'>Id del cliente</a> </th>

					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id'];
							$pedido=$row['fecped'];
							$visita=$row['fecvisita'];
							$estado=$row['estado'];						
							$obs=$row['obs'];						
							$tipo=$row['tipo_tarea'];						
							$cliente=$row['CLIENT_ID'];		
							$finales++;
							
								
						?>	
						<tr >
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $pedido;?></td>					
							<td class='text-center'><?php echo $visita;?></td>
							<td class='text-center'><?php echo $estado;?></td>
							<td class='text-center'><?php echo $obs;?></td>
							<td class='text-center'><?php echo $tipo;?></td>
							<td class='text-center'><?php echo $cliente;?></td>

  				<!-- <td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT  `precio`FROM `destino` WHERE id_destino =".$destino."");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['precio']." gs  ".'';}
          						?></td>


							<td class='text-center'><?php   $query2 =mysqli_query($con,"SELECT `chapa` FROM `bus` WHERE id_bus IN(SELECT id_bus FROM destino WHERE (".$destino." = destino.id_destino))");
         						 while ($valores = mysqli_fetch_array($query2)) {echo $valores['chapa'] ;}
          						?></td>  -->



							<td>
								
								<a href="#"  data-target="#editProductModal" class="edit" data-toggle="modal" data-fecha="<?php echo $visita?>"data-obs="<?php echo $obs?>"
								data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								
								<!-- <a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $par;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a> -->
                    		</td>	
						</tr>
						<?php }?>
						<tr>
							<td colspan='14'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
									echo "Mostrando $inicios al $finales";
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