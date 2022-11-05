<?php

	define('DB_HOST','localhost');
	define('DB_USER','root');
	define('DB_PASS','');
	define('DB_NAME','patrocinio_work');
	# conectare la base de datos
    $cone=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if(!$cone){
        die("imposible conectarse: ".mysqli_error($cone));
    }
    if (@mysqli_connect_errno()) {
        die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
    }

?>