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
						<label>Estado</label><br>
						<label class="radio-inline"><input type="hidden" name="estado_edit" id="estado_edit" value="Vivo"></label>
						<label class="radio-inline"><input type="radio" name="estado_edit" id="estado_edit" value="Pendiente" required>Pendiente</label>
						<label class="radio-inline"><input type="radio" name="estado_edit" id="estado_edit" value="Solo visitado" required>Solo visitado</label>
						<label class="radio-inline"><input type="radio" name="estado_edit" id="estado_edit" value="Dado de baja" required>Dado de baja</label>
						<label class="radio-inline"><input type="radio" name="estado_edit" id="estado_edit" value="Completado" required checked>Completado</label>


					</div>
					<div class="form-group">
						<label>Obs</label>
						<input type="text" name="obs_edit" id="obs_edit" class="form-control" required>
						<input type="hidden" name="edit_id" id="edit_id">

					</div>

					<div class="form-group">
						<label>Fecha de visita</label>
						<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required>
					</div>

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Guardar">
				</div>
			</form>
		</div>
	</div>
</div>