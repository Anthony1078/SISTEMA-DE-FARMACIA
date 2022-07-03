<?php
    include('../app/config/config.php');

    $codigo = $_GET['codigo'];
    $nombre_comercial = $_GET['nombre_comercial'];
    $nombre_generico = $_GET['nombre_generico'];
    $laboratorio = $_GET['laboratorio'];
    $presentacion = $_GET['presentacion'];
    $cantidad = $_GET['cantidad'];
    $precio_costo_real_caja = $_GET['precio_costo_real_caja'];
    $precio_costo_real_unitario = $_GET['precio_costo_real_unitario'];
    $precio_costo_venta_caja = $_GET['precio_costo_venta_caja'];
    $precio_costo_venta_unitario = $_GET['precio_costo_venta_unitario'];
    $accion_para_que_sirve = $_GET['accion_para_que_sirve'];
    $dia_entrega = $_GET['dia_entrega'];
    $mes_entrega = $_GET['mes_entrega'];
    $año_entrega = $_GET['año_entrega'];
    $fecha_de_entrega_medicamento = $dia_entrega."/".$mes_entrega."/".$año_entrega;
    $dia_vencimiento = $_GET['dia_vencimiento'];
    $mes_vencimiento = $_GET['mes_vencimiento'];
    $año_vencimiento = $_GET['año_vencimiento'];
    $fecha_de_vencimiento = $dia_vencimiento."/".$mes_vencimiento."/".$año_vencimiento;
    $stock_maximo_cajas = $_GET['stock_maximo_cajas'];
    $stock_maximo_unidad = $_GET['stock_maximo_unidad'];
    $stock_minimo_cajas = $_GET['stock_minimo_cajas'];
    $stock_minimo_unidad = $_GET['stock_minimo_unidad'];
    
    $user_actualizacion = $_GET['user_creacion'];
    $id_medicamento     = $_GET['id_medicamento'];
    date_default_timezone_set("America/Lima");
    $fechaHora = date('Y-m-d h:i:s');
    $estado = '1';

    $sentencia = $pdo->prepare("UPDATE tb_reg_medicamentos SET
        codigo=:codigo,
        nombre_comercial=:nombre_comercial,
        nombre_generico=:nombre_generico,
        laboratorio=:laboratorio,
        presentacion=:presentacion,
        cantidad=:cantidad,
        precio_costo_real_caja=:precio_costo_real_caja,
        precio_costo_real_unitario=:precio_costo_real_unitario,
        precio_costo_venta_caja=:precio_costo_venta_caja,
        precio_costo_venta_unitario=:precio_costo_venta_unitario,
        accion_para_que_sirve=:accion_para_que_sirve,
        fecha_de_entrega_medicamento=:fecha_de_entrega_medicamento,
        fecha_de_vencimiento=:fecha_de_vencimiento,
        stock_maximo_cajas=:stock_maximo_cajas,
        stock_maximo_unidad=:stock_maximo_unidad,
        stock_minimo_cajas=:stock_minimo_cajas,
        stock_minimo_unidad=:stock_minimo_unidad,
        user_actualizacion=:user_actualizacion,
        fyh_actualizacion=:fyh_actualizacion WHERE id_medicamento =:id_medicamento");

         

   $sentencia->bindParam(':codigo',$codigo);
   $sentencia->bindParam(':nombre_comercial',$nombre_comercial);
   $sentencia->bindParam(':nombre_generico',$nombre_generico);
   $sentencia->bindParam(':laboratorio',$laboratorio);
   $sentencia->bindParam(':presentacion',$presentacion);
   $sentencia->bindParam(':cantidad',$cantidad);
   $sentencia->bindParam(':precio_costo_real_caja',$precio_costo_real_caja);
   $sentencia->bindParam(':precio_costo_real_unitario',$precio_costo_real_unitario);
   $sentencia->bindParam(':precio_costo_venta_caja',$precio_costo_venta_caja);
   $sentencia->bindParam(':precio_costo_venta_unitario',$precio_costo_venta_unitario);
   $sentencia->bindParam(':accion_para_que_sirve',$accion_para_que_sirve);
   $sentencia->bindParam(':fecha_de_entrega_medicamento',$fecha_de_entrega_medicamento);
   $sentencia->bindParam(':fecha_de_vencimiento',$fecha_de_vencimiento);
   $sentencia->bindParam(':stock_maximo_cajas',$stock_maximo_cajas);
   $sentencia->bindParam(':stock_maximo_unidad',$stock_maximo_unidad);
   $sentencia->bindParam(':stock_minimo_cajas',$stock_minimo_cajas);
   $sentencia->bindParam(':stock_minimo_unidad',$stock_minimo_unidad);
   $sentencia->bindParam(':user_actualizacion',$user_actualizacion);
   $sentencia->bindParam(':fyh_actualizacion',$fechaHora);
   $sentencia->bindParam(':id_medicamento',$id_medicamento);
   if($sentencia->execute()){
       //echo "Medicamento actualizado a la base de datos, Correctamente";
       header('Location: '.$URL.'/almacen');
   }else{
      echo "No se pudo insertar el medicamento a la base de datos";
        }

?>