<?php
	
	/* Connect To Database*/
	require_once ("../../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="facilitador";
	$campos="*";
	$sWhere="facilitador.id_facilitador LIKE '%".$query."%'";
	$sWhere.=" order by facilitador.id_facilitador";
	
	
	
	include '../pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
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
						<th class='text-center'>ID del facilitador</th>  
						<th class='text-center'>Nombre </th>
						<th class='text-center'>Barrio </th>
						<th class='text-center'>Celular</th>
						<th class='text-center'>Obs</th>
						<th class='text-right'>Nombre de usuario</th>
						<th class='text-right'>Estado</th>
					
						
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$id=$row['id_facilitador'];
							$nombre=$row['nombre_apellido'];
							$barrio=$row['barrio'];
							$cel=$row['celular'];
							$obs=$row['obs'];
							$observ=$row['observacion'];
							$user=$row['nombre'];
							$estado=$row['estado'];
							
													
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $id;?></td>
							<td class='text-center'><?php echo $nombre;?></td>
							<td class='text-center'><?php echo $barrio;?></td>
							<td class='text-center'><?php echo $cel;?></td>
							<td class='text-center'><?php echo $observ;?></td>
							<td class='text-center'><?php echo $user;?></td>
							<td class='text-center'><?php echo $estado;?></td>
							
                            
						<td>
							<?php if ($obs == 'secundario'){?>
							<a href="#"data-target="#editProductModal" class="edit" data-toggle="modal" data-obs="<?php echo $observ;?>" 
							data-estado="<?php echo $estado;?>" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a><?php }?>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $id;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                    		</td>
							
							
							
							
							
							
						</tr>
						<?php }?>
						<tr>
							<td colspan='17'> 
								<?php 
									$inicios=$offset+1;
									$finales+=$inicios -1;
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