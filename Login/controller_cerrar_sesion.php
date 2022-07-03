<?php

include('../app/config/config.php');
/*Iniciamos sesión*/
session_start();

if(isset($_SESSION['u_usuario'])){
    echo "existe sesión";
    session_destroy();
    header('Location:'.$URL.'/login');
}else{
    //echo "no existe sesión";
}

?>