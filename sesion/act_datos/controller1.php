<?php

include_once 'autocompletar.php';

$modelo = new Autocompletar();


$texto = $_GET['cliente_edit'];

$res = $modelo->buscar($texto);


echo json_encode($res);


?>