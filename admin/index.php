<?php
    include '../app/config/config.php';
    include '../app/config/conexion.php';

    include '../layout/admin/sesion.php';
    include '../layout/admin/datos_session_user.php';
    include 'usuarios/controller_read.php';
    include 'auditorias/controller_read.php';
    include 'auditoria_proceso/controller_read_p.php';
?>

<?php include('../layout/admin/header.php') ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Sistema de Auditoria Interna - <?php echo $sesion_usuario_tipo;?></h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?=$total_usuarios;?></h3>
                                <p>Usuarios registrados</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?=$URL.'/admin/usuarios/index.php'?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-down"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?=$total_auditorias;?></h3>
                                <p>Auditorias realizadas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?=$URL.'/admin/auditorias/index.php'?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-down"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-4">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?=$total_audit_procesos;?></h3>
                                <p>Procesos de auditoria</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?=$URL.'/admin/auditorias/index.php'?>" class="small-box-footer">Más información <i class="fas fa-arrow-circle-down"></i></a>
                        </div>
                    </div>
                </div>


                <div class="row small">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <table class="table table-hover table-bordered table-striped" style="background-color: #FFFFFF">
                            <thead>
                                <tr>
                                    <td scope="col"><b>#</b></td>
                                    <td scope="col"><?php echo $sesion_usuario_id;?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="col"><b>Apellidos</b></th>
                                    <td scope="col"><?php echo $sesion_usuario_apellidos;?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><b>Nombres</b></th>
                                    <td scope="col"><?php echo $sesion_usuario_nombres;?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><b>Correo</b></th>
                                    <td scope="col"><?php echo $sesion_usuario_correo;?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><b>Rol</b></th>
                                    <td scope="col"><?php echo $sesion_usuario_tipo;?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><b>Habilitado</b></th>
                                    <td scope="col"><?php echo $sesion_usuario_habilitado;?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><b>Registrado el</b></th>
                                    <td scope="col"><?php echo $sesion_usuario_created;?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
<?php include('../layout/admin/footer.php') ?>