<?php session_start();

    if(isset($_SESSION['nombre'])) {
        header('location: principal.php');
    }

    $error = '';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $nombre = $_POST['nombre'];
        $clave = $_POST['clave'];
        $clave = hash('sha512', $clave);
        
        try{
            $conexion = new PDO('mysql:host=localhost;dbname=patrocinio_work', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage(); ////aca hay un echo
            }
            // 
       
        $statement = $conexion->prepare('SELECT * FROM facilitador WHERE nombre = :nombre AND pass = :clave' );
        
        $statement->execute(array(
            ':nombre' => $nombre,
            ':clave' => $clave
        ));

        $resultado = $statement->fetch();
         if ($resultado !== false){
        // ESTA PARTE MUESTRA COMO ESTIRAR UN VALOR DE LA BASE DE DATOS
        $conn = mysqli_connect('localhost','root','', 'patrocinio_work');
        $consulta = "SELECT * FROM facilitador WHERE nombre = '".$nombre."'" ;

        $query4 = "SELECT COUNT(*) FROM facilitador";
        $result = mysqli_query($conn,$query4);
        $num_rows = @mysqli_num_rows($result);

        if ($num_rows < 1) $error .= '<i>Este nombre no existe</i>';
        if($sql = mysqli_query($conn,$consulta)){
            while ($row = mysqli_fetch_assoc($sql)) {
                $clase=$row["obs"];}
         
        

        // echo '<script language="javascript">alert("';
        // echo $clase;
        // echo '");</script>';
            
              if ($clase == 'principal' or $clase == 'administrador')
          { 
                  $_SESSION['nombre'] = $nombre;
                header('location: principal.php');  
              }
      elseif($clase == 'secundario'){
                  $_SESSION['secundario'] = $nombre;
                  header('location: usuario/usuario.php');//aca elijo a que lugar enviar esta informacion
              }
         }else{
             $error .= '<i>Este nombre no existe</i>';
          }
        }
       
    }
   
    // echo $num_rows;
require 'frontend/login-vista.html';


?>