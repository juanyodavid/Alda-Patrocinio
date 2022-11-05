<?php
	$id2="";

	if (empty($_POST['id2'])){
		if (empty($_POST['idm'])){
				$errors[] = "ID está Vacío.";
		} elseif (!empty($_POST['idm'])){
			require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
			$id3 = mysqli_real_escape_string($con,(strip_tags($_POST["idm"],ENT_QUOTES)));
			$id2 = str_replace("x",",",$id3);
		}



	} elseif (!empty($_POST['id2'])){
	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
		$id3 = mysqli_real_escape_string($con,(strip_tags($_POST["id2"],ENT_QUOTES)));
		$id2 = str_replace("x",",",$id3);
	}
	if($id2 != ""){

	// escaping, additionally removing everything that could be (html/javascript-) code
  	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_ped_edit"],ENT_QUOTES)));
  	$facilitador = mysqli_real_escape_string($con,(strip_tags($_POST["facilitador_edit"],ENT_QUOTES)));
	//$id=intval($_POST['edit_id']);
	// echo $id2;
	// UPDATE data into database

    $sql = "UPDATE tarea SET id_facilitador='".$facilitador."',fecped='".$fecha."' WHERE id in (".$id2.") ";
    $query = mysqli_query($con,$sql);
    // if product has been added successfully
    if ($query) {
        $messages[] = "Actualización exitosa.";
    } else {
        $errors[] = "Actualización fallida.";
    }
		
	} else 
	{
		$errors[] = "desconocido.";
	}
			if (isset($errors)){
			
			?>
				<div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Error!</strong> 
						<?php
							foreach ($errors as $error) {
								echo $error;
								}
						?>
				</div>
			<?php
			}
			if (isset($messages)){
				
			?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Concretada.</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
			<?php
			}
?>
