<?php
	
	/* Connect To Database*/
	require_once ("../../conexion.php");

	
$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables="beneficiario_interno";
	$campos="*";
	$sWhere="beneficiario_interno.nomap LIKE '%".$query."%'";
	$sWhere.=" order by beneficiario_interno.nomap";
	
	
	
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
						<th class='text-center'>ID cliente</th>  
						<th class='text-center'>Nombre y apellido</th>  
						<th class='text-center'>Tipo de doc.</th>
						<th class='text-center'>Nº de doc.</th>  
						<th class='text-center'>Sexo</th>  
						<th class='text-center'>F. de nac.</th>  
						<th class='text-center'>Grado</th>  
						<th class='text-center'>Escuela</th>  
						<th class='text-center'>Barrio</th>  
						<th class='text-center'>Zona</th>  
						<th class='text-center'>1º Nombre, Parentezco</th>  
						<th class='text-center'>1º Contacto</th>  
						<th class='text-center'>2º Nombre, Parentezco</th>  
						<th class='text-center'>2º Contacto</th>  
						<th class='text-center'>3º Nombre, Parentezco</th>  
						<th class='text-center'>3º Contacto</th>  
						<th class='text-center'>4º Nombre, Parentezco</th>  
						<th class='text-center'>4º Contacto</th>  
						<th class='text-center'>Ref. doméstica</th>  
						<th class='text-center'>Obs.</th>  
						<th class='text-center'>Año de inscripción</th>  
						<th class='text-center'>Nº de programa</th>  
<th class='text-center' style='display:none;'>cdff</th>  
<th class='text-center' style='display:none;'>altura</th>  
<th class='text-center' style='display:none;'>peso</th>  
<th class='text-center' style='display:none;'>slev</th>  
<th class='text-center' style='display:none;'>sgrd</th>  
<th class='text-center' style='display:none;'>fsub</th>  
<th class='text-center' style='display:none;'>fsu2</th>  
<th class='text-center' style='display:none;'>eact</th>  
<th class='text-center' style='display:none;'>rsch</th>  
<th class='text-center' style='display:none;'>sdst</th>  
<th class='text-center' style='display:none;'>trns</th>  
<th class='text-center' style='display:none;'>hlth</th>  
<th class='text-center' style='display:none;'>hlt2</th>  
<th class='text-center' style='display:none;'>hlt3</th>  
<th class='text-center' style='display:none;'>sphn</th>  
<th class='text-center' style='display:none;'>chrs</th>  
<th class='text-center' style='display:none;'>cact</th>  
<th class='text-center' style='display:none;'>cac2</th>  
<th class='text-center' style='display:none;'>wtob</th>  
<th class='text-center' style='display:none;'>hohh</th>  
<th class='text-center' style='display:none;'>lwth</th>  
<th class='text-center' style='display:none;'>tbro</th>  
<th class='text-center' style='display:none;'>tsis</th>  
<th class='text-center' style='display:none;'>toth</th>  
<th class='text-center' style='display:none;'>focc</th>  
<th class='text-center' style='display:none;'>mocc</th>  
<th class='text-center' style='display:none;'>mnah</th>  
<th class='text-center' style='display:none;'>fnah</th>  
<th class='text-center' style='display:none;'>gocc</th>  
<th class='text-center' style='display:none;'>relg</th>  
<th class='text-center' style='display:none;'>othrelg</th>  
<th class='text-center' style='display:none;'>lang</th>  
<th class='text-center' style='display:none;'>lan2</th>  
<th class='text-center' style='display:none;'>hous</th>  
<th class='text-center' style='display:none;'>latr</th>  
<th class='text-center' style='display:none;'>latd</th>  
<th class='text-center' style='display:none;'>fpwc</th>  
<th class='text-center' style='display:none;'>wdws</th>  
<th class='text-center' style='display:none;'>comh</th>  
<th class='text-center' style='display:none;'>orph</th>  
<th class='text-center' style='display:none;'>ben1</th>  
<th class='text-center' style='display:none;'>ben2</th>  
<th class='text-center' style='display:none;'>ben3</th>  
<th class='text-center' style='display:none;'>famb</th>  
<th class='text-center' style='display:none;'>fam2</th>  
<th class='text-center' style='display:none;'>oth</th>  
<th class='text-center' style='display:none;'>informante</th>  
<th class='text-center' style='display:none;'>relinf</th>  
<th class='text-center' style='display:none;'>fechaen</th>						
<th class='text-center' style='display:none;'>positiontext</th>						
<th class='text-center' style='display:none;'>fileToUpload</th>						
			
						
						<th></th>
					</tr>
				</thead>
				<tbody>	
						<?php 
						$finales=0;
						while($row = mysqli_fetch_array($query)){	
							$p_1=$row['CLIENT_ID'];
							$p_2=$row['nomap'];
							$p_apellido=$row['apellido'];
							$p_3=$row['docn'];
							$p_4=$row['sexo'];
							$p_5=$row['tipodoc'];
							$p_6=$row['fecnac'];
							$p_7=$row['grado'];
							$p_8=$row['escuela'];
							$p_9=$row['familia'];
							$p_10=$row['barrio'];
							$p_11=$row['zona'];
							$p_12=$row['contacto1'];
							$p_13=$row['nombre_paren1'];
							$p_14=$row['contacto2'];
							$p_15=$row['nombre_paren2'];
							$p_16=$row['contacto3'];
							$p_17=$row['nombre_paren3'];
							$p_18=$row['contacto4'];
							$p_19=$row['nombre_paren4'];
							$p_191=$row['parent1'];
							$p_192=$row['parent2'];
							$p_193=$row['parent3'];
							$p_194=$row['parent4'];
							$p_20=$row['referdom'];
							$p_21=$row['obs'];
							$p_22=$row['insc'];
							$p_23=$row['programa'];														
							$finales++;
						?>	
						<tr >
							<td class='text-center'><?php echo $p_1;?></td>
							<td class='text-center'><?php echo $p_2.' '.$p_apellido;?></td>
							<td class='text-center'><?php echo $p_5;?></td>
							<td class='text-center'><?php echo $p_3;?></td>
							<td class='text-center'><?php echo $p_4;?></td>
							<td class='text-center'><?php echo $p_6;?></td>
							<td class='text-center'><?php echo $p_7;?></td>
							<td class='text-center'><?php echo $p_8;?></td>
							<td class='text-center'><?php echo $p_10;?></td>
							<td class='text-center'><?php echo $p_11;?></td>
							<td class='text-center'><?php echo $p_13.', '.$p_191;?></td>
							<td class='text-center'><?php echo $p_12;?></td>
							<td class='text-center'><?php echo $p_15.', '.$p_192;?></td>
							<td class='text-center'><?php echo $p_14;?></td>
							<td class='text-center'><?php echo $p_17.', '.$p_193;?></td>
							<td class='text-center'><?php echo $p_16;?></td>
							<td class='text-center'><?php echo $p_19.', '.$p_194;?></td>
							<td class='text-center'><?php echo $p_18;?></td>
							<td class='text-center'><?php echo $p_20;?></td>
							<td class='text-center'><?php echo $p_21;?></td>
							<td class='text-center'><?php echo $p_22;?></td>
							<td class='text-center'><?php echo $p_23;?></td>
<td class='text-center' style='display:none;'><?php echo $row['cdff']?></td>
<td class='text-center' style='display:none;'><?php echo $row['altura']?></td>
<td class='text-center' style='display:none;'><?php echo $row['peso']?></td>
<td class='text-center' style='display:none;'><?php echo $row['slev']?></td>
<td class='text-center' style='display:none;'><?php echo $row['sgrd']?></td>
<td class='text-center' style='display:none;'><?php echo $row['fsub']?></td>
<td class='text-center' style='display:none;'><?php echo $row['fsu2']?></td>
<td class='text-center' style='display:none;'><?php echo $row['eact']?></td>
<td class='text-center' style='display:none;'><?php echo $row['rsch']?></td>
<td class='text-center' style='display:none;'><?php echo $row['sdst']?></td>
<td class='text-center' style='display:none;'><?php echo $row['trns']?></td>
<td class='text-center' style='display:none;'><?php echo $row['hlth']?></td>
<td class='text-center' style='display:none;'><?php echo $row['hlt2']?></td>
<td class='text-center' style='display:none;'><?php echo $row['hlt3']?></td>
<td class='text-center' style='display:none;'><?php echo $row['sphn']?></td>
<td class='text-center' style='display:none;'><?php echo $row['chrs']?></td>
<td class='text-center' style='display:none;'><?php echo $row['cact']?></td>
<td class='text-center' style='display:none;'><?php echo $row['cac2']?></td>
<td class='text-center' style='display:none;'><?php echo $row['wtob']?></td>
<td class='text-center' style='display:none;'><?php echo $row['hohh']?></td>
<td class='text-center' style='display:none;'><?php echo $row['lwth']?></td>
<td class='text-center' style='display:none;'><?php echo $row['tbro']?></td>
<td class='text-center' style='display:none;'><?php echo $row['tsis']?></td>
<td class='text-center' style='display:none;'><?php echo $row['toth']?></td>
<td class='text-center' style='display:none;'><?php echo $row['focc']?></td>
<td class='text-center' style='display:none;'><?php echo $row['mocc']?></td>
<td class='text-center' style='display:none;'><?php echo $row['mnah']?></td>
<td class='text-center' style='display:none;'><?php echo $row['fnah']?></td>
<td class='text-center' style='display:none;'><?php echo $row['gocc']?></td>
<td class='text-center' style='display:none;'><?php echo $row['relg']?></td>
<td class='text-center' style='display:none;'><?php echo $row['othrelg']?></td>
<td class='text-center' style='display:none;'><?php echo $row['lang']?></td>
<td class='text-center' style='display:none;'><?php echo $row['lan2']?></td>
<td class='text-center' style='display:none;'><?php echo $row['hous']?></td>
<td class='text-center' style='display:none;'><?php echo $row['latr']?></td>
<td class='text-center' style='display:none;'><?php echo $row['latd']?></td>
<td class='text-center' style='display:none;'><?php echo $row['fpwc']?></td>
<td class='text-center' style='display:none;'><?php echo $row['wdws']?></td>
<td class='text-center' style='display:none;'><?php echo $row['comh']?></td>
<td class='text-center' style='display:none;'><?php echo $row['orph']?></td>
<td class='text-center' style='display:none;'><?php echo $row['ben1']?></td>
<td class='text-center' style='display:none;'><?php echo $row['ben2']?></td>
<td class='text-center' style='display:none;'><?php echo $row['ben3']?></td>
<td class='text-center' style='display:none;'><?php echo $row['famb']?></td>
<td class='text-center' style='display:none;'><?php echo $row['fam2']?></td>
<td class='text-center' style='display:none;'><?php echo $row['oth']?></td>
<td class='text-center' style='display:none;'><?php echo $row['informante']?></td>
<td class='text-center' style='display:none;'><?php echo $row['relinf']?></td>
<td class='text-center' style='display:none;'><?php echo $row['fechaen']?></td>
<td class='text-center' style='display:none;'><?php echo $row['positiontext']?></td>
<td class='text-center' style='display:none;'><?php echo $row['file1']?></td>

							
							
							<td><a href="#"data-target="#editProductModal" class="edit" data-toggle="modal" 
							data-id_add="<?php echo $p_1;?>"
							data-nombre="<?php echo $p_2;?>"
							data-apellido="<?php echo $p_apellido;?>"
							data-nd ="<?php echo $p_3;?>"
							data-sexo ="<?php echo $p_4;?>"
							data-tipo_doc ="<?php echo $p_5;?>"
							data-fecha ="<?php echo $p_6;?>"
							data-grado="<?php echo $p_7;?>"
							data-escuela="<?php echo $p_8;?>"
							data-barrio ="<?php echo $p_10;?>"
							data-zona ="<?php echo $p_11;?>"
							data-np1 ="<?php echo $p_13;?>"
							data-c1 ="<?php echo $p_12;?>"
							data-np2 ="<?php echo $p_15;?>"
							data-c2 ="<?php echo $p_14;?>"
							data-np3="<?php echo $p_17;?>"
							data-c3 ="<?php echo $p_16;?>"
							data-np4="<?php echo $p_19;?>"
							data-c4 ="<?php echo $p_18;?>"
							data-parent1 ="<?php echo $p_191;?>"
							data-parent2 ="<?php echo $p_192;?>"
							data-parent3 ="<?php echo $p_193;?>"
							data-parent4 ="<?php echo $p_194;?>"
							data-ref_dom="<?php echo $p_20;?>"
							data-observacion="<?php echo $p_21;?>"
							data-ins="<?php echo $p_22;?>"
							data-prog="<?php echo $p_23;?>"
data-cdff="<?php echo $row['cdff']?>"
data-altura="<?php echo $row['altura']?>"
data-peso="<?php echo $row['peso']?>"
data-slev="<?php echo $row['slev']?>"
data-sgrd="<?php echo $row['sgrd']?>"
data-fsub="<?php echo $row['fsub']?>"
data-fsu2="<?php echo $row['fsu2']?>"
data-eact="<?php echo $row['eact']?>"
data-rsch="<?php echo $row['rsch']?>"
data-sdst="<?php echo $row['sdst']?>"
data-trns="<?php echo $row['trns']?>"
data-hlth="<?php echo $row['hlth']?>"
data-hlt2="<?php echo $row['hlt2']?>"
data-hlt3="<?php echo $row['hlt3']?>"
data-sphn="<?php echo $row['sphn']?>"
data-chrs="<?php echo $row['chrs']?>"
data-cact="<?php echo $row['cact']?>"
data-cac2="<?php echo $row['cac2']?>"
data-wtob="<?php echo $row['wtob']?>"
data-hohh="<?php echo $row['hohh']?>"
data-lwth="<?php echo $row['lwth']?>"
data-tbro="<?php echo $row['tbro']?>"
data-tsis="<?php echo $row['tsis']?>"
data-toth="<?php echo $row['toth']?>"
data-focc="<?php echo $row['focc']?>"
data-mocc="<?php echo $row['mocc']?>"
data-mnah="<?php echo $row['mnah']?>"
data-fnah="<?php echo $row['fnah']?>"
data-gocc="<?php echo $row['gocc']?>"
data-relg="<?php echo $row['relg']?>"
data-othrelg="<?php echo $row['othrelg']?>"
data-lang="<?php echo $row['lang']?>"
data-lan2="<?php echo $row['lan2']?>"
data-hous="<?php echo $row['hous']?>"
data-latr="<?php echo $row['latr']?>"
data-latd="<?php echo $row['latd']?>"
data-fpwc="<?php echo $row['fpwc']?>"
data-wdws="<?php echo $row['wdws']?>"
data-comh="<?php echo $row['comh']?>"
data-orph="<?php echo $row['orph']?>"
data-ben1="<?php echo $row['ben1']?>"
data-ben2="<?php echo $row['ben2']?>"
data-ben3="<?php echo $row['ben3']?>"
data-famb="<?php echo $row['famb']?>"
data-fam2="<?php echo $row['fam2']?>"
data-oth="<?php echo $row['oth']?>"
data-informante="<?php echo $row['informante']?>"
data-relinf="<?php echo $row['relinf']?>"
data-fechaen="<?php echo $row['fechaen']?>"
data-positiontext="<?php echo $row['positiontext']?>"
data-fileToUpload="<?php echo $row['file1']?>"

							
							 ><i class="material-icons" data-toggle="tooltip" title="Editar" >&#xE254;</i></a>
								<a href="#deleteProductModal" class="delete" data-toggle="modal" data-id="<?php echo $p_1;?>"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
								<a href="#imgModal" class="image" data-toggle="modal" data-id="<?php echo $p_1;?>"><i class="material-icons" data-toggle="tooltip" title="Adjuntar imágen">&#xE864;</i></a>
                    		</td>
							
							
							
							
							
							
						</tr>
						<?php }?>
						<tr>
							<td colspan='21'> 
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



