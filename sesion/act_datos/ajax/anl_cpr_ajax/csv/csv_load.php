<?php
 function insertar_datos($PGM_ID,$PENDDING_YN,$CLIENT_NAME,$CLIENT_ID,$CLIENT_GENDER_DESC,$ENROLLMENT_STATUS,$CLIENT_DOB,$SPONSOR_ID){
 		global $con;
 	$sentencia = "insert into beneficiario_externo (PGM_ID,PENDDING_YN,CLIENT_NAME,CLIENT_ID,CLIENT_GENDER_DESC,ENROLLMENT_STATUS,CLIENT_DOB,SPONSOR_ID) values ($PGM_ID,'$PENDDING_YN','$CLIENT_NAME',$CLIENT_ID,'$CLIENT_GENDER_DESC','$ENROLLMENT_STATUS','$CLIENT_DOB','$SPONSOR_ID')";
 	$ejecutar = mysqli_query($con,$sentencia);
 	return $ejecutar;
 }
?>