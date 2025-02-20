<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php include('../../layout/admin/header.php') ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Registro de un nuevo usuarios</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="card">
                    <div class="card-header">
                        Llene la información detallada a continuación
                    </div>
                    <div class="card-body">
                        <form action="controller_create.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombres" class="form-control" placeholder="Ingrese solo los nombres..." required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" name="apellidos" class="form-control" placeholder="Ingrese solo los apellidos..." required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="email" name="correo" class="form-control" placeholder="Ingrese su correo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Rol</label>
                                        <select name="tipo" id="" class="form-control">
                                            <option value="empleado">Empleado</option>
                                            <option value="administrador">Administrador</option>
                                            <option value="auditor">Auditor</option>
                                            <option value="gerente">Gerente</option>
                                            <option value="externo">Externo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="password" name="contrasena" class="form-control" placeholder="Ingrese una contraseña" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Verificar contraseña</label>
                                        <input type="password" name="verficar_password" class="form-control" placeholder="Ingrese nuevamente la contraseña" required>
                                    </div>
                                </div>

                            </div>
                            <center>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <center>
                                            <a href="<?php echo $URL."/admin/";?>" class="btn btn-default btn-block">Cancelar</a>
                                        </center>
                                    </div>
                                    <div class="col-md-4">
                                        <center>
                                            <button type="submit" onclick="return confirm('Revise la información antes de enviar')" class="btn btn-primary btn-block">Registrar usuario</button>
                                        </center>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </center>
                        </form>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </div>
<?php include('../../layout/admin/footer.php') ?>