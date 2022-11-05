<?php

include_once 'database.php';

class Autocompletar extends Database{

    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare('SELECT CLIENT_ID,nomap FROM beneficiario_interno WHERE CLIENT_ID LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if($query->rowCount()){
            while($r = $query->fetch()){
                array_push($res, $r['CLIENT_ID']);
            }
        }
        return $res;
    }

}

?>