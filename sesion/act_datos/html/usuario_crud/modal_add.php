<?php require_once("conexion.php"); ?>
<div id="addProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="add_product" id="add_product">
				<div class="modal-header">
					<h4 class="modal-title">Agregar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>C.I.</label>
						<input type="number" placeholder="Ingrese el C.I. sin puntos" name="id_add" id="id_add" class="form-control" required>

					</div>
					<div class="form-group">
						<label>Nombre y apellidos</label>
						<input type="text" name="nomap_add" id="nomap_add" class="form-control" required>

					</div>
					<div class="form-group">
						<label>Celular</label>
						<input type="text" name="cel_add" id="cel_add" class="form-control">

					</div>
					<div class="form-group">
						<label>Barrio</label>
						<input type="text" name="barrio_add" id="barrio_add" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Obeservación</label>
						<input type="text" name="obs_add" id="obs_add" class="form-control">
					</div>
					<div class="form-group">
						<label>Nombre de usuario</label>
						<input type="text" name="username_add" id="username_add" class="form-control" required>

					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input type="password" name="pass_add" id="pass_add" class="form-control" required>

					</div>
					<div class="form-group">
						<label>Confirmar contraseña</label>
						<input type="password" name="passconf_add" id="passconf_add" class="form-control" required>

					</div>
					<div class="form-group">
						<label>Código de acceso*</label>
						<input type="password" name="cod_add" id="cod_add" class="form-control" required>
						<small>*esto definira si el usuario creado es un administrador o no</small>
					</div>
					<div class="form-group">
						<label>Estado</label>
						<select name="estado_add" id="estado_add" class="form-control">
							<option value="0">Innactivo</option>
							<option value="1">Actualizador de datos</option>
							<option value="2">Pasantia</option>
							<option value="3">Administrador</option>
						</select>
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar">
						</div></div>
			</form>
		</div>
	</div>
</div>