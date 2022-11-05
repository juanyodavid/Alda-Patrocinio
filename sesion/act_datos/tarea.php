<?php session_start();
    if(isset($_SESSION['nombre'])){
    }else{
        header ('location: login.php');
    }  
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALDA: Tareas</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../web/bootstrap.min.css">
<script src="../../web/jquery.min.js"></script>
<script src="../../web/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/custom.css"><!-- hasta aca carga las librerias -->
</head>
<body>
    <div class="container" style="width: 100%;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Tareas</b></h2>
					</div>
					<div class="col-sm-6">
                        <a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">power_settings_new</i> <span>Cerrar sesión</span></a>
						<a href="../principal.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">keyboard_backspace</i> <span>Atrás</span></a>
                        <!-- <form action="tarea.php" class="form-inline" method="post" enctype="multipart/form-data">
							<input type="file" name="archivo" class="btn btn-success">
							<input type="submit" value="Anl/Cpr" class="btn btn-success" name="enviar"/>
         				</form> -->
						<button class="open-button" onclick="openForm()">Importar CSV</button>
		  				<div class="form-popup" id="myForm">
         				  <form action="tarea.php" class="form-container" method="post" enctype="multipart/form-data">

         				    <input type="number" placeholder="Columna del ClientID" name="cliente"class="form-control" required>
         				    <input type="text" placeholder="Tipo de tarea" name="tarea"class="form-control" required>
         				    <input type="date" placeholder="Fecha" name="fecha" class="form-control"required>
							<input type="file" name="archivo" class="custom-file-input">
							<input type="submit" value="Importar" class="btn btn-success" name="enviar">
         				    <button type="button" class="btn cancel" onclick="closeForm()">Cerrar</button>
         				  </form>
         				</div>



						<?php

							if (isset($_POST["enviar"])) {//nos permite recepcionar una variable que si exista y que no sea null
								require_once("conexion.php");
								$id = $_POST['cliente']-1; //se le resta 1 por que empieza en 0
								$tarea = $_POST['tarea'];
								$fecha = $_POST['fecha'];
								require_once("ajax/tarea_ajax/csv/csv_load.php");
								$archivo = $_FILES["archivo"]["name"];
								$archivo_copiado= $_FILES["archivo"]["tmp_name"];
								$archivo_guardado = "copia_".$archivo;
								//echo $archivo."esta en la ruta temporal: " .$archivo_copiado;
								if (copy($archivo_copiado ,$archivo_guardado )) {
									//echo "se copeo correctamente el archivo temporal a nuestra carpeta de trabajo <br/>";
								}else{
									echo "Hubo un error al cargar el archivo <br/>";
								}
								if (file_exists($archivo_guardado)) {
						    		$fp = fopen($archivo_guardado,"r");//abrir un archivo
        							$rows = 0;
         							while ($datos = fgetcsv($fp , 20000 , ",")) {// aca esta la cantidad de filas que se va a leer y el caracter que les separa
         	    						$rows ++;
                                        if (count($datos)>$id){
         	   							 //echo $datos[1]." ".$datos[5]." ".$datos[6]." ".$datos[7]." ".$datos[8]." ".$datos[9]."<br/>";
                                        
         								if ($rows > 1) {
											$dato=intval($datos[$id]);
				 							$resultado = insertar_datos($fecha, $tarea,$dato);
				 							 //echo $fecha." ".$tarea." ".$datos[$id]." <br/>";
         									if($resultado){
         										//echo "Se insertaron los datos correctamnete<br/>";
         									}else{
         										echo "No se insertaron todos los datos <br/>";
         									}
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
			<div class='col-sm-14 '>
				<div id="custom-search-input">
                            <div class="input col-md-2">
                                <input type="text" class="form-control" placeholder="Buscar por id"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                            </div>
                            <div class="input col-md-2">
                                <input type="text" class="form-control" placeholder="Buscar por barrio"  id="w" onkeyup="load(1);" />
                                <span class="input-group-btn">
                            </div>
                            <div class="input col-md-3">
                                <input type="text" class="form-control" placeholder="Buscar por nombre"  id="e" onkeyup="load(1);" />
                                <span class="input-group-btn">
                            </div>
                            <div class="input col-md-3">
                                <input type="text" class="form-control" placeholder="Buscar por escuela"  id="g" onkeyup="load(1);" />
                                <span class="input-group-btn">
                            </div>
							<div class="input col-md-2">
							<select name="zona_add" id="f" class="form-control" onchange="load(1);">
								<option value="">ZONAS</option>
								<option value="Z1- Esc.Juan de Salazar">Z1- Esc.Juan de Salazar</option>
  								<option value="Z2- 16 de Julio">Z2- 16 de Julio</option>
  								<option value="Z3- Sueños del Pilar-Capilla">Z3- Sueños del Pilar-Capilla</option>
  								<option value="Z4- El Bosque Centro Cuminitario">Z4- El Bosque Centro Cuminitario</option>
  								<option value="Z5- Esc. Divino Niño-NE">Z5- Esc. Divino Niño-NE</option>
  								<option value="Z6 - ICM Aguapey">Z6 - ICM Aguapey</option>
  								<option value="Z7- USF Don Bosco">Z7- USF Don Bosco</option>
  								<option value="Z8- Esc. San Vicente de Paul">Z8- Esc. San Vicente de Paul</option>
  								<option value="Z9- Esc. Nuevo Amanecer">Z9- Esc. Nuevo Amanecer</option>
  								<option value="Z10- Salado">Z10- Salado</option>
  								<option value="Z11-Pabla Ferreira">Z11-Pabla Ferreira</option>
  								<option value="Z12- Esc. San Roque-Red">Z12- Esc. San Roque-Red</option>
 								
							</select>
						</div>



                </div>
			</div>
		<div class='col-sm-4-8 '>
	
               
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->	
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<!-- <?php include("html/tarea_crud/modal_add.php");?> -->
	<!-- Edit Modal HTML -->

    <?php include("html/tarea_crud/modal_edit.php");?>
    <?php include("html/tarea_crud/modal_delete.php");?>

	<script src="js/tarea_script.js"></script>
    <script >

    function fire() {
        $('#myTable tr > *:nth-child('+10+')').toggle();
        $('#myTable tr > *:nth-child('+7+')').toggle();
        $('#myTable tr > *:nth-child('+8+')').toggle();
        $('#myTable tr > *:nth-child('+9+')').toggle();
        showhidebtn = document.getElementById("showhide");
        if(showhidebtn.innerHTML  == "mostrar contactos"){
            showhidebtn.innerHTML = "ocultar contactos";
        }else{
            showhidebtn.innerHTML = "mostrar contactos";
        }
    }
    </script>
</body>
</html>


       