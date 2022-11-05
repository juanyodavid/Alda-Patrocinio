<?php
if (empty($_POST['tipo-mascota'])) {
	$errors[] = "Ingresa el nombre del producto.";
} elseif (!empty($_POST['tipo-mascota'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	$cliente = mysqli_real_escape_string($con, (strip_tags($_POST["tipo-mascota"], ENT_QUOTES)));
	$producto = mysqli_real_escape_string($con, (strip_tags($_POST["producto_add"], ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con, (strip_tags($_POST["fecha_add"], ENT_QUOTES)));
	$obs = mysqli_real_escape_string($con, (strip_tags($_POST["obs_add"], ENT_QUOTES)));
	// REGISTER data into database
	$sql3 = "INSERT INTO entregas(id_entrega,fecha,observacion,CLIENT_ID,id_producto ) VALUES (null,'$fecha','$obs','$cliente','$producto')";
	// echo $sql3;
					$query = mysqli_query($con, $sql3);
				if ($query) {
					$messages[] = "Carga exitosa.";
				} else {
					$errors[] = "Carga fallida.";
				}
	
	// if product has been added successfully

} else {
	$errors[] = "desconocido.";
}
if (isset($errors)) {

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
if (isset($messages)) {

?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Concretada</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}
?>