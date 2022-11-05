<?php
    
    try{
         $conexion = new PDO('mysql:host=dontcompy.ipagemysql.com;dbname=sesiondb', 'sesionadmin', 'SesionAdmin2019*');
    }catch(PDOException $prueba_error){
        echo "Error: " . $prueba_error->getMessage();
    }


?>