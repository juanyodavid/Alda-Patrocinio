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
						<h2><b>Tareas</b></h2>
					</div>
					<div class="col-sm-6">
                        <a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">power_settings_new</i> <span>Cerrar sesión</span></a>
						<a href="../principal.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">keyboard_backspace</i> <span>Atrás</span></a>
                       
						
           
					</div>
                </div>
            </div>
			<div class='col-sm-3 '>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar por id"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                            </div>
                            <div class="input-group col-md-16">
                                <input type="text" class="form-control" placeholder="Buscar por barrio"  id="w" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                            </div>
                            <div class="input-group col-md-18">
                                <input type="text" class="form-control" placeholder="Buscar por nombre"  id="e" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                            </div>
							<div class="input-group col-md-18">
							
							<select name="zona_add" id="f" placeholder="Buscar por nombre"class="form-control">
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
							<button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
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


	<script src="js/tarea_script.js"></script>
</body>
</html>


       