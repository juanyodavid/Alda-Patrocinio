<?php session_start();

    if(isset($_SESSION['nombre'])){
        require 'frontend/principal-vista.php';
    }else{
        header ('location: login.php');
    }
        
?>