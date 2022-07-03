<?php

include('../app/config/config.php');

$nombre_lab = $_GET['nombre_lab'];
$user_creacion = $_GET['user_creacion'];

date_default_timezone_set("America/Lima");
$fechaHora = date('Y-m-d h:i:s');
$estado = '1';

$sentencia = $pdo->prepare("INSERT INTO tb_laboratorios
        ( nombre_lab, user_creacion, fyh_creacion, estado)
  VALUES(:nombre_lab,:user_creacion,:fyh_creacion,:estado)");

$sentencia->bindParam(':nombre_lab',$nombre_lab);

$sentencia->bindParam(':user_creacion',$user_creacion);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado);

if($sentencia->execute()){
    //echo "Usuarios insertado a la base de datos, Correctamente";
    header('Location: '.$URL.'/almacen/registro_medicamentos.php');
}else{
   echo "No se pudo insertar al usuario a la base de datos";
}


?>