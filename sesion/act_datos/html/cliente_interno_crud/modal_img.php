<?php  require_once ("conexion.php"); ?>
<div id="imgModal" class="modal fade">
		<div class="modal-dialog" style="width: 80%;">
			<div class="modal-content">
				<form name="imgup" id="imgup"  method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title" id="imgModal" >Adjuntar imagen</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
								<div class="form-group">
		            					<label>Adjuntar Captura Frente de Ci del Niño</label>
							            <div class="input-group">
							                <span class="input-group-btn">
							                    <span class="btn btn-default btn-file">
							                        Elegir...   <input type="file" name="fileToUpload" id="fileToUpload">

							                    </span>

							                </span>
											      <input type="text" class="form-control" readonly>
								            </div>
								            <img id='img-upload1'/>
							
		            					<label>Adjuntar Captura Atras de Ci del Niño</label>
							            <div class="input-group">
							                <span class="input-group-btn">
							                    <span class="btn btn-default btn-file">
							                        Elegir...   <input type="file" name="fileToUpload2" id="fileToUpload2">

							                    </span>

							                </span>
											      <input type="text" class="form-control" readonly>
								            </div>
								            <img id='img-upload2'/>

		            					<label>Adjuntar Foto del Niño</label>
							            <div class="input-group">
							                <span class="input-group-btn">
							                    <span class="btn btn-default btn-file">
							                        Elegir...   <input type="file" name="fileToUpload3" id="fileToUpload3">

							                    </span>

							                </span>
											      <input type="text" class="form-control" readonly>
								            </div>
								            <img id='img-upload3'/>	   
					        	</div>
					        	</div>
					<div class="modal-footer">
						<input type="submit" class="btn btn-info" value="Subir Imagenes" id="subirimg">
					</div>
				</form>   
			</div>
		</div>
</div>