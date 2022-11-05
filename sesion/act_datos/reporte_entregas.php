<?php session_start();
if (isset($_SESSION['nombre'])) {
} else {
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>ALDA: Reportes</title>
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
						<h2><b>Reporte de entregas</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">power_settings_new</i> <span>Cerrar sesión</span></a>
						<a href="../principal.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">keyboard_backspace</i> <span>Atrás</span></a>
					

					</div>
				</div>
			</div>
			<div class='col-sm-14 '>
				<div id="custom-search-input">
					<div class="input col-md-2">
						<input type="text" class="form-control" placeholder="Buscar por id" id="q" onkeyup="load(1);" />
						<span class="input-group-btn">
					</div>
					<div class="input col-md-2">
						<input type="date" class="form-control" placeholder="Buscar por fecha" id="w" onkeyup="load(1);" />
						<span class="input-group-btn">
					</div>
					<div class="input col-md-3">
						<input type="text" class="form-control" placeholder="Buscar por obs." id="e" onkeyup="load(1);" />
						<span class="input-group-btn">
					</div><div class="input col-md-2">
						<input type="text" class="form-control" placeholder="Buscar por id del producto" id="f" onkeyup="load(1);" />
						<span class="input-group-btn">
					</div>
					<div class="input col-md-3">
						<input type="text" class="form-control" placeholder="Buscar por id del cliente" id="g" onkeyup="load(1);" />
						<span class="input-group-btn">
					
					


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
	<?php include("html/reporte_ent_crud/modal_delete.php"); ?>

	<script src="js/reporte_ent_script.js"></script>
	</body>

</html>