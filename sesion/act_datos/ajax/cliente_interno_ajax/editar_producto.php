<?php 

//para subir datos

	if (empty($_POST['edit_id'])){
		$errors[] = "ID está vacío.";
	} elseif (!empty($_POST['edit_id'])){

	require_once ("../../conexion.php");//Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) 
	$id = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id"],ENT_QUOTES)));
	$ide = mysqli_real_escape_string($con,(strip_tags($_POST["edit_id2"],ENT_QUOTES)));

    $nombre = mysqli_real_escape_string($con,(strip_tags($_POST["nombre_edit"],ENT_QUOTES)));
    $apellido = mysqli_real_escape_string($con,(strip_tags($_POST["apellido_edit"],ENT_QUOTES)));
	$nd = mysqli_real_escape_string($con,(strip_tags($_POST["nd_edit"],ENT_QUOTES)));
	$sexo = mysqli_real_escape_string($con,(strip_tags($_POST["sexo_edit"],ENT_QUOTES)));
	$tipo_doc = mysqli_real_escape_string($con,(strip_tags($_POST["tipo_doc_edit"],ENT_QUOTES)));
	$fecha = mysqli_real_escape_string($con,(strip_tags($_POST["fecha_edit"],ENT_QUOTES)));
	$zona = mysqli_real_escape_string($con,(strip_tags($_POST["zona_edit"],ENT_QUOTES)));

	$grado = mysqli_real_escape_string($con,(strip_tags($_POST["grado_edit"],ENT_QUOTES)));
	$escuela = mysqli_real_escape_string($con,(strip_tags($_POST["escuela_edit"],ENT_QUOTES)));
	$barrio = mysqli_real_escape_string($con,(strip_tags($_POST["barrio_edit"],ENT_QUOTES)));
	$np1 = mysqli_real_escape_string($con,(strip_tags($_POST["np1_edit"],ENT_QUOTES)));
	$c1 = mysqli_real_escape_string($con,(strip_tags($_POST["c1_edit"],ENT_QUOTES)));
	$np2 = mysqli_real_escape_string($con,(strip_tags($_POST["np2_edit"],ENT_QUOTES)));
	$c2 = mysqli_real_escape_string($con,(strip_tags($_POST["c2_edit"],ENT_QUOTES)));
	$np3 = mysqli_real_escape_string($con,(strip_tags($_POST["np3_edit"],ENT_QUOTES)));
	$c3 = mysqli_real_escape_string($con,(strip_tags($_POST["c3_edit"],ENT_QUOTES)));
	$np4 = mysqli_real_escape_string($con,(strip_tags($_POST["np4_edit"],ENT_QUOTES)));
	$c4 = mysqli_real_escape_string($con,(strip_tags($_POST["c4_edit"],ENT_QUOTES)));
$parent1 = mysqli_real_escape_string($con,(strip_tags($_POST["parent1_edit"],ENT_QUOTES)));
$parent2 = mysqli_real_escape_string($con,(strip_tags($_POST["parent2_edit"],ENT_QUOTES)));
$parent3 = mysqli_real_escape_string($con,(strip_tags($_POST["parent3_edit"],ENT_QUOTES)));
$parent4 = mysqli_real_escape_string($con,(strip_tags($_POST["parent4_edit"],ENT_QUOTES)));

	$ref = mysqli_real_escape_string($con,(strip_tags($_POST["ref_dom_edit"],ENT_QUOTES)));
	$observacion = mysqli_real_escape_string($con,(strip_tags($_POST["observacion_edit"],ENT_QUOTES)));
	$ins = mysqli_real_escape_string($con,(strip_tags($_POST["ins_edit"],ENT_QUOTES)));
	$prog = mysqli_real_escape_string($con,(strip_tags($_POST["prog_edit"],ENT_QUOTES)));
	

$cdff = mysqli_real_escape_string($con,(strip_tags($_POST["cdff_edit"],ENT_QUOTES)));
$altura = mysqli_real_escape_string($con,(strip_tags($_POST["altura_edit"],ENT_QUOTES)));
$peso = mysqli_real_escape_string($con,(strip_tags($_POST["peso_edit"],ENT_QUOTES)));
$slev = mysqli_real_escape_string($con,(strip_tags($_POST["slev_edit"],ENT_QUOTES)));
$sgrd = mysqli_real_escape_string($con,(strip_tags($_POST["sgrd_edit"],ENT_QUOTES)));
$fsub = mysqli_real_escape_string($con,(strip_tags($_POST["fsub_edit"],ENT_QUOTES)));
$fsu2 = mysqli_real_escape_string($con,(strip_tags($_POST["fsu2_edit"],ENT_QUOTES)));
$eact = mysqli_real_escape_string($con,(strip_tags($_POST["eact_edit"],ENT_QUOTES)));
$rsch = mysqli_real_escape_string($con,(strip_tags($_POST["rsch_edit"],ENT_QUOTES)));
$sdst = mysqli_real_escape_string($con,(strip_tags($_POST["sdst_edit"],ENT_QUOTES)));
$trns = mysqli_real_escape_string($con,(strip_tags($_POST["trns_edit"],ENT_QUOTES)));
$hlth = mysqli_real_escape_string($con,(strip_tags($_POST["hlth_edit"],ENT_QUOTES)));
$hlt2 = mysqli_real_escape_string($con,(strip_tags($_POST["hlt2_edit"],ENT_QUOTES)));
$hlt3 = mysqli_real_escape_string($con,(strip_tags($_POST["hlt3_edit"],ENT_QUOTES)));
$sphn = mysqli_real_escape_string($con,(strip_tags($_POST["sphn_edit"],ENT_QUOTES)));
$chrs = mysqli_real_escape_string($con,(strip_tags($_POST["chrs_edit"],ENT_QUOTES)));
$cact = mysqli_real_escape_string($con,(strip_tags($_POST["cact_edit"],ENT_QUOTES)));
$cac2 = mysqli_real_escape_string($con,(strip_tags($_POST["cac2_edit"],ENT_QUOTES)));
$wtob = mysqli_real_escape_string($con,(strip_tags($_POST["wtob_edit"],ENT_QUOTES)));
$hohh = mysqli_real_escape_string($con,(strip_tags($_POST["hohh_edit"],ENT_QUOTES)));
$lwth = mysqli_real_escape_string($con,(strip_tags($_POST["lwth_edit"],ENT_QUOTES)));
$tbro = mysqli_real_escape_string($con,(strip_tags($_POST["tbro_edit"],ENT_QUOTES)));
$tsis = mysqli_real_escape_string($con,(strip_tags($_POST["tsis_edit"],ENT_QUOTES)));
$toth = mysqli_real_escape_string($con,(strip_tags($_POST["toth_edit"],ENT_QUOTES)));
$focc = mysqli_real_escape_string($con,(strip_tags($_POST["focc_edit"],ENT_QUOTES)));
$mocc = mysqli_real_escape_string($con,(strip_tags($_POST["mocc_edit"],ENT_QUOTES)));
$mnah = mysqli_real_escape_string($con,(strip_tags($_POST["mnah_edit"],ENT_QUOTES)));
$fnah = mysqli_real_escape_string($con,(strip_tags($_POST["fnah_edit"],ENT_QUOTES)));
$gocc = mysqli_real_escape_string($con,(strip_tags($_POST["gocc_edit"],ENT_QUOTES)));
$relg = mysqli_real_escape_string($con,(strip_tags($_POST["relg_edit"],ENT_QUOTES)));
$othrelg = mysqli_real_escape_string($con,(strip_tags($_POST["othrelg_edit"],ENT_QUOTES)));
$lang = mysqli_real_escape_string($con,(strip_tags($_POST["lang_edit"],ENT_QUOTES)));
$lan2 = mysqli_real_escape_string($con,(strip_tags($_POST["lan2_edit"],ENT_QUOTES)));
$hous = mysqli_real_escape_string($con,(strip_tags($_POST["hous_edit"],ENT_QUOTES)));
$latr = mysqli_real_escape_string($con,(strip_tags($_POST["latr_edit"],ENT_QUOTES)));
$latd = mysqli_real_escape_string($con,(strip_tags($_POST["latd_edit"],ENT_QUOTES)));
$fpwc = mysqli_real_escape_string($con,(strip_tags($_POST["fpwc_edit"],ENT_QUOTES)));
$wdws = mysqli_real_escape_string($con,(strip_tags($_POST["wdws_edit"],ENT_QUOTES)));
$comh = mysqli_real_escape_string($con,(strip_tags($_POST["comh_edit"],ENT_QUOTES)));
$orph = mysqli_real_escape_string($con,(strip_tags($_POST["orph_edit"],ENT_QUOTES)));
$ben1 = mysqli_real_escape_string($con,(strip_tags($_POST["ben1_edit"],ENT_QUOTES)));
$ben2 = mysqli_real_escape_string($con,(strip_tags($_POST["ben2_edit"],ENT_QUOTES)));
$ben3 = mysqli_real_escape_string($con,(strip_tags($_POST["ben3_edit"],ENT_QUOTES)));
$famb = mysqli_real_escape_string($con,(strip_tags($_POST["famb_edit"],ENT_QUOTES)));
$fam2 = mysqli_real_escape_string($con,(strip_tags($_POST["fam2_edit"],ENT_QUOTES)));
$oth = mysqli_real_escape_string($con,(strip_tags($_POST["oth_edit"],ENT_QUOTES)));
$informante = mysqli_real_escape_string($con,(strip_tags($_POST["informante_edit"],ENT_QUOTES)));
$relinf = mysqli_real_escape_string($con,(strip_tags($_POST["relinf_edit"],ENT_QUOTES)));
$fechaen = mysqli_real_escape_string($con,(strip_tags($_POST["fechaen_edit"],ENT_QUOTES)));
$positiontext = mysqli_real_escape_string($con,(strip_tags($_POST["positiontext_edit"],ENT_QUOTES)));

	// UPDATE data into database
    
    $sql = "UPDATE beneficiario_interno SET 
	CLIENT_ID='".$id."',nomap='".$nombre."',apellido='".$apellido."',docn='".$nd."',sexo='".$sexo."',fecnac='".$fecha."',tipodoc='".$tipo_doc."',grado='".$grado."',escuela='".$escuela."',barrio='".$barrio."',
	contacto1='".$c1."',nombre_paren1='".$np1."',contacto2='".$c2."',nombre_paren2='".$np2."',contacto3='".$c3."',nombre_paren3='".$np3."',contacto4='".$c4."',nombre_paren4='".$np4."',
parent1='".$parent1."',
parent2='".$parent2."',
parent3='".$parent3."',
parent4='".$parent4."',

	referdom='".$ref."',
	obs='".$observacion."',
	insc='".$ins."',
	programa='".$prog."',
	cdff='".$cdff."',
altura='".$altura."',
peso='".$peso."',
slev='".$slev."',
sgrd='".$sgrd."',
fsub='".$fsub."',
fsu2='".$fsu2."',
eact='".$eact."',
rsch='".$rsch."',
sdst='".$sdst."',
trns='".$trns."',
hlth='".$hlth."',
hlt2='".$hlt2."',
hlt3='".$hlt3."',
sphn='".$sphn."',
chrs='".$chrs."',
cact='".$cact."',
cac2='".$cac2."',
wtob='".$wtob."',
hohh='".$hohh."',
lwth='".$lwth."',
tbro='".$tbro."',
tsis='".$tsis."',
toth='".$toth."',
focc='".$focc."',
mocc='".$mocc."',
mnah='".$mnah."',
fnah='".$fnah."',
gocc='".$gocc."',
relg='".$relg."',
othrelg='".$othrelg."',
lang='".$lang."',
lan2='".$lan2."',
hous='".$hous."',
latr='".$latr."',
latd='".$latd."',
fpwc='".$fpwc."',
wdws='".$wdws."',
comh='".$comh."',
orph='".$orph."',
ben1='".$ben1."',
ben2='".$ben2."',
ben3='".$ben3."',
famb='".$famb."',
fam2='".$fam2."',
oth='".$oth."',
informante='".$informante."',
relinf='".$relinf."',
fechaen='".$fechaen."',
positiontext='".$positiontext."',
	zona='".$zona."' WHERE CLIENT_ID='".$ide."' ";


	$query = mysqli_query($con,$sql);


    // if product has been added successfully
    if ($query) {
        $messages[] = "Modificado exitosamente exitosa.";
    } else {
        $errors[] = "Falla al tratar de Modificar datos". $sql;
    }
		
	
if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>Concretada.</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}
?>