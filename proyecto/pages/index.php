<?php
    session_start();
    if(isset($_SESSION["usuario"])){
        header('Location: http://localhost/proyecto/pages/home.php');        
    } else{
        header('Location: http://localhost/proyecto/index.html');        
    }
?>