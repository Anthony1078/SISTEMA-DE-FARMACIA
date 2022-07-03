<?php

include('app/config/config.php');

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
    <?php include('layout/head.php'); ?>
    <title>Sis Farmacia - Usuario </title>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <?php include('layout/menu.php'); ?>
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
                    <div class="panel-heading">Datos de Usuario</div>
                    <div class="panel-body">
                        <div class="row">
                           
                            <div class="col-md-6">
                                <table border="1">
                                    <tr>
                                        <td class="text-center">&nbsp;Nombre Completo&nbsp;</td>
                                        <td class="text-center">
                                            &nbsp;<?php echo $nombres_sesion." ".$ap_paterno_sesion." ".$ap_materno_sesion;?>&nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Ci</td>
                                        <td class="text-center"><?php echo $ci_sesion;?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Fecha nacimiento</td>
                                        <td class="text-center"><?php echo $fecha_nacimiento_sesion;?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Genero</td>
                                        <td class="text-center"><?php echo $genero_sesion;?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">País</td>
                                        <td class="text-center"><?php echo $pais_sesion;?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Celular</td>
                                        <td class="text-center"><?php echo $celular_sesion;?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Código postal</td>
                                        <td class="text-center"><?php echo $codigo_postal_sesion;?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Foto Perfil</td>
                                        <td class="text-center"><?php echo $foto_perfil_sesion;?></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Email</td>
                                        <td class="text-center">&nbsp;<?php echo $email_sesion;?>&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">Cargo</td>
                                        <td class="text-center"><?php echo $cargo_sesion;?></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <img src="<?php echo $URL;?>/usuarios/update_usuarios/<?php echo $foto_perfil_sesion;?>" class="img-thumbnail" alt="" style="width: 210px;height: 200px;">
                            </div>

                        </div>

                    </div>
                </div>

            </section>
            <!-- /.content -->
        </div>
        <?php include('layout/footer.php');?>
    </div>
    <?php include('layout/footer_links.php');?>
</body>

</html>
<?php

   

}else{
    echo "no existe sesión";
    header('Location:'.$URL.'/login');
}



?>