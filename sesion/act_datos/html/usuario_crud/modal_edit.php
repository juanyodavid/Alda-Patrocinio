<?php require_once("conexion.php"); ?>
<div id="editProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="edit_product" id="edit_product">
				<div class="modal-header">
					<h4 class="modal-title">Editar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>C.I.</label>
						<input type="number" placeholder="Ingrese el C.I. sin puntos" name="cedula_edit" id="cedula_edit" class="form-control" required>
						<input type="hidden" name="edit_id" id="edit_id">
					</div>
					<div class="form-group">
						<label>Nombre y apellidos</label>
						<input type="text" name="nomap_edit" id="nomap_edit" class="form-control" required>

					</div>
					<div class="form-group">
						<label>Celular</label>
						<input type="text" name="cel_edit" id="cel_edit" class="form-control">

					</div>
					<div class="form-group">
						<label>Barrio</label>
						<input type="text" name="barrio_edit" id="barrio_edit" class="form-control" required>
					</div>

					<div class="form-group">
						<label>Nombre de usuario</label>
						<input type="text" name="username_edit" id="username_edit" class="form-control" required>

						<div class="form-group">
							<label>Observación</label>
							<input type="text" name="obs_edit" id="obs_edit" class="form-control">

						</div>
						<div class="form-group">
							<label>Estado</label>
							<select name="estado_edit" id="estado_edit" class="form-control">
								<option value="0">Innactivo</option>
								<option value="1">Actualizador de datos</option>
								<option value="2">Pasantia</option>
							</select>
						</div>
						<div class="form-group">
							<label>Nueva contraseña*</label>
							<input type="password" name="new_pass" id="new_pass" class="form-control">
							<small>*solamente si desea cambiar la contraseña</small>
						</div>
						<div class="form-group">
							<label>Confirmar contraseña*</label>
							<input type="password" name="new_pass_conf" id="new_pass_conf" class="form-control">
							<small>*solamente si desea cambiar la contraseña</small>
						</div>
					</div>
					<div class="modal-footer">

						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Guardar">
						</div></div>
			</form>
		</div>
	</div>
</div>