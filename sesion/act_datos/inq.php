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
						<h2><b>Lista Beneficiarios</b></h2>
					</div>
					<div class="col-sm-6">
                        <a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">power_settings_new</i> <span>Cerrar sesión</span></a>
						<a href="../principal.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">keyboard_backspace</i> <span>Atrás</span></a>
                        
                        <form action="index.php" class="form-inline" method="post" enctype="multipart/form-data">
	 	        	     <input type="file" name="archivo" class="btn btn-success"/>
	 		             <input type="submit" value="SUBIR ARCHIVO" class="btn btn-success" name="enviar">
         </form>
         



         
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
		<div class='col-sm-4-8 '>
				<a href="401.php" class="btn btn-light" role="button">401</a>
                <a href="402.php" class="btn btn-light" role="button">402</a>         
               
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