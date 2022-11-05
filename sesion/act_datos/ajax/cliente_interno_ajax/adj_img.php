<?php 
//APARTADO DE IMAGEN

// Count total files
if ( ! empty($_FILES)) {

	
print_r ($_FILES);

$countfiles = count($_FILES['fileToUpload[]']['name']);

// Upload directory
$upload_location = "upload/";

// To store uploaded files path
$files_arr = array();

// Loop all files
if($countfiles>0){

	for($index = 0;$index < $countfiles;$index++){



	        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$index]);
	        $uploadOk = 1;
	        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

	        $target_file = $target_dir . $id ."_" . $index . "." . $imageFileType ; 


	    // Check if image file is a actual image or fake image
	   

	      $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$index]);
	      if($check !== false) {
	        $messages[] =  "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	      } else {
	        $errors[] = "File is not an image.";
	        $uploadOk = 0;
	      }
	    
	    // Check if file already exists
	    if (file_exists($target_file)) {
	      $errors[] =  "Sorry, file already exists.";
	      $uploadOk = 0;
	    }

	    // Check file size
	    if ($_FILES["fileToUpload"]["size"] > 500000) {
	      $errors[] =  "Sorry, your file is too large.";
	      $uploadOk = 0;
	    }

	    // Allow certain file formats
	    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	    && $imageFileType != "gif" ) {
	      $errors[] =  "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	      $uploadOk = 0;
	    }

	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
	      $errors[] =  "Sorry, your file was not uploaded.";
	    // if everything is ok, try to upload file
	    } else {
	      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$index], $target_file)) {
	        $messages[] = "The file ". basename( $_FILES["fileToUpload"]["name"][$index]). " has been uploaded.";
	      } else {
	        $errors[] =  "Sorry, there was an error uploading your file.";
	      }
	    }
	}
}
else{

      $errors[] =  "No se cargaron imagenes";
}
}else{
	$errors[] =  "_FILES esta vacío";
}
}



//FIN APARTADO DE IMAGEN





    // if product has been added successfully
    if ($query) {
        $messages[] = "Modificado exitosamente exitosa.";
    } else {
        $errors[] = "Falla al tratar de Modificar datos". $sql;
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