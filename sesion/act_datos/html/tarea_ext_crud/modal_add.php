<?php require_once("conexion.php"); ?>
<div id="addProductModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form name="add_product" autocomplete="off" id="add_product">
				<div class="modal-header">
					<h4 class="modal-title">Agregar</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Cliente</label>

						<div class="autocompletar">
							<input type="text" name="tipo-mascota" id="tipo-mascota">
						</div>

					</div>
					<div class="form-group">
						<label>Productos</label>
						<select name="producto_add" id="producto_add" class="form-control" required>
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
						<input type="text" name="obs_add" id="obs_add" class="form-control">
					</div>
					<div class="form-group">
						<label>Fecha</label>
						<input type="date" name="fecha_add" id="fecha_add" class="form-control">
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