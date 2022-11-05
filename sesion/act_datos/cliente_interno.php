<?php session_start();
    if(isset($_SESSION['nombre'])){
    }else{
        header ('location: login.php');
    }  
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALDA: Beneficiarios</title>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe17AZ89UYDzhG4ZiVwpw68J5XOtIv-pw&callback=initMap&libraries=&v=weekly" defer ></script>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../../web/bootstrap.min.css">
<script src="../../web/jquery.min.js"></script>
<script src="../../web/bootstrap.min.js"></script>
<script src="js/action.js"></script>
<link rel="stylesheet" href="css/custom.css"><!-- hasta aca carga las librerias -->
<link rel="stylesheet" href="css/style.css"><!-- hasta aca carga las librerias -->
</head>
<body>
    <div class="container" style="width: 100%;">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2><b>Lista de beneficiarios INTERNA</b></h2>
					</div>
					<div class="col-sm-6">
                        <a href="../cerrar.php" class="btn btn-danger" data-toggle="modal"><i class="material-icons">power_settings_new</i> <span>Cerrar sesión</span></a>
						<a href="../principal.php" class="btn btn-warning" data-toggle="modal"><i class="material-icons">keyboard_backspace</i> <span>Atrás</span></a>
                        <a href="#editProductModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Agregar</span>
                        </a>
					</div>
                </div>
            </div>
			<div class='col-sm-3 pull-right'>
				<div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control" placeholder="Buscar por nombre"  id="q" onkeyup="load(1);" />
                                <span class="input-group-btn">
                                    <button class="btn btn-info" type="button" onclick="load(1);">
                                        <span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                </div>
			</div>
		<div class='col-sm-4-8 '>
				
			</div>
			<div class='clearfix'></div>
			<hr>
			<div id="loader"></div><!-- Carga de datos ajax aqui -->
			<div id="resultados"></div><!-- Carga de datos ajax aqui -->
			<div class='outer_div'></div><!-- Carga de datos ajax aqui -->	
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<?php include("html/cliente_interno_crud/modal_edit.php");?>
	<!-- Delete Modal HTML -->
  <?php include("html/cliente_interno_crud/modal_delete.php");?>
  <?php include("html/cliente_interno_crud/modal_img.php");?>
<script src="js/cliente_interno_script.js"></script>
     <script>
var x = document.getElementById("positiontext");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
      x.value = "Geolocation is not supported by this browser.";
  }
}
function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.value = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.value = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.value = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.value = "An unknown error occurred."
      break;
  }
}

  function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;
        const myLatLng = { lat: position.coords.latitude, lng: position.coords.longitude };

    initMap(myLatLng)
    x.value = "("+latlon+")";
    document.getElementById("map").style.display = "block";
 }

      function initMap(myLatLng) {
        const map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: myLatLng,
        });
        marca = new google.maps.Marker({
            position: myLatLng,
            map,
            draggable: true,
            animation: google.maps.Animation.DROP,
        });
        marca.addListener( 'dragend', function (event){
                //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                document.getElementById("positiontext").value = "("+this.getPosition().lat()+","+ this.getPosition().lng()+")";
            });
        map.addListener("click", function(ele) {
            marca.setMap(null);
            marca = new google.maps.Marker({
                position: ele.latLng,
                map,
                animation: google.maps.Animation.DROP,
                draggable: true,
            });
            marca.addListener( 'dragend', function (event){
                //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
                document.getElementById("positiontext").value = "("+this.getPosition().lat()+","+ this.getPosition().lng()+")";
            });
            document.getElementById("positiontext").value = ele.latLng;
        });
      }



</script> 
</body>
</html>