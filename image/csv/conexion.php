<?php
$conexion = mysqli_connect("localhost","jhon","123456","factura");

if($conexion){
  echo "se realizo correctamente la conexion";
}else{
 echo " no se realizo correctamente la conexion";
}
?>