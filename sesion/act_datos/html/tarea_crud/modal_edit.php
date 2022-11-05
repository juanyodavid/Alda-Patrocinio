	<?php  require_once ("conexion.php"); ?>

	<div id="editProductModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form name="edit_product" id="edit_product">
					<div class="modal-header">						
						<h4 class="modal-title">Asignar facilitador</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
							<div class="form-group">
						
								<input type="hidden" name="id2" id="id2" class="form-control" value="">
								<input type="hidden" name="idm" id="idm" class="form-control" value="">
							</div>
                      		<div class="form-group">
								<label>Fecha de pedido</label>
								<input type="date" name="fecha_ped_edit"  id="fecha_ped_edit" class="form-control" placeholder="" >		
							</div>
						
                        <div class="form-group">
							<label>Facilitador</label>
							<select name="facilitador_edit"  id="facilitador_edit" class="form-control" required>
        						<?php
        				         $query2 =mysqli_query($con,"SELECT * FROM facilitador");
         						 while ($valores = mysqli_fetch_array($query2)) {
         						 	if ($valores['obs']=='secundario' and $valores['estado']==1) {// puse si es secundario y el estado es activo(1)
         						 	
          							echo '<option value="'.$valores[id_facilitador].'">'.$valores[id_facilitador].' - '.$valores[nombre_apellido].' - '.$valores[celular].'</option>';
          						}}
          						?>
      						</select>				
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
	