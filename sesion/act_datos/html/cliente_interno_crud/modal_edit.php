<?php  require_once ("conexion.php"); ?>
<div id="editProductModal" class="modal fade">
		<div class="modal-dialog" style="width: 80%;">
			<div class="modal-content">
				<form name="edit_product" id="edit_product" method="post">
					<div class="modal-header">						
						<h4 class="modal-title" id="titModal" >Editar</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">	
						<div class="form-row">
						  	<div class="form-group col-md-4">
								<label>Client ID</label>
								<input type="number" name="edit_id"  id="edit_id" class="form-control" required>
								<input type="hidden" name="edit_id2"  id="edit_id2" >
							</div>
						  	<div class="form-group col-md-4">
								<label>Nº de documento</label>
							<input type="number" name="nd_edit"  id="nd_edit" class="form-control" required >
							</div>
							<div class="form-group col-md-4">
								<label>Tipo de documento</label>
							<input type="text" name="tipo_doc_edit"  id="tipo_doc_edit" class="form-control"  >
							</div>
						</div>   
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Nombre/s </label>
								<input type="text" name="nombre_edit"  id="nombre_edit" class="form-control" required >
							</div>
							<div class="form-group col-md-6">
								<label>Apellidos</label>
								<input type="text" name="apellido_edit"  id="apellido_edit" class="form-control" required >
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>Sexo</label>
								<select name="sexo_edit" id="sexo_edit" class="form-control" required>
									<option value=""></option>
									<option value="Hombre">Hombre</option>
	  								<option value="Mujer">Mujer</option>
								</select>
							</div>
							<div class="form-group col-md-6">
								<label>Fecha de nacimineto</label>
								<input type="date" name="fecha_edit" id="fecha_edit" class="form-control" required >
							</div>	
						</div>   
						<div class="form-group">
							<input type="hidden" name="grado_edit"  id="grado_edit" class="form-control"  >
						</div>		
						<div class="form-group">
							<label>Escuela</label>
							<input type="text" name="escuela_edit"  id="escuela_edit" class="form-control"  >
						</div>			
						<div class="form-row">
							<div class="form-group col-md-7">
								<label>Barrio</label>
								<input type="text" name="barrio_edit"  id="barrio_edit" class="form-control"  >	
							</div>	
							<div class="form-group col-md-5">
								<label>Zona</label>
								<select name="zona_edit" id="zona_edit" class="form-control">
									<option value=""></option>
									<option value="Z1- Esc.Juan de Salazar">Z1- Esc.Juan de Salazar</option>
	  								<option value="Z2- 16 de Julio">Z2- 16 de Julio</option>
	  								<option value="Z3- Sueños del Pilar-Capilla">Z3- Sueños del Pilar-Capilla</option>
	  								<option value="Z4- El Bosque Centro Cuminitario">Z4- El Bosque Centro Cuminitario</option>
	  								<option value="Z5- Esc. Divino Niño-NE">Z5- Esc. Divino Niño-NE</option>
	  								<option value="Z6 - ICM Aguapey">Z6 - ICM Aguapey</option>
	  								<option value="Z7- USF Don Bosco">Z7- USF Don Bosco</option>
	  								<option value="Z8- Esc. San Vicente de Paul">Z8- Esc. San Vicente de Paul</option>
	  								<option value="Z9- Esc. Nuevo Amanecer">Z9- Esc. Nuevo Amanecer</option>
	  								<option value="Z10- Salado">Z10- Salado</option>
	  								<option value="Z11-Pabla Ferreira">Z11-Pabla Ferreira</option>
	  								<option value="Z12- Esc. San Roque-Red">Z12- Esc. San Roque-Red</option>
								</select>
							</div>	
						</div>	
						<h5 class="modal-title">Padres - Encargados</h4>						
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>1º Nombre</label>
								<input type="text" name="np1_edit"  id="np1_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>1º Parentezco</label>
								<input type="text" name="parent1_edit"  id="parent1_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>Nro 1º Contacto</label>
								<input type="number" name="c1_edit"  id="c1_edit" class="form-control"  >
							</div>
						</div>	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>2º Nombre</label>
								<input type="text" name="np2_edit"  id="np2_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>2º Parentezco</label>
								<input type="text" name="parent2_edit"  id="parent2_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>Nro 2º Contacto</label>
								<input type="number" name="c2_edit"  id="c2_edit" class="form-control"  >
							</div>
						</div>	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>3º Nombre</label>
								<input type="text" name="np3_edit"  id="np3_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>3º Parentezco</label>
								<input type="text" name="parent3_edit"  id="parent3_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>Nro 3º Contacto</label>
								<input type="number" name="c3_edit"  id="c3_edit" class="form-control"  >
							</div>
						</div>	
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>4º Nombre</label>
								<input type="text" name="np4_edit"  id="np4_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>4º Parentezco</label>
								<input type="text" name="parent4_edit"  id="parent4_edit" class="form-control"  >
							</div>	
							<div class="form-group col-md-3">
								<label>Nro 4º Contacto</label>
								<input type="number" name="c4_edit"  id="c4_edit" class="form-control"  >
							</div>
						</div>	
                        <div class="form-group">
							<label>Referencia doméstica</label>
							<input type="text" name="ref_dom_edit"  id="ref_dom_edit" class="form-control">
						</div>
						<div class="form-group">
							<label>Obs.</label>
							<input type="text" name="observacion_edit"  id="observacion_edit" class="form-control"  >
						</div>
                        <div class="form-group">
							<label>Año de inscripción</label>
							<input type="number" name="ins_edit"  id="ins_edit" class="form-control"  required>
						</div>
                        <div class="form-group">
							<label>Nº de programa</label>
							<input type="number" name="prog_edit"  id="prog_edit" class="form-control" required >
						</div>
						<div class="form-group">
							<label>CDF Fecha:</label>
							<input type="date" name="cdff_edit" id="cdff_edit" class="form-control"  >
						</div>	
						<div class="form-row">
	                        <div class="form-group col-md-6">
								<label>Altura (cm)</label>
								<input type="number" name="altura_edit" id="altura_edit" class="form-control" value=1 >
							</div>	
	                        <div class="form-group col-md-6">
								<label>Peso (Kg)</label>
								<input type="number" name="peso_edit" id="peso_edit" class="form-control" value=1 >
							</div>	
						</div>	
						<div class="form-group">
							<label>SLEV - Nivel escolar</label>
							<select name="slev_edit" id="slev_edit" class="form-control">
								<option value=""></option>
								<option value="1">Preescolar</option>
  								<option value="2">Jardín de Infantes</option>
  								<option value="3">Primaria</option>
  								<option value="4">Secundaria</option>
  								<option value="5">Universitaria</option>
  								<option value="6">API</option>
  								<option value="7">Estimulación Temprana</option>
  								<option value="8">Todavía no va a la escuela</option>
  								<option value="9">Entrenamiento Vocacional</option>							
							</select>	
						</div>	
						<div class="form-group">
							<label>SGRD - Grado/Curso</label>
							<select name="sgrd_edit" id="sgrd_edit" class="form-control">
								<option value=""></option>
								<option value="1">1ro</option>
								<option value="2">2do</option>
  								<option value="3">3er</option>
  								<option value="4">4to</option>
  								<option value="5">5to</option>
  								<option value="6">6to</option>
  								<option value="7">7mo</option>
  								<option value="8">8vo</option>
  								<option value="9">9no</option>
							</select>
						</div>	
						<div class="form-group">
							<label>FSUB - Materia favorita 1</label>
							<select name="fsub_edit" id="fsub_edit" class="form-control">
								<option value=""></option>
								<option value="1">Artes Plásticas</option>
								<option value="2">Computación/Informática</option>
								<option value="3">Communicación</option>
								<option value="4">Contar números</option>
								<option value="5">Dibujar</option>
								<option value="6">Inglés</option>
								<option value="7">Geografía</option>
								<option value="8">Salud</option>
								<option value="9">Historia</option>
								<option value="10">Escuchar cuentos</option>
								<option value="11">Guaraní</option>
								<option value="12">Matemáticas</option>
								<option value="13">Música</option>
								<option value="14">Ciencias Naturales</option>
								<option value="15">Recitados</option>
								<option value="16">Lectura del Abecedario</option>
								<option value="17">Ciencias</option>
								<option value="18">Estudios Sociales/ Vida Soc</option>
							</select>	
						</div>	

						<div class="form-group">
							<label>FSUB - Materia favorita 2</label>
							<select name="fsu2_edit" id="fsu2_edit" class="form-control">
								<option value=""></option>
								<option value="1">Artes Plásticas</option>
								<option value="2">Computación/Informática</option>
								<option value="3">Communicación</option>
								<option value="4">Contar números</option>
								<option value="5">Dibujar</option>
								<option value="6">Inglés</option>
								<option value="7">Geografía</option>
								<option value="8">Salud</option>
								<option value="9">Historia</option>
								<option value="10">Escuchar cuentos</option>
								<option value="11">Guaraní</option>
								<option value="12">Matemáticas</option>
								<option value="13">Música</option>
								<option value="14">Ciencias Naturales</option>
								<option value="15">Recitados</option>
								<option value="16">Lectura del Abecedario</option>
								<option value="17">Ciencias</option>
								<option value="18">Estudios Sociales/ Vida Soc</option>
							</select>
						</div>

						<div class="form-group">
							<label>EACT - Actividades extra curriculares</label>
							<select name="eact_edit" id="eact_edit" class="form-control">
								<option value=""></option>
								<option value="1">Va a clases de Apoyo Escolar</option>
								<option value="2">Catequesis/Grupo Religioso</option>
								<option value="3">Grupo de estudios</option>
								<option value="4">Equipo de danza</option>
								<option value="5">Forma parte de una organización de Derechos del Niño y de la Niña</option>
								<option value="6">Miembro de club ambientalista</option>
								<option value="7">Juega en un equipo de Fútbol</option>
							</select>
						</div>

						<div class="form-group">
							<label>RSCH - Responsabilidades en la escuela</label>
							<select name="rsch_edit" id="rsch_edit" class="form-control">
								<option value=""></option>
								<option value="1">Limpia y ordena el aula.</option>
								<option value="2">Limpia y ordena el patio.</option>
								<option value="3">Es el/la Delegado/a de su clase</option>
								<option value="4">Es líder de un grupo de estudios.</option>
								<option value="5">Es líder de un equipo deportivo</option>
							</select>
						</div>

						<div class="form-group">
							<label>SDST - Distancia a la escuela</label>
							<select name="sdst_edit" id="sdst_edit" class="form-control">
								<option value=""></option>
								<option value="1">0 - 50 metros</option>
								<option value="2">51 - 500 metros</option>
								<option value="3">501 metros - 1 kilometro</option>
								<option value="4">1.1 - 2 kilometros</option>
								<option value="5">2.1 - 5 kilometros</option>
								<option value="6">Más de 5 kilometros</option>
							</select>
						</div>

						<div class="form-group">
							<label>TRNS - Modo de transporte a la escuela</label>
							<select name="trns_edit" id="trns_edit" class="form-control">
								<option value=""></option>
								<option value="1">Le llevan con algún medio de transporte</option>
								<option value="2">Vive en el edificio de la escuela</option>
								<option value="3">En bicicleta</option>
								<option value="4">Ómnibus</option>
								<option value="5">Caminando</option>
							</select>
						</div>

						<div class="form-group">
							<label>HLTH - Salud (1)</label>
							<select name="hlth_edit" id="hlth_edit" class="form-control">
								<option value=""></option>
								<option value="1">Frecuentes dolores de cabeza</option>
								<option value="2">Frecuentes dolores de estómago</option>
								<option value="3">Discapacidad Cognitiva</option>
								<option value="4">Asma</option>
								<option value="5">Caries</option>
								<option value="6">Parálisis cerebral</option>
								<option value="7">Síndrome de Down</option>
								<option value="8">Epilepsia</option>
								<option value="9">Problemas respiratorios</option>
								<option value="10">Alergias al cambio de clima</option>
								<option value="11">Discapacidad auditiva</option>
								<option value="12">Está desnutrido</option>
								<option value="13">Discapacidad visual</option>
							</select>
						</div>
						<div class="form-group">
							<label>HLTH - Salud (2)</label>
							<select name="hlt2_edit" id="hlt2_edit" class="form-control">
								<option value=""></option>
								<option value="1">Frecuentes dolores de cabeza</option>
								<option value="2">Frecuentes dolores de estómago</option>
								<option value="3">Discapacidad Cognitiva</option>
								<option value="4">Asma</option>
								<option value="5">Caries</option>
								<option value="6">Parálisis cerebral</option>
								<option value="7">Síndrome de Down</option>
								<option value="8">Epilepsia</option>
								<option value="9">Problemas respiratorios</option>
								<option value="10">Alergias al cambio de clima</option>
								<option value="11">Discapacidad auditiva</option>
								<option value="12">Está desnutrido</option>
								<option value="13">Discapacidad visual</option>
							</select>
						</div>
						<div class="form-group">
							<label>HLTH - Salud (3)</label>
							<select name="hlt3_edit" id="hlt3_edit" class="form-control">
								<option value=""></option>
								<option value="1">Frecuentes dolores de cabeza</option>
								<option value="2">Frecuentes dolores de estómago</option>
								<option value="3">Discapacidad Cognitiva</option>
								<option value="4">Asma</option>
								<option value="5">Caries</option>
								<option value="6">Parálisis cerebral</option>
								<option value="7">Síndrome de Down</option>
								<option value="8">Epilepsia</option>
								<option value="9">Problemas respiratorios</option>
								<option value="10">Alergias al cambio de clima</option>
								<option value="11">Discapacidad auditiva</option>
								<option value="12">Está desnutrido</option>
								<option value="13">Discapacidad visual</option>
							</select>
						</div>

						<div class="form-group">
							<label>SPHN - Necesidad especial con respecto a salud</label>
							<select name="sphn_edit" id="sphn_edit" class="form-control">
								<option value=""></option>
								<option value="1">Requiere atención odontológica</option>
								<option value="2">Requiere atención médica</option>
								<option value="3">Necesita medicamentos muy costosos</option>
								<option value="4">Necesita anteojos</option>
								<option value="5">Requiere tratamiento médico constante</option>
							</select>
						</div>

						<div class="form-group">
							<label>CHRS - Responsabilidades del niño/a en el hogar</label>
								<select name="chrs_edit" id="chrs_edit" class="form-control">
								<option value=""></option>
								<option value="1">Cuida a niños/as</option>
								<option value="2">Acarrea madera</option>
								<option value="3">Acarrea agua</option>
								<option value="4">Ayuda en la granja/campo</option>
								<option value="5">Ayuda a preparar la comida</option>
								<option value="6">Ayuda con las tareas de la casa</option>
								<option value="7">Ordena sus juguetes</option>
								<option value="8">Hace mandados</option>
								<option value="9">Barre</option>
								<option value="10">Cuida a los animales</option>
								<option value="11">Riega las plantas</option>
								<option value="12">Limpia el patio</option>
							</select>
						</div>

						<div class="form-group">
							<label>CACT - Actividades del niño/a (1)</label>
							<select name="cact_edit" id="cact_edit" class="form-control">
								<option value=""></option>
								<option value="1">Dibujar y hacer manualidades</option>
								<option value="2">Jugar a las escondidas</option>
								<option value="3">Jugar al descanso-rayuela-cielo</option>
								<option value="4">Jugar juegos tradicionales</option>
								<option value="5">Hacer deportes</option>
								<option value="6">Jugar con su mascota</option>
								<option value="7">Jugar con latitas</option>
								<option value="8">Jugar con sus juguetes</option>
								<option value="9">Leer</option>
								<option value="10">Andar en bicicleta</option>
								<option value="11">Cantar y bailar</option>
								<option value="12">Saltar</option>
							</select>
						</div>


						<div class="form-group">
							<label>CACT - Actividades del niño/a (2)</label>
							<select name="cac2_edit" id="cac2_edit" class="form-control">
								<option value=""></option>
								<option value="1">Dibujar y hacer manualidades</option>
								<option value="2">Jugar a las escondidas</option>
								<option value="3">Jugar al descanso-rayuela-cielo</option>
								<option value="4">Jugar juegos tradicionales</option>
								<option value="5">Hacer deportes</option>
								<option value="6">Jugar con su mascota</option>
								<option value="7">Jugar con latitas</option>
								<option value="8">Jugar con sus juguetes</option>
								<option value="9">Leer</option>
								<option value="10">Andar en bicicleta</option>
								<option value="11">Cantar y bailar</option>
								<option value="12">Saltar</option>
							</select>
						</div>
						<div class="form-group">
							<label>WTOB - Quiere ser cuando sea grande</label>
							<select name="wtob_edit" id="wtob_edit" class="form-control">
								<option value=""></option>
								<option value="1">Actor/Actriz</option>
								<option value="2">Administrador/Administradora</option>
								<option value="3">Albañil</option>
								<option value="4">Ingeniera/Ingeniero Informático</option>
								<option value="5">Bailarín/Bailarina</option>
								<option value="6">Dentista</option>
								<option value="7">Doctor/Doctora</option>
								<option value="8">Todavía no sabe</option>
								<option value="9">Chofer</option>
								<option value="11">Ingeniero/Ingeniera</option>
								<option value="12">Empleado/Empleada de Fábrica</option>
								<option value="13">Agricultor/Agricultora</option>
								<option value="14">Azafata/Auxiliar de vuelo</option>
								<option value="15">Peluquera/Peluquero</option>
								<option value="16">Lavandera/Lavandero</option>
								<option value="17">Abogado/Abogada</option>
								<option value="18">Empleada Doméstica/Empleado </option>
								<option value="19">Doméstico</option>
								<option value="20">Obrero/Obrera</option>
								<option value="21">Mecánico/Mecánica</option>
								<option value="22">Enfermero/Enfermera</option>
								<option value="23">Piloto</option>
								<option value="24">Policía</option>
								<option value="25">Presidente</option>
								<option value="26">Jugador de Fútbol profesional</option>
								<option value="27">Líder Religioso (sacerdote/pastor)</option>
								<option value="28">Científico/Científica</option>
								<option value="29">Guardia de Seguridad</option>
								<option value="30">Cantante</option>
								<option value="31">Soldado - Militar</option>
								<option value="32">Modisto/a - Costurero/a</option>
								<option value="33">Maestro/Maesta</option>
								<option value="34">Veterinario/Veterinaria</option>
							</select>
						</div>
						<div class="form-group">
							<label>HOHH - Jefe de familia</label>
							<select name="hohh_edit" id="hohh_edit" class="form-control">
								<option value=""></option>
								<option value="1">Tía</option>
								<option value="2">Padre</option>
								<option value="3">Abuelo</option>
								<option value="4">Abuela</option>
								<option value="5">Tutor</option>
								<option value="6">Madre</option>
								<option value="7">Otro Pariente</option>
								<option value="8">Hermano/a</option>
								<option value="9">Padrastro</option>
								<option value="10">Madrastra</option>
								<option value="11">Tío</option>
							</select>
						</div>

						<div class="form-group">
							<label>LWTH - Vive con:</label>
							<select name="lwth_edit" id="lwth_edit" class="form-control">
								<option value=""></option>
								<option value="1">El padre</option>
								<option value="2">El padre y la madrastra</option>
								<option value="3">La madre</option>
								<option value="4">La madre y el padre</option>
								<option value="5">La madre y el padrastro</option>
							</select>
						</div>
						<div class="form-row">
	                        <div class="form-group col-md-4">
								<label>TBRO - Cantidad de hermanos</label>
								<input type="number" name="tbro_edit"  id="tbro_edit" class="form-control" value="0" >
							</div>
	                        <div class="form-group col-md-4">
								<label>TSIS - Cantidad de hermanas</label>
								<input type="number" name="tsis_edit"  id="tsis_edit" class="form-control" value="0"  >
							</div>
	                        <div class="form-group col-md-4">
								<label>TOTH - Cantidad Total de otros miembros</label>
								<input type="number" name="toth_edit"  id="toth_edit" class="form-control" value="0" >
							</div>
						</div>
						<div class="form-group">
							<label>FOCC - Ocupación del padre</label>
							<select name="focc_edit" id="focc_edit" class="form-control">
								<option value=""></option>
								<option value="1">Prestador de Servicios</option>
								<option value="2">Trabaja para el Gobierno</option>
								<option value="3">Empleado</option>
								<option value="4">Jubilado (o recibe subsidio)</option>
								<option value="5">Líder Religiosa (sacerdote, pastor)</option>
								<option value="6">Trabaja por temporadas de acuerdo a las estaciones del año</option>
								<option value="7">Trabaja por cuenta propia</option>
								<option value="8">Agricultor (En su propia granja)</option>
								<option value="9">Tiene un oficio</option>
								<option value="10">Sin empleo</option>
							</select>
						</div>
						<div class="form-group">
							<label>MOCC - Ocupación de la madre</label>
							<select name="mocc_edit" id="mocc_edit" class="form-control">
								<option value=""></option>
								<option value="1">Prestador de Servicios</option>
								<option value="2">Trabaja para el Gobierno</option>
								<option value="3">Con empleo</option>
								<option value="4">Jubilada (o recibe subsidio)</option>
								<option value="5">Líder Religioso (sacerdote, pastor)</option>
								<option value="6">Trabaja por temporadas de acuerdo a las estaciones del año</option>
								<option value="7">Trabaja por cuenta propia</option>
								<option value="8">Agricultora (En su propia granja)</option>
								<option value="9">Tiene un oficio</option>
								<option value="10">Sin empleo</option>
							</select>
						</div>
						<div class="form-group">
							<label>MNAH - Razón por la cual la madre no vive con la familia</label>
							<select name="mnah_edit" id="mnah_edit" class="form-control">
								<option value=""></option>
								<option value="1">La madre abandonó a la familia</option>
								<option value="2">La madre falleció.</option>
								<option value="3">La madre está enferma.</option>
								<option value="4">La madre trabaja en otra comunidad y ayuda a mantener a la familia</option>
								<option value="5">La madre trabaja en otro país y ayuda a mantener a la familia</option>
								<option value="6">Los padres están separados/ divorciados</option>
							</select>
						</div>
						<div class="form-group">
							<label>FNAH - Razón por la cual el padre no vive con la familia</label>
							<select name="fnah_edit" id="fnah_edit" class="form-control">
								<option value=""></option>
								<option value="1">El padre abandonó a la familia</option>
								<option value="2">El padre falleció.</option>
								<option value="3">El padre está enfermo.</option>
								<option value="4">El padre trabaja en otra comunidad y ayuda a mantener a la familia</option>
								<option value="5">El padre trabaja en otro país y ayuda a mantener a la familia</option>
								<option value="6">Los padres están separados/divorciados</option>
							</select>
						</div>
						<div class="form-group">
							<label>GOCC - Ocupación del tutor</label>
							<select name="gocc_edit" id="gocc_edit" class="form-control">
								<option value=""></option>
								<option value="1">Prestador de Servicios</option>
								<option value="2">Trabaja para el Gobierno</option>
								<option value="3">Con Empleo</option>
								<option value="4">Jubilado/Jubilada (o recibe subsidio)</option>
								<option value="5">Líder Religioso (sacerdote, pastor)</option>
								<option value="6">Trabaja por temporadas de acuerdo a las estaciones del año</option>
								<option value="7">Trabaja por cuenta propia</option>
								<option value="8">Agricultor (En su propia granja)</option>
								<option value="9">Tiene un oficio</option>
								<option value="10">Sin empleo</option>
							</select>
						</div>
						<div class="form-group">
							<label>RELG - Religión</label>
							<select name="relg_edit" id="relg_edit" class="form-control">
								<option value=""></option>
								<option value="1">Católica</option>
								<option value="2">Cristiana</option>
								<option value="3">Evangélica</option>
								<option value="4">Testigos de Jehová</option>
								<option value="5">Judía</option>
								<option value="6">Mormones</option>
								<option value="7">Cristiana Ortodoxa</option>
								<option value="8">Protestante</option>
								<option value="9">Adventistas del 7mo Día</option>
								<option value="10">Otra religión</option>
							</select>
						</div>
                        <div class="form-group">
							<label>Otra religión</label>
							<input type="text" name="othrelg_edit"  id="othrelg_edit" class="form-control">							
						</div>

						<div class="form-group">
							<label>LANG - Idioma (1)</label>
							<select name="lang_edit" id="lang_edit" class="form-control">
								<option value=""></option>
								<option value="1">Inglés</option>
								<option value="2">Español</option>
								<option value="3">Guaraní</option>
							</select>
						</div>
						<div class="form-group">
							<label>LANG - Idioma (2)</label>
							<select name="lan2_edit" id="lan2_edit" class="form-control">
								<option value=""></option>
								<option value="1">Inglés</option>
								<option value="2">Español</option>
								<option value="3">Guaraní</option>
							</select>
						</div>
						<div class="form-group">
							<label>HOUSE - Tipo de Casa</label>
							<select name="hous_edit" id="hous_edit" class="form-control">
								<option value=""></option>
								<option value="1">Casa proveída por el gobierno (no es alquilada)</option>
								<option value="2">Choza</option>
								<option value="3">Casa alquilada</option>
								<option value="4">Casa de una sola pieza</option>
								<option value="5">Casa en condiciones precarias</option>
							</select>
						</div>
						<div class="form-group">
							<label>LATR - Tiene letrina</label>
							<select name="latr_edit" id="latr_edit" class="form-control">
								<option value=""></option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>
						<div class="form-group">
							<label>LATD - Distancia a la letrina</label>
							<select name="latd_edit" id="latd_edit" class="form-control">
								<option value=""></option>
								<option value="1">0 - 50 metros</option>
								<option value="2">51 - 500 metros</option>
								<option value="3">501 metros - 1 kilómetro</option>
								<option value="4">1,1 kilómetros - 2 kilómetros</option>
								<option value="5">2,1 kilómetros - 5 kilómetros</option>
								<option value="6">Más de 5 kilómetros</option>
							</select>
						</div>
						<div class="form-group">
							<label>FPWC - Fuente principal de agua de la familia</label>
							<select name="fpwc_edit" id="fpwc_edit" class="form-control">
								<option value=""></option>
								<option value="1">Bomba de agua</option>
								<option value="2">Compra agua de compañías privadas</option>
								<option value="3">Agua proveída por la comunidad</option>
								<option value="4">Represa</option>
								<option value="5">Agua corriente proveída por empresa del gobierno (ESSAP)</option>
								<option value="6">Lago</option>
								<option value="7">Agua proveída de forma gratuita por lamunicipalidad</option>
								<option value="8">Tanque de agua parcialmente purificada</option>
								<option value="9">Agua no purificada de manantial</option>
								<option value="10">Arroyo/Río</option>
								<option value="11">Pozo</option>
							</select>
						</div>
						<div class="form-group">
							<label>WDWS - Distancia a la fuente de agua</label>
							<select name="wdws_edit" id="wdws_edit" class="form-control">
								<option value=""></option>
								<option value="1">0 - 50 metros</option>
								<option value="2">51 - 500 metros</option>
								<option value="3">501 metros - 1 kilómetro</option>
								<option value="4">1,1 kilómetros - 2 kilómetros</option>
								<option value="5">2,1 kilómetros - 5 kilómetros</option>
								<option value="6">Más de 5 kilómetros</option>
								<option value="7">Agua disponible en la casa</option>
							</select>
						</div>
						<div class="form-group">
							<label>COMH - Problemas de salud en la Comunidad</label>
							<select name="comh_edit" id="comh_edit" class="form-control">
								<option value=""></option>
								<option value="1">Cólera</option>
								<option value="2">Dengue</option>
								<option value="3">VIH/Sida</option>
								<option value="4">VIH/Sida, tuberculosis, fiebre </option>
								<option value="5">tifoidea, fiebre tifus</option>
								<option value="6">Enfermedades causadas por contaminación ambiental</option>
								<option value="7">Falta de estructuras médicas y/o de medicamentos</option>
								<option value="8">Malaria</option>
								<option value="9">Desnutrición</option>
								<option value="10">Infecciones parasitarias</option>
								<option value="11">Enfermedades respiratorias</option>
								<option value="12">Infecciones en la piel</option>
								<option value="13">Enfermedades del estómago</option>
								<option value="14">Tuberculosis</option>
								<option value="15">Enfermedades relacionadas con el agua</option>
							</select>
						</div>
						<div class="form-group">
							<label>ORPH - ¿Es el niño o la niña huérfano o huérfana?</label>
							<select name="orph_edit" id="orph_edit" class="form-control">
								<option value=""></option>
								<option value="1">Sí</option>
								<option value="2">No</option>
							</select>
						</div>


						<div class="form-group">
							<label>BEN - Beneficios que recibe el niño/a (1)</label>
							<select name="ben1_edit" id="ben1_edit" class="form-control">
								<option value=""></option>
								<option value="1">Construcción de aulas; ampliaciones,reparaciones</option>
								<option value="2">Talleres de higiene personal y de salud preventiva</option>
								<option value="3">Guardería apoyada por el Programa</option>
								<option value="4">Espacios de Aprendizaje (API, talleres, manualidades, etc)</option>
								<option value="5">Programa de Nutrición</option>
								<option value="6">Organización de Niños y Niñas que participan en decisiones comunitarias</option>
								<option value="7">Calificaciones mejoradas, pasa de grado</option>
								<option value="8">Atención médica básica</option>
								<option value="9">Mejora asistencia escolar / Buena </option>
								<option value="10">Asistencia Escolar</option>
								<option value="11">Letrina construida en la escuela</option>
								<option value="12">Almuerzo escolar</option>
								<option value="13">Merienda escolar; Vaso de Leche</option>
								<option value="14">Acceso a agua potable en la escuela</option>
								<option value="15">Recibe Kit con elementos de higiene personal</option>
								<option value="16">Seguimiento a un tratamiento médico</option>
								<option value="17">Útiles escolares y uniformes / Beca Escolar</option>
								<option value="18">Clases de apoyo escolar</option>
								<option value="19">Reducción del nº de niños y niñas por maestros en cada aula.</option>
								<option value="20">Talleres de formación para maestros</option>
							</select>
						</div>
						<div class="form-group">
							<label>BEN - Beneficios que recibe el niño/a (2)</label>
							<select name="ben2_edit" id="ben2_edit" class="form-control">
								<option value=""></option>
								<option value="1">Construcción de aulas; ampliaciones,reparaciones</option>
								<option value="2">Talleres de higiene personal y de salud preventiva</option>
								<option value="3">Guardería apoyada por el Programa</option>
								<option value="4">Espacios de Aprendizaje (API, talleres, manualidades, etc)</option>
								<option value="5">Programa de Nutrición</option>
								<option value="6">Organización de Niños y Niñas que participan en decisiones comunitarias</option>
								<option value="7">Calificaciones mejoradas, pasa de grado</option>
								<option value="8">Atención médica básica</option>
								<option value="9">Mejora asistencia escolar / Buena </option>
								<option value="10">Asistencia Escolar</option>
								<option value="11">Letrina construida en la escuela</option>
								<option value="12">Almuerzo escolar</option>
								<option value="13">Merienda escolar; Vaso de Leche</option>
								<option value="14">Acceso a agua potable en la escuela</option>
								<option value="15">Recibe Kit con elementos de higiene personal</option>
								<option value="16">Seguimiento a un tratamiento médico</option>
								<option value="17">Útiles escolares y uniformes / Beca Escolar</option>
								<option value="18">Clases de apoyo escolar</option>
								<option value="19">Reducción del nº de niños y niñas por maestros en cada aula.</option>
								<option value="20">Talleres de formación para maestros</option>
							</select>
						</div>
						<div class="form-group">
							<label>BEN - Beneficios que recibe el niño/a (3)</label>
							<select name="ben3_edit" id="ben3_edit" class="form-control">
								<option value=""></option>
								<option value="1">Construcción de aulas; ampliaciones,reparaciones</option>
								<option value="2">Talleres de higiene personal y de salud preventiva</option>
								<option value="3">Guardería apoyada por el Programa</option>
								<option value="4">Espacios de Aprendizaje (API, talleres, manualidades, etc)</option>
								<option value="5">Programa de Nutrición</option>
								<option value="6">Organización de Niños y Niñas que participan en decisiones comunitarias</option>
								<option value="7">Calificaciones mejoradas, pasa de grado</option>
								<option value="8">Atención médica básica</option>
								<option value="9">Mejora asistencia escolar / Buena </option>
								<option value="10">Asistencia Escolar</option>
								<option value="11">Letrina construida en la escuela</option>
								<option value="12">Almuerzo escolar</option>
								<option value="13">Merienda escolar; Vaso de Leche</option>
								<option value="14">Acceso a agua potable en la escuela</option>
								<option value="15">Recibe Kit con elementos de higiene personal</option>
								<option value="16">Seguimiento a un tratamiento médico</option>
								<option value="17">Útiles escolares y uniformes / Beca Escolar</option>
								<option value="18">Clases de apoyo escolar</option>
								<option value="19">Reducción del nº de niños y niñas por maestros en cada aula.</option>
								<option value="20">Talleres de formación para maestros</option>
							</select>
						</div>


						<div class="form-group">
							<label>FAMB - Beneficios que recibe la familia (1)</label>
							<select name="famb_edit" id="famb_edit" class="form-control">
								<option value=""></option>
								<option value="1">Acceso a un comedor comunitarioseguro y limpio</option>
								<option value="2">Talleres de higiene personal y de salud preventiva</option>
								<option value="3">Letrina comunitaria construida cerca de la casa</option>
								<option value="4">Agua potable comunitaria cerca de la casa</option>
								<option value="5">Miembro de la familia es parte de un grupo que trabaja por la comunidad (Ej: Comité de Padres)</option>
								<option value="6">Capacitación en oficios</option>
								<option value="7">Apoyo a algún miembro de la familia a buscar trabajo</option>
								<option value="8">Reparaciones en la casa apoyadas por el programa</option>
								<option value="9">Letrina construida en la casa</option>
								<option value="10">Incremento del ingreso familiar gracias a la participación en micro-emprendimientos.</option>
								<option value="11">Visita de un doctor a la comunidad</option>
								<option value="12">Apoyo en Micro emprendimientos</option>
								<option value="13">Capacitación a la familia para micro- emprendimientos</option>
								<option value="14">Acceso a una guardería</option>
							</select>
						</div>

						<div class="form-group">
							<label>FAMB - Beneficios que recibe la familia (2)</label>
							<select name="fam2_edit" id="fam2_edit" class="form-control">
								<option value=""></option>
								<option value="1">Acceso a un comedor comunitarioseguro y limpio</option>
								<option value="2">Talleres de higiene personal y de salud preventiva</option>
								<option value="3">Letrina comunitaria construida cerca de la casa</option>
								<option value="4">Agua potable comunitaria cerca de la casa</option>
								<option value="5">Miembro de la familia es parte de un grupo que trabaja por la comunidad (Ej: Comité de Padres)</option>
								<option value="6">Capacitación en oficios</option>
								<option value="7">Apoyo a algún miembro de la familia a buscar trabajo</option>
								<option value="8">Reparaciones en la casa apoyadas por el programa</option>
								<option value="9">Letrina construida en la casa</option>
								<option value="10">Incremento del ingreso familiar gracias a la participación en micro-emprendimientos.</option>
								<option value="11">Visita de un doctor a la comunidad</option>
								<option value="12">Apoyo en Micro emprendimientos</option>
								<option value="13">Capacitación a la familia para micro- emprendimientos</option>
								<option value="14">Acceso a una guardería</option>
							</select>
						</div>
						<div class="form-group">
							<label>OTH-Otros (Información adicional del niño o la niña </label>
							<input type="text" name="oth_edit"  id="oth_edit" class="form-control" >							
						</div>
						<div class="form-group">
							<label>Nombre de la persona que completó el formulario:.</label>
							<input type="text" name="informante_edit"  id="informante_edit" class="form-control"  >
						</div>

						<div class="form-group">
							<label>Relacion con el niño</label>
							<input type="text" name="relinf_edit"  id="relinf_edit" class="form-control"  >
						</div>
						<div class="form-group">
							<label>Fecha de entrevista</label>
							<input type="date" name="fechaen_edit" id="fechaen_edit" class="form-control"  >
						</div>
     
				        <div class="form-group">
							     <input type="button" value="Traer localización" onclick="getLocation()"><input type="text" name="positiontext_edit" id="positiontext" class="form-control">
				        	  <div id="map" style="position: relative;overflow: hidden;width: 100%;height: 300px; display: none;">
				        	  	
				        	  </div>

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