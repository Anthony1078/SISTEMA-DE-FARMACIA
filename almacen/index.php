<?php

include('../app/config/config.php');

session_start();

if(isset($_SESSION['u_usuario'])){
    //echo "existe sesión";
    //echo "Bienvenido Usuario";
    $email_sesion = $_SESSION['u_usuario'];
    $query_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$email_sesion' AND estado ='1' ");
    $query_sesion->execute();
    $sesion_usuarios = $query_sesion->fetchAll(PDO::FETCH_ASSOC);
    foreach ($sesion_usuarios as $sesion_usuario){
        $id_sesion = $sesion_usuario['id'];
        $nombres_sesion = $sesion_usuario['nombres'];
        $ap_paterno_sesion = $sesion_usuario['ap_paterno'];
        $ap_materno_sesion = $sesion_usuario['ap_materno'];
        $ci_sesion = $sesion_usuario['ci'];
        $fecha_nacimiento_sesion = $sesion_usuario['fecha_nacimiento'];
        $genero_sesion = $sesion_usuario['genero'];
        $pais_sesion = $sesion_usuario['pais'];
        $celular_sesion = $sesion_usuario['celular'];
        $codigo_postal_sesion = $sesion_usuario['codigo_postal'];
        $foto_perfil_sesion = $sesion_usuario['foto_perfil'];
        $email_sesion = $sesion_usuario['email'];
        $password_sesion = $sesion_usuario['password'];
        $cargo_sesion = $sesion_usuario['cargo'];

    }

    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php include('../layout/head.php'); ?>
    <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/plugins/datatables/dataTables.bootstrap.css">
  
    <title>SISTEMA DE FARMACIA - REGISTRO DE MEDICAMENTOS </title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include('../layout/menu.php'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            SISTEMA DE FARMACIA - lISTADO DE REGISTRO DE MEDICAMENTOS
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">

            <div class="panel panel-primary">
                <div class="panel-heading">Medicamento Nuevo</div>
                <div class="panel-body">
               
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                              <th>Nro</th>
                              <th>Código</th>
                              <th>Nombre comercial</th>
                              <th>Nombre genérico</th>
                              <th>laboratorio</th>
                              <th>presentacion</th>
                              <th>Cantidad</th>
                              <th>Precio real caja</th>
                              <th>Precio real unidad</th>
                              <th>Precio de venta caja</th>
                              <th>Precio de venta unidad</th>
                              <th>Acción para que sirve</th>
                              <th>Fecha de entrega</th>
                              <th>Fecha de vencimiento</th>
                              <th>Stock maximo/cajas</th>
                              <th>Stock maximo/unidad</th>
                              <th>Stock minimo/cajas</th>
                              <th>Stock minimo/unidad</th>
                              <th>Acción</th>
                              </tr>
                            </thead>
                  <tbody>
                          <?php
                            $sumador_precio_venta_caja = 0;
                            $sumador_precio_real_caja = 0;
                            $sumador_de_cantidades = 0;
                            $contador_medicamentos = 0;
                            $query_medicamentos = $pdo->prepare("SELECT * FROM tb_reg_medicamentos WHERE estado='1'");
                            $query_medicamentos->execute();
                            $medicamentos = $query_medicamentos->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($medicamentos as $medicamento){
                            $id_medicamento = $medicamento['id_medicamento'];
                            $codigo = $medicamento['codigo'];
                            $nombre_comercial = $medicamento['nombre_comercial'];
                            $nombre_generico = $medicamento['nombre_generico'];
                            $laboratorio = $medicamento['laboratorio'];
                            $presentacion = $medicamento['presentacion'];
                            $cantidad = $medicamento['cantidad'];
                            $precio_costo_real_caja = $medicamento['precio_costo_real_caja'];
                            $precio_costo_real_unitario = $medicamento['precio_costo_real_unitario'];
                            $precio_costo_venta_caja = $medicamento['precio_costo_venta_caja'];
                            $precio_costo_venta_unitario = $medicamento['precio_costo_venta_unitario'];
                            $accion_para_que_sirve = $medicamento['accion_para_que_sirve'];
                            $fecha_de_entrega_medicamento = $medicamento['fecha_de_entrega_medicamento'];
                            $fecha_de_vencimiento = $medicamento['fecha_de_vencimiento'];
                            $stock_maximo_cajas = $medicamento['stock_maximo_cajas'];
                            $stock_maximo_unidad = $medicamento['stock_maximo_unidad'];
                            $stock_minimo_cajas = $medicamento['stock_minimo_cajas'];
                            $stock_minimo_unidad = $medicamento['stock_minimo_unidad'];
                            $contador_medicamentos = $contador_medicamentos + 1;
                            $sumador_de_cantidades = $sumador_de_cantidades + $cantidad;
                            $sumador_precio_real_caja = $sumador_precio_real_caja + $precio_costo_real_caja ;
                            $sumador_precio_venta_caja = $sumador_precio_venta_caja + $precio_costo_venta_caja ;
                          ?>
                            <tr>
                            <td align="center"><?php echo $contador_medicamentos;?></td>
                            <td align="center"><?php echo $codigo;?></td>
                            <td align="center"><?php echo $nombre_comercial;?></td>
                            <td align="center"><?php echo $nombre_generico;?></td>
                            <td align="center"><?php echo $laboratorio;?></td>
                            <td align="center"><?php echo $presentacion;?></td>
                            <td align="center"><?php echo $cantidad;?></td>
                            <td align="center"><?php echo $precio_costo_real_caja;?></td>
                            <td align="center"><?php echo $precio_costo_real_unitario;?></td>
                            <td align="center"><?php echo $precio_costo_venta_caja;?></td>
                            <td align="center"><?php echo $precio_costo_venta_unitario;?></td>
                            <td align="center"><?php echo $accion_para_que_sirve;?></td>
                            <td align="center"><?php echo $fecha_de_entrega_medicamento;?></td>
                            <td align="center"><?php echo $fecha_de_vencimiento;?></td>
                            <td align="center"><?php echo $stock_maximo_cajas;?></td>
                            <td align="center"><?php echo $stock_maximo_unidad;?></td>
                            <td align="center"><?php echo $stock_minimo_cajas;?></td>
                            <td align="center"><?php echo $stock_minimo_unidad;?></td>
                            <td>
                            <a href="update_m.php?id_m=<?php echo $id_medicamento;?>" class="btn btn-success"><i class="fa fa-pencil"></i>EDITAR</a>
                            <a href="delete_m.php?id_m=<?php echo $id_medicamento;?>" class="btn btn-danger"><i class="fa fa-trash"></i>BORRAR</a>
                            </td>
                            </tr>

                          <?php 
                            }
                           ?>
                  </tbody>
                    <tfoot>
               
                    </tfoot>
              </table>
            </div>
        
                </div>
                <div class="row container">
                     <div class="col-md-3">
                          <div class="form-group">
                                <label for="">TOTAL | CANTIDAD </label>
                                <input type="text" value="<?php echo $sumador_de_cantidades;?>" class="form-control" disabled>
                          </div>
                     </div>
                     <div class="col-md-3">
                           <div class="form-group">
                                 <label for="">TOTAL | PRECIO REAL CAJA</label>
                                 <input type="text" value="<?php echo $sumador_precio_real_caja;?>" class="form-control" disabled>
                           </div>
                     </div>
                     <div class="col-md-3">
                     <div class="form-group">
                                 <label for="">TOTAL | PRECIO VENTA CAJA</label>
                                 <input type="text" value="<?php echo $sumador_precio_venta_caja;?>" class="form-control" disabled>
                           </div>
                     </div>
                     <div class="col-md-3">
                     <div class="form-group">
                                 <label for="">TOTAL | GANANCIAS</label>
                                 <?php 
                                 $total_ganancias = 0;
                                 $total_ganancias = $sumador_precio_venta_caja - $sumador_precio_real_caja;
                                 ?>
                                 <input type="text" value="<?php echo $total_ganancias;?>" class="form-control" disabled>
                           </div>
                     </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <?php include('../layout/footer.php');?>
</div>
<?php //include('../layout/footer_links.php');?>
<!-- jQuery 2.2.3 -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $URL;?>/app/templeates/AdminLTE-2.3.11/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable( {
      "responsive": true, 
      "autoWidth": false,
      "pageLength": 5,
      "language" :{
        "decimal": "",
        "emptyTable":     "No hay información",
        "info":           "Mostrando _START_ a _END_ de _TOTAL_ Medicamentos",
        "infoEmpty":      "Mostrando 0 a 0 de 0 Medicamentos",
        "infoFiltered":   "(Filtro de _MAX_ total Medicamentos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu":     "Mostrar _MENU_ Medicamentos",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Buscador de Medicamentos:",
        "zeroRecords":    "Sin resultados encontrados",
        "paginate": {
        "first":      "Primero",
        "last":       "Ultimo",
        "next":       "Siguiente",
        "previous":   "Anterior"
                    }
                  }
                           });
               });
</script>
</body>
</html>
    <?php

   

}else{
    echo "no existe sesión";
    header('Location:'.$URL.'/login');
}

?>

