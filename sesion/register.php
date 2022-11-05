<?php session_start();

    if(isset($_SESSION['nombre'])) {
        header('location: index1.php');
    }

    
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $celular = $_POST['celular'];
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $nya = $_POST['nya'];
        $barrio = $_POST['barrio'];
        $clave = $_POST['clave'];
        $clave2 = $_POST['clave2'];
        $cod = $_POST['cod'];
        $clave = hash('sha512', $clave);
        $clave2 = hash('sha512', $clave2);
        $codigoac = "2218admin"; // es el codigo de acceso de los nombres y administradores
        $codigo_sec = "6544user"; // es el codigo de acceso de los nombres
        $estadoini = 0;
        $error = '';
        
        if (empty($celular) or empty($codigo) or empty($nombre) or empty($clave) or empty($nya) ){
            
            $error .= '<i>Favor de rellenar todos los campos</i>';
        }else{
            try{
                // $conexion = new PDO('mysql:host=dontcompy.ipagemysql.com;dbname=patrocinio_db', 'appalda', 'aldaapp01');
                $conexion = new PDO('mysql:host=localhost;dbname=patrocinio_work', 'root', '');
            }catch(PDOException $prueba_error){
                echo "Error: " . $prueba_error->getMessage();
            }
            
            $statement = $conexion->prepare('SELECT * FROM facilitador WHERE nombre = :nombre LIMIT 1');
            $statement->execute(array(':nombre' => $nombre));
            $resultado = $statement->fetch();
            
                        
            if ($resultado != false){
                $error .= '<i>Este nombre de usuario ya existe.</i>';
            }
            
            if ($clave != $clave2){
                $error .= '<i> Las contraseñas no coinciden.</i>';
            }
            if ($cod != $codigoac and $cod != $codigo_sec){
                $error .= '<i> Código de acceso incorrecto.</i>';
            }
            $statement = $conexion->prepare('SELECT * FROM facilitador WHERE id_facilitador = :codigo LIMIT 1');
            $statement->execute(array(':codigo' => $codigo));
            $resultado2 = $statement->fetch();
            if ($resultado2 != false){
                $error .= '<i> Código de facilitador ya existente.</i>';
            }
            
        }
         if ($cod == $codigoac ){
                    $clase ='principal';
                }
                else{
                    $clase = 'secundario'; 
                }
        if ($error == ''){
            $statement = $conexion->prepare('INSERT INTO facilitador(id_facilitador, nombre, pass, celular,estado,obs,nombre_apellido,barrio) VALUES (:codigo,:nombre,:clave,:celular,:estado,:clase,:nya,:barrio)');
            $statement->execute(array(
                
                ':codigo' => $codigo,
                ':celular' => $celular,
                ':nombre' => $nombre,
                ':clave' => $clave,
                ':estado' => $estadoini,
                ':clase' => $clase,
                ':nya' => $nya,
                ':barrio' => $barrio,
               

               
            ));
            
            $error .= '<i style="color: green;">Usuario registrado exitosamente</i>';
        }
    }


    require 'frontend/register-vista.html';
