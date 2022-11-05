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
						<label>Cliente</label>
						<input type="hidden" name="edit_id" id="edit_id">
						<div class="autocompletar">
							<input type="text" name="cliente_edit" id="cliente_edit">
						</div>

					</div>
					<div class="form-group">
						<label>Productos</label>
						<select name="producto_edit" id="producto_edit" class="form-control" required>
							<?php
							$query2 = mysqli_query($con, "SELECT id_producto,nombre FROM productos");
							while ($valores = mysqli_fetch_array($query2)) {
								echo '<option value="' . $valores[id_producto] . '">' . $valores[id_producto] . ' - ' . $valores[nombre] . '</option>';
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label>Obeservación</label>
						<input type="text" name="obs_edit" id="obs_edit" class="form-control">
					</div>
					<div class="form-group">
						<label>Fecha</label>
						<input type="date" name="fecha_edit" id="fecha_edit" class="form-control">
					</div>
				</div>
				<div class="modal-footer">

					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-info" value="Guardar">
				</div>
		</div>
		</form>
	</div>
</div>
</div>