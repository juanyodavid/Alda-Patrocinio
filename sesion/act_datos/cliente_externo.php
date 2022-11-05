<?php session_start();
    if(isset($_SESSION['nombre'])){
    }else{
        header ('location: login.php');
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALDA: Beneficiarios</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css"><!-- hasta aca carga las librerias -->
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Lista de beneficiarios EXTERNA</b></h2>
					</div>
					
					<div class="col-sm-6">
                        <a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">power_settings_new</i> <span>Cerrar sesión</span></a>
						<a href="../principal.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">keyboard_backspace</i> <span>Atrás</span></a>
                        
                        <form action="cliente_externo.php" class="form-inline" method="post" enctype="multipart/form-data">
	 	        	     <input type="file" name="archivo" class="btn btn-success"/>
	 		             <input type="submit" value="SUBIR ARCHIVO" class="btn btn-success" name="enviar">
         </form>
         
		 <?php

if (isset($_POST["enviar"])) {//nos permite recepcionar una variable que si exista y que no sea null
	require_once("conexion.php");
	require_once("ajax/cliente_externo_ajax/csv/csv_load.php");
	$archivo = $_FILES["archivo"]["name"];
	$archivo_copiado= $_FILES["archivo"]["tmp_name"];
	$archivo_guardado = "csvs/copia_".$archivo;
	//echo $archivo."esta en la ruta temporal: " .$archivo_copiado;
	if (copy($archivo_copiado ,$archivo_guardado )) {
		//echo "se copeo correctamente el archivo temporal a nuestra carpeta de trabajo <br/>";
	}else{
		echo "Hubo un error al cargar el archivo <br/>";
	}
	if (file_exists($archivo_guardado)) {
		$fp = fopen($archivo_guardado,"r");//abrir un archivo, r es de read
		$rows = 0;
		 while ($datos = fgetcsv($fp , 2000 , ",")) {// aca esta la cantidad de filas que se va a leer y el caracter que les separa
			 $rows ++;
				// echo $datos[1]." ".$datos[5]." ".$datos[6]." ".$datos[7]." ".$datos[8]." ".$datos[9]." ".$datos[10]." ".$datos[11]."<br/>";
			 if ($rows > 1) {
				 $resultado = insertar_datos($datos[1], $datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11]);
				 //echo $datos[1]." ".$datos[5]." ".$datos[6]." ".$datos[7]." ".$datos[8]." ".$datos[9]." ".$datos[10]." ".$datos[11]."<br/>";
				 if($resultado){
					 //	echo "se inserto los datos correctamnete<br/>";
				 }else{
					// echo "No se insertaron todos los datos <br/>";
				 }
			 }
		}

	}else{
		echo "No existe el archivo copiado <br/>";
	   }
}


?>
           
					</div>
                </div>
            </div>
			<div class='col-sm-3 pull-right'>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
			</div>
		<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->	
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include("html/cliente_externo_crud/modal_add.php");?>
	<!-- Edit Modal HTML -->
	<?php include("html/cliente_externo_crud/modal_edit.php");?>
	<!-- Delete Modal HTML -->
    <?php include("html/cliente_externo_crud/modal_delete.php");?>

	<script src="js/cliente_externo_script.js"></script>
</body>
</html>


       