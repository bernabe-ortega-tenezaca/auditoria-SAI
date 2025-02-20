<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo $URL;?>/public/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">CACPE SAI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?php echo $URL;?>/public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $sesion_usuario_nombres ." " . $sesion_usuario_apellidos. "<br/><small>" . $sesion_usuario_correo . "</small>"?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Usuarios
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none">
                        <li class="nav-item">
                            <a href="<?php echo $URL?>/admin/usuarios/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL?>/admin/usuarios/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nuevo usuario</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Procesos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL?>/admin/procesos/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de procesos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL?>/admin/procesos/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nuevo proceso</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            Auditoria
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo $URL?>/admin/auditorias/" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Listado de auditorias</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL?>/admin/auditorias/create.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Nueva auditoria</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
