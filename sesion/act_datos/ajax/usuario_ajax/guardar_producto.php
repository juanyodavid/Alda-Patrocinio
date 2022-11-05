<?php
if (empty($_POST['id_add'])) {
	$errors[] = "Ingresa el nombre del producto.";
} elseif (!empty($_POST['id_add'])) {
	require_once("../../conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) editor_nombre
	$cedula = mysqli_real_escape_string($con, (strip_tags($_POST["id_add"], ENT_QUOTES)));
	$nomap = mysqli_real_escape_string($con, (strip_tags($_POST["nomap_add"], ENT_QUOTES)));
	$cel = mysqli_real_escape_string($con, (strip_tags($_POST["cel_add"], ENT_QUOTES)));
	$barrio = mysqli_real_escape_string($con, (strip_tags($_POST["barrio_add"], ENT_QUOTES)));
	$username = mysqli_real_escape_string($con, (strip_tags($_POST["username_add"], ENT_QUOTES)));
	$pass = mysqli_real_escape_string($con, (strip_tags($_POST["pass_add"], ENT_QUOTES)));
	$passconf = mysqli_real_escape_string($con, (strip_tags($_POST["passconf_add"], ENT_QUOTES)));
	$cod = mysqli_real_escape_string($con, (strip_tags($_POST["cod_add"], ENT_QUOTES)));
	$estado = mysqli_real_escape_string($con, (strip_tags($_POST["estado_add"], ENT_QUOTES)));
	$observacion = mysqli_real_escape_string($con, (strip_tags($_POST["obs_add"], ENT_QUOTES)));
	// REGISTER data into database
	// TODO: lo que hace falta ahora es validar el password y ademas dependiendo del cod le genere que tipo de usuario es
	$codigoac = "2218admin"; // es el codigo de acceso de los nombres y administradores
	$codigo_sec = "6544user"; // es el codigo de acceso de los nombres
	if ($pass == $passconf) {
		$pass = hash('sha512', $pass);

		$sql = "SELECT *  FROM facilitador WHERE id_facilitador = '" . $cedula . "'";
		$query1 = mysqli_query($con, $sql);
		$filas = mysqli_num_rows($query1);

		if ($filas > 0) {
			$errors[] = '<i> Código de facilitador ya existente.</i>';
		} else {
			$sql1 = "SELECT * FROM facilitador WHERE nombre = '" . $username . "'";
			$query2 = mysqli_query($con, $sql1);
			$filas2 = mysqli_num_rows($query2);

			if ($filas2 > 0) {
				$errors[] = '<i>Este nombre de usuario ya existe.</i>';
			} else {



				if ($cod != $codigoac and $cod != $codigo_sec) {
					$error .= '<i> Código de acceso incorrecto.</i>';
				} else {
					if ($cod == $codigoac) $jerarquia = "principal";
					if ($cod == $codigo_sec) $jerarquia = "secundario";
					$sql3 = "INSERT INTO facilitador(id_facilitador,nombre,pass,barrio,celular,estado,obs,nombre_apellido,observacion ) VALUES ('$cedula','$username','$pass','$barrio','$cel','$estado','$jerarquia','$nomap','$observacion')";
					$query = mysqli_query($con, $sql3);
				}
				if ($query) {
					$messages[] = "Carga exitosa.";
				} else {
					$errors[] = "Carga fallida.";
				}
			}
		}
	} else {
		$errors[] = "Las contraseñas no coinciden.";
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