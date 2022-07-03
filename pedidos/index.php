<?php

include('../app/config/config.php');

session_start();

if(isset($_SESSION['u_usuario'])){
   // echo "existe sesión";
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
  
    <title>SISTEMA DE FARMACIA - PEDIDO DE MEDICAMENTOS </title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include('../layout/menu.php'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
            SISTEMA DE FARMACIA - lISTADO DE PEDIDO DE MEDICAMENTOS
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="panel panel-primary">
                <div class="panel-heading">Pedidos Nuevos</div>
                <div class="panel-body">
               
            <div class="table-responsive">
            
                <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                              <th>Nro</th>
                              <th>Fecha de pedido</th>
                              <th>Nombre comercial</th>
                              <th>Nombre genérico</th>
                              <th>laboratorio</th>
                              <th>presentacion</th>
                              <th>Cantidad</th>
                              <th>Acción</th>
                              
                              </tr>
                            </thead>
                              <tbody>
                          <?php
                            $contador_de_pedidos = 0;
                            $query_pedidos = $pdo->prepare("SELECT * FROM tb_pedidos WHERE estado='1' ");
                            $query_pedidos->execute();
                            $pedidos = $query_pedidos->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($pedidos as $pedido){
                                $id = $pedido['id'];
                                $id_medicamento_p = $pedido['id_medicamento_p'];
                                $cantidad = $pedido['cantidad'];
                                $fecha_pedido = $pedido['fecha_pedido'];
                          ?>
                            <tr>
                            <td align="center"><?php echo $contador_de_pedidos;?></td>
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
        "info":           "Mostrando _START_ a _END_ de _TOTAL_ Pedidos",
        "infoEmpty":      "Mostrando 0 a 0 de 0 Pedidos",
        "infoFiltered":   "(Filtro de _MAX_ total Pedidos)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu":     "Mostrar _MENU_ Pedidos",
        "loadingRecords": "Cargando...",
        "processing":     "Procesando...",
        "search":         "Buscador de Pedidos:",
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