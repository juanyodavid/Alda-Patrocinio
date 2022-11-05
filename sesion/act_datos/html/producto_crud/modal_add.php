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
						<label>Nombre</label>
						<input type="text" name="nomap_add" id="nomap_add" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Obeservación/descripción</label>
						<input type="text" name="obs_add" id="obs_add" class="form-control">
					</div>
					<div class="form-group">
						<label>Fotos</label>
						<input type="text" name="foto_add" id="foto_add" class="form-control">
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar">
					</div>


				</div>
			</form>
		</div>
	</div>
</div>