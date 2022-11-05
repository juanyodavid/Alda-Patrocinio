<?php session_start();
if (isset($_SESSION['secundario'])) {
	$name = $_SESSION['secundario'];
	if (empty($_POST['new_pass'])) {
		$errors[] = "Ingresa la nueva contaseña .";
	} elseif (!empty($_POST['new_pass'])) {
		require_once("../../cnx.php"); //Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
		// $prev_pass = mysqli_real_escape_string($con,(strip_tags($_POST["prev_pass"],ENT_QUOTES)));
		$new_pass = mysqli_real_escape_string($con, (strip_tags($_POST["new_pass"], ENT_QUOTES)));
		$new_pass_conf = mysqli_real_escape_string($con, (strip_tags($_POST["new_pass_conf"], ENT_QUOTES)));


		if ($new_pass == $new_pass_conf) {


			$new_pass = hash('sha512', $new_pass);
			$sql = "UPDATE facilitador SET pass='" . $new_pass . "' WHERE nombre='" . $name . "' ";

			$query = mysqli_query($con, $sql);
		} else {
			$errors[] = "Las contraseñas no coinciden. ";
		}
	}
	if ($query) {

		$messages[] = "Cambio exitoso.";
	} else {
		$errors[] = "Cambio fallido.";
	}
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