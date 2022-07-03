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
    <title>Sistema de Farmacia - Registro de Medicamentos </title>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include('../layout/menu.php'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                SISTEMA DE FARMACIA - REGISTRO DE MEDICAMENTOS
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="panel panel-primary">
                <div class="panel-heading">Medicamento Nuevo</div>
                <div class="panel-body">
               
                <form action="controller_reg_medicamentos.php" method="get">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Código</label>
                                <input type="text" class="form-control" name="codigo" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label>Nombre Comercial</label>
                                <input type="text" class="form-control" name="nombre_comercial" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group">
                                <label>Nombre Generico</label>
                                <input type="text" class="form-control" name="nombre_generico" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Laboratorio</label> 
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" 
                                data-target="#myModal_laboratorio">
                                <i class="glyphicon glyphicon-plus"></i>
                                </button>
                                <select name="laboratorio" id="" class="form-control" required>
                                    <option value="">Selecciona...</option>
                                    <?php
                                         $query_lab = $pdo->prepare("SELECT * FROM tb_laboratorios WHERE estado ='1' ");
                                         $query_lab->execute();
                                         $laboratios = $query_lab->fetchAll(PDO::FETCH_ASSOC);
                                         foreach ($laboratios as $laboratio){
                                            $id_lab = $laboratio['id_laboratorio'];
                                            $nombre_lab = $laboratio['nombre_lab'];
                                            ?>
                                            <option value="<?php echo $nombre_lab;?>"><?php echo $nombre_lab;?></option>   
                                            <?php
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <label>Presentación</label>
                                <button type="button" class="btn btn-success btn-xs" data-toggle="modal" 
                                data-target="#myModal_presentacion">
                                <i class="glyphicon glyphicon-plus"></i>
                                </button>
                                <select name="presentacion" id="" class="form-control" required>
                                    <option value="">Selecciona...</option>
                                    <?php
                                         $query_pre = $pdo->prepare("SELECT * FROM tb_presentacion WHERE estado ='1' ");
                                         $query_pre->execute();
                                         $presentaciones = $query_pre->fetchAll(PDO::FETCH_ASSOC);
                                         foreach ($presentaciones as $presentacion){
                                            $id_pre = $presentacion['id_presentacion'];
                                            $nombre_pre = $presentacion['nombre_pre'];
                                            ?>
                                            <option value="<?php echo $nombre_pre;?>"><?php echo $nombre_pre;?></option>   
                                            <?php
                                        }
                                        ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                                <label>Cantidad</label>
                                <input type="text" class="form-control" name="cantidad" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                                <label>Precio Real/Caja</label>
                                <input type="text" class="form-control" name="precio_costo_real_caja" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                                <label>Precio Real/Unidad</label>
                                <input type="text" class="form-control"  name="precio_costo_real_unitario" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Precio Venta/Caja</label>
                                <input type="text" class="form-control" name="precio_costo_venta_caja" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                        <div class="form-group">
                                <label>Precio Venta/Unidad</label>
                                <input type="text" class="form-control" name="precio_costo_venta_unitario" required> 
                            </div>
                        </div>
                        <div class="col-md-8">
                        <div class="form-group">
                                <label>Acción y/o para que sirve</label>
                                <input type="text" class="form-control" name="accion_para_que_sirve" required>
                            </div>
                        </div>
                        
                    </div>



                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Fecha de Entrega</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="dia_entrega" id="" class="form-control" required>
                                            <option value="">Día</option>    
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="mes_entrega" id="" class="form-control" required>
                                            <option value="01">Enero</option>
                                            <option value="02">Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
                                            <option value="06">Junio</option>
                                            <option value="07">Julio</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="año_entrega" id="" class="form-control" required>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Fecha de vencimiento</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="dia_vencimiento" id="" class="form-control" required>
                                            <option value="">Día</option>    
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="mes_vencimiento" id="" class="form-control" required>
                                            <option value="01">Enero</option>
                                            <option value="02">Febrero</option>
                                            <option value="03">Marzo</option>
                                            <option value="04">Abril</option>
                                            <option value="05">Mayo</option>
                                            <option value="06">Junio</option>
                                            <option value="07">Julio</option>
                                            <option value="08">Agosto</option>
                                            <option value="09">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="año_vencimiento" id="" class="form-control" required>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Stock Maximo/Caja</label>
                                <input type="text" class="form-control" name="stock_maximo_cajas" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <label>Stock Maximo/Unidades</label>
                                <input type="text" class="form-control" name="stock_maximo_unidad" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <label>Stock Minimo/Caja</label>
                                <input type="text" class="form-control" name="stock_minimo_cajas" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group">
                                <label>Stock Minimo/Unidades</label>
                                <input type="text" class="form-control" name="stock_minimo_unidad" required>
                            </div>
                        </div>
                    </div>

                    <input type="text" value=" <?php echo $email_sesion;?> " name="user_creacion" hidden>


                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <a href="<?php echo $URL;?>/almacen" class="btn btn-default btn-lg">Cancelar</a>
                            <input type="submit" class="btn btn-primary btn-lg" value="Registrar Medicamento">
                        </div>
                    </div>

                </form>
        
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <?php include('../layout/footer.php');?>
</div>
<?php include('../layout/footer_links.php');?>
</body>
</html>
    <?php

   

}else{
    echo "no existe sesión";
    header('Location:'.$URL.'/login');
}



?>

<div class="modal fade" id="myModal_laboratorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_laboratorio.php" method="get">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registro de Nuevo Laboratorio</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label>Nombre del Laboratorio</label>
                <input type="text" class="form-control" name="nombre_lab" require>
                <input type="text" value="<?php echo $email_sesion;?>" name="user_creacion" hidden>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Guardar Laboratorio">
      </div>
    </div>
    </form>
  </div>
</div>





<div class="modal fade" id="myModal_presentacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <form action="controller_reg_presentacion.php" method="get">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Registrar Nueva Presentación</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <label>Nombre Presentación</label>
                <input type="text" class="form-control" name="nombre_pre" require>
                <input type="text" value="<?php echo $email_sesion;?>" name="user_creacion" hidden>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <input type="submit" class="btn btn-primary" value="Guardar Presentación">
      </div>
    </div>
    </div>
    </form>
  </div>
</div>