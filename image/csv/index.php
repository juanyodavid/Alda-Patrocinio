<?php

if (isset($_POST["enviar"])) {//nos permite recepcionar una variable que si exista y que no sea null
	require_once("conexion.php");
	require_once("functions.php");

	$archivo = $_FILES["archivo"]["name"];
	$archivo_copiado= $_FILES["archivo"]["tmp_name"];
	$archivo_guardado = "copia_".$archivo;

	//echo $archivo."esta en la ruta temporal: " .$archivo_copiado;

	if (copy($archivo_copiado ,$archivo_guardado )) {
		echo "se copeo correctamente el archivo temporal a nuestra carpeta de trabajo <br/>";
	}else{
		echo "hubo un error <br/>";
	}
    
    if (file_exists($archivo_guardado)) {
    	 
    	 $fp = fopen($archivo_guardado,"r");//abrir un archivo
         $rows = 0;
         while ($datos = fgetcsv($fp , 1000 , ";")) {
         	    $rows ++;
         	   // echo $datos[0] ." ".$datos[1] ." ".$datos[2]." ".$datos[3] ."<br/>";
         	if ($rows > 1) {
         		$resultado = insertar_datos($datos[0],$datos[1],$datos[2],$datos[3]);
         	if($resultado){
         		echo "se inserto los datos correctamnete<br/>";
         	}else{
         		echo "no se inserto <br/>";
         	}
         	}
         }



    }else{
    	echo "no existe el archivo copiado <br/>";
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dubir archivo a la BD mysql</title>
</head>
<body>
	 
	 <div class="formulario">
	 	<form action="index.php" class="formulariocompleto" method="post" enctype="multipart/form-data">
	 		 <input type="file" name="archivo" class="form-control"/>
	 		<input type="submit" value="SUBIR ARCHIVO" class="form-control" name="enviar">
	 	</form>
	 </div>
</body>
</html>
