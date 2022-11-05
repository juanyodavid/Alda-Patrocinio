<?php  require_once ("conexion.php"); ?>

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
							<label>Observación</label>
							<input type="text" name="obs_edit"  id="obs_edit" class="form-control" required>
							<input type="hidden" name="edit_id" id="edit_id" >
						</div>
						<div class="form-group">
							<label>Estado</label>
							<select name="estado_edit"  id="estado_edit" class="form-control" >
								<option value="0">Innactivo</option> 
  								<option value="1" >Actualizador de datos</option>
  								<option value="2">Pasantia</option>
	   						</select>
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