<?php  ?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $URL;?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>F</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Sis </b>Farmacia</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php
                        $caracter_a_buscar = ".";
                        $buscar = strpos($foto_perfil_sesion,$caracter_a_buscar);
                        if($buscar == true){
                           // echo "existe foto de perfil";
                           ?>
                            <img src="<?php echo $URL;?>/usuarios/update_usuarios/<?php echo $foto_perfil_sesion;?>"
                             class="user-image" alt="User Image">
                          <?php
                        }else{
                            if($genero_sesion == "MASCULINO"){
                                ?>
                                
                                    <img src="<?php echo $URL;?>/public/images/avatar_hombre.png" class="user-image" alt="User Image">
                                
                                <?php
                            }else{
                                ?>
                                
                                    <img src="<?php echo $URL;?>/public/images/avatar_mujer.png" class="user-image" alt="User Image">
                                
                                <?php
                            }
                        }
                        ?>
                        
                        <span class="hidden-xs"><?php echo $nombres_sesion." ".$ap_paterno_sesion." ".$ap_materno_sesion;?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                        <?php
                        $caracter_a_buscar = ".";
                        $buscar = strpos($foto_perfil_sesion,$caracter_a_buscar);
                        if($buscar == true){
                           // echo "existe foto de perfil";
                           ?>
                            <img src="<?php echo $URL;?>/usuarios/update_usuarios/<?php echo $foto_perfil_sesion;?>"
                                 class="img-circle" alt="User Image">
                          <?php
                        }else{
                            if($genero_sesion == "MASCULINO"){
                                ?>
                                <center>
                                    <img src="<?php echo $URL;?>/public/images/avatar_hombre.png" class="img-circle" width="100px" alt="User Image">
                                </center>
                                <?php
                            }else{
                                ?>
                                <center>
                                    <img src="<?php echo $URL;?>/public/images/avatar_mujer.png" class="img-circle" width="100px" alt="User Image">
                                </center>
                                <?php
                            }
                        }
                        ?>                            

                            <p style="font-size: 15px;">
                            <?php echo $nombres_sesion." ".$ap_paterno_sesion." ".$ap_materno_sesion;?> <br>
                            <?php echo $cargo_sesion." - ".$email_sesion;?>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo $URL;?>/principal.php" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo $URL;?>/login/controller_cerrar_sesion.php" class="btn btn-default btn-flat">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- <li>
                     <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                 </li> -->
            </ul>
        </div>
    </nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
            <?php
                        $caracter_a_buscar = ".";
                        $buscar = strpos($foto_perfil_sesion,$caracter_a_buscar);
                        if($buscar == true){
                           // echo "existe foto de perfil";
                           ?>
                             <img src="<?php echo $URL;?>/usuarios/update_usuarios/<?php echo $foto_perfil_sesion;?>"
                                 class="img-circle" alt="User Image" width="50px">
                          <?php
                        }else{
                            if($genero_sesion == "MASCULINO"){
                                ?>
                                <center>
                                    <img src="<?php echo $URL;?>/public/images/avatar_hombre.png" class="img-circle" width="50px" alt="User Image">
                                </center>
                                <?php
                            }else{
                                ?>
                                <center>
                                    <img src="<?php echo $URL;?>/public/images/avatar_mujer.png" class="img-circle" width="50px" alt="User Image">
                                </center>
                                <?php
                            }
                        }
                        ?>
               
            </div>
            <div class="pull-left info">
                <?php $primer_nombre = explode(" ", $nombres_sesion); ?>
                <p><?php echo $primer_nombre[0]." ".$ap_paterno_sesion." ".$ap_materno_sesion;?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header" style="color:#ffffff">MENU DE NAVEGACIÓN - <?php echo $cargo_sesion;?></li>

            <?php
            if($cargo_sesion == "ADMINISTRADOR"){ ?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Usuarios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo $URL;?>/usuarios/"><i class="fa fa-users"></i> Listado de Usuarios</a></li>
                            <li><a href="<?php echo $URL;?>/usuarios/create.php"><i class="fa fa-user"></i> Creación de Usuario</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0)"><i class="fa fa-book"></i> <span>Documentation</span></a></li>

                    <li class="header">REPORTES</li>
                    <li><a href="javascript:void(0)"><i class="fa fa-file-pdf-o"></i> Usuarios Activos</a></li>
                    <li><a href="javascript:void(0)"><i  class="fa fa-file-excel-o" aria-hidden="true"></i> Ventas R/F</a></li>
            <?php
            }

            if($cargo_sesion == "VENDEDOR"){ ?>
                <li><a href="javascript:void(0)"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Ventas</span></a></li>
            <?php    
            }


            if($cargo_sesion == "ALMACEN"){?>
                 <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-list-alt"></i> <span>Inventarios</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo $URL;?>/almacen/">
                                <i class="glyphicon glyphicon-th-list"></i> Ver Inventario</a>
                            </li>
                            <li><a href="<?php echo $URL;?>/almacen/registro_medicamentos.php">
                                <i class="glyphicon glyphicon-plus"></i>
                                Registro de Medicamentos</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-pencil"></i> <span>Pedidos</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                                </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?php echo $URL;?>/pedidos/">
                                <i class="glyphicon glyphicon-th-list"></i> Ver Pedidos</a>
                            </li>
                            <li><a href="<?php echo $URL;?>/pedidos/create.php">
                                <i class="glyphicon glyphicon-plus"></i>
                                Registro de Pedidos</a>
                            </li>
                        </ul>
                    </li>
            <?php
            }
            ?>



            

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>