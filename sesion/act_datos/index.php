<?php

if (isset($_POST["enviar"])) {//nos permite recepcionar una variable que si exista y que no sea null
	require_once("conexion.php");
	require_once("carga.php");

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
         while ($datos = fgetcsv($fp , 2000 , ",")) {// aca esta la cantidad de filas que se va a leer y el caracter que les separa
         	    $rows ++;
         	   // echo $datos[1]." ".$datos[5]." ".$datos[6]." ".$datos[7]." ".$datos[8]." ".$datos[9]." ".$datos[10]." ".$datos[11]."<br/>";
         	if ($rows > 1) {
				 $resultado = insertar_datos($datos[1], $datos[5],$datos[6],$datos[7],$datos[8],$datos[9],$datos[10],$datos[11]);
				 echo $datos[1]." ".$datos[5]." ".$datos[6]." ".$datos[7]." ".$datos[8]." ".$datos[9]." ".$datos[10]." ".$datos[11]."<br/>";
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
