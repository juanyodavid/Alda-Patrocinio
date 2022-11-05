<!-- <?php // require_once ("conexion.php"); ?> -->
<div id="changePass" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="add_product" id="add_product">
					<div class="modal-header">						
						<h4 class="modal-title">Cambiar contraseña</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<!-- <div class="form-group">
							<label>Contraseña anterior</label>
							<input type="password" name="prev_pass"  id="prev_pass" class="form-control" required>
							
						</div> -->
                       
						 <div class="form-group">
							<label>Nueva contraseña</label>
							<input type="password" name="new_pass"  id="new_pass" class="form-control" required>
                    
						</div>
                        <div class="form-group">
							<label>Confirmar contraseña</label>
							<input type="password" name="new_pass_conf"  id="new_pass_conf" class="form-control" required>
						</div>
                        		
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Guardar">
					</div>
				</form>
			</div>
		</div>
	</div>