<?php 
include ('../app/config/config.php');

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
        <title>Sis Farmacia - Usuario </title>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include('../layout/menu.php'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    SIS FARMACIA - USUARIOS
                </h1>
            </section>
    
            <!-- Main content -->
            <section class="content">
    
                <div class="panel panel-primary">
                    <div class="panel-heading">Listado de Usuarios Activos</div>
                    <div class="panel-body">
                        <table class="table table-bordered table-hover table-condensed">
                            <th>Nro</th>
                            <th>Nombre Completo</th>
                            <th>Carnet de Identidad</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Genero</th>
                            <th>País</th>
                            <th>Celular</th>
                            <th>Foto Perfil</th>
                            <th>Email</th>
                            <th>Cargo</th>
    
                            <?php
                            $contador_usuarios = 0;
                            $query_usuarios = $pdo->prepare("SELECT * FROM tb_usuarios");
                            $query_usuarios->execute();
                            $usuarios = $query_usuarios->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($usuarios as $usuario){
                                $id = $usuario['id'];
                                $nombres = $usuario['nombres'];
                                $ap_paterno = $usuario['ap_paterno'];
                                $ap_materno = $usuario['ap_materno'];
                                $ci = $usuario['ci'];
                                $fecha_nacimiento = $usuario['fecha_nacimiento'];
                                $genero = $usuario['genero'];
                                $pais = $usuario['pais'];
                                $celular = $usuario['celular'];
                                $codigo_postal = $usuario['codigo_postal'];
                                $foto_perfil = $usuario['foto_perfil'];
                                $email = $usuario['email'];
                                $cargo = $usuario['cargo'];
                                $contador_usuarios = $contador_usuarios + 1;
                                ?>
                                <tr>
                                <td class="text-center"><?php echo $contador_usuarios;?></td>
                                <td class="text-center"><?php echo $nombres." ".$ap_paterno." ".$ap_materno;?></td>
                                <td class="text-center"><?php echo $ci;?></td>
                                <td class="text-center"><?php echo $fecha_nacimiento;?></td>
                                <td class="text-center"><?php echo $genero;?></td>
                                <td class="text-center"><?php echo $pais;?></td>
                                <td class="text-center"><?php echo $codigo_postal."-".$celular;?></td>
                                <td>
                                    <?php
                                    $caracter_a_buscar = ".";
                                    $buscar = strpos($foto_perfil,$caracter_a_buscar);
                                    if($buscar == true){
                                       // echo "existe foto de perfil";
                                       ?>
                                        <center>
                                            <img src="<?php echo $URL;?>/usuarios/update_usuarios/<?php echo $foto_perfil;?>" width="100px" alt="">
                                        </center>
                                      <?php
                                    }else{
                                        if($genero == "HOMBRE"){
                                            ?>
                                            <center>
                                                <img src="<?php echo $URL;?>/public/images/avatar_hombre.png" width="100px" alt="">
                                            </center>
                                            <?php
                                        }else{
                                            ?>
                                            <center>
                                                <img src="<?php echo $URL;?>/public/images/avatar_mujer.png" width="100px" alt="">
                                            </center>
                                            <?php
                                        }
                                    }
                                    ?>
    
                                </td>
                                <td class="text-center"><?php echo $email;?></td>
                                <td class="text-center">
                                    <?php 
                                     $color = "";
                                    switch($cargo){
                                        case "ADMINISTRADOR":  $color = "#ffc107";break;
                                        case "ALMACEN":  $color = "#28a745";break;
                                        case "CONTADOR":  $color = "#17a2b8";break;
                                        case "VENDEDOR":  $color = "#007bff";
                                    }
                                    ?>
                                    <span class="badge badge-success" style="background: <?php echo $color;?>"><?php echo $cargo;?></span>    
                                </td>
                                </tr>
                           <?php
                            }
                            ?>
    
    
                        </table>
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
    echo "No existe sesión";
    header('Location:'.$URL.'/login');
}