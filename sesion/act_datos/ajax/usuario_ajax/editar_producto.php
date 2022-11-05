<?php
if (empty($_POST['edit_id'])) {
	$errors[] = "ID está vacío.";
} elseif (!empty($_POST['edit_id'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	$cedula = mysqli_real_escape_string($con, (strip_tags($_POST["cedula_edit"], ENT_QUOTES)));
	$nomap = mysqli_real_escape_string($con, (strip_tags($_POST["nomap_edit"], ENT_QUOTES)));
	$cel = mysqli_real_escape_string($con, (strip_tags($_POST["cel_edit"], ENT_QUOTES)));
	$barrio = mysqli_real_escape_string($con, (strip_tags($_POST["barrio_edit"], ENT_QUOTES)));
	$username = mysqli_real_escape_string($con, (strip_tags($_POST["username_edit"], ENT_QUOTES)));
	$obs = mysqli_real_escape_string($con, (strip_tags($_POST["obs_edit"], ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con, (strip_tags($_POST["estado_edit"], ENT_QUOTES)));
	$new_pass = mysqli_real_escape_string($con, (strip_tags($_POST["new_pass"], ENT_QUOTES)));
	$new_pass_conf = mysqli_real_escape_string($con, (strip_tags($_POST["new_pass_conf"], ENT_QUOTES)));
	$id = intval($_POST['edit_id']);	// UPDATE data into database
	
	
	if ($new_pass == $new_pass_conf) {
	$new_pass = hash('sha512', $new_pass);
	$sql = "UPDATE facilitador SET id_facilitador='" . $cedula . "',nombre='" . $username . "',barrio='" . $barrio . "',celular='" . $cel . "',nombre_apellido='" . $nomap . "',     observacion='" . $obs . "',estado='" . $estado . "',pass='" . $new_pass . "' WHERE id_facilitador='" . $id . "' ";
	$query = mysqli_query($con, $sql);
	// if product has been added successfully
	if ($query) {
		$messages[] = "Actualización exitosa.";
	} else {
		$errors[] = "Actualización fallida.";
	}}else
	{
		$errors[] = "Las contraseñas no coinciden. ";
	}
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