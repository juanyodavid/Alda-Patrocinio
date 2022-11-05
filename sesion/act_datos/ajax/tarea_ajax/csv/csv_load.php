<?php
 function insertar_datos($dato1,$dato2,$dato3){
 		global $con;
 	$sentencia = "insert into tarea (id,fecped,estado,tipo_tarea,CLIENT_ID) values (NULL,'$dato1','Pendiente','$dato2',$dato3)";//el dato que esta entre comillas no es int
 	//echo $sentencia;
 	$ejecutar = mysqli_query($con,$sentencia);
 	return $ejecutar;
 }
?>