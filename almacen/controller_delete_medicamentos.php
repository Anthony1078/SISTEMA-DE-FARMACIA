<?php
    include('../app/config/config.php');

    
    $user_eliminacion = $_GET['user_eliminacion'];
    $id_medicamento     = $_GET['id_m'];
    date_default_timezone_set("America/Lima");
    $fechaHora = date('Y-m-d h:i:s');
    $estado = '0';

    $sentencia = $pdo->prepare("UPDATE tb_reg_medicamentos SET
        user_eliminacion=:user_eliminacion,
        fyh_eliminacion=:fyh_eliminacion,
        estado=:estado WHERE id_medicamento =:id_medicamento");

         

   $sentencia->bindParam(':user_eliminacion',$user_eliminacion);
   $sentencia->bindParam(':fyh_eliminacion',$fechaHora);
   $sentencia->bindParam(':estado',$estado);
   $sentencia->bindParam(':id_medicamento',$id_medicamento);
   if($sentencia->execute()){
       //echo "Medicamento destruido de la base de datos, Correctamente...";
       header('Location: '.$URL.'/almacen');
   }else{
      echo "No se pudo insertar el medicamento a la base de datos";
        }

?>