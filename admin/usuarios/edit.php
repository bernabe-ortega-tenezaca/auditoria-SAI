<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php
    include('../../layout/admin/header.php');
    $id_get = $_GET['id'];

    $query = $PDO->prepare("SELECT * FROM Usuario WHERE id= '$id_get'");
    $query->execute();

    $usuarios = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($usuarios as $usuario) {
        $id = $usuario['id'];
        $apellidos = $usuario['apellidos'];
        $nombres = $usuario['nombres'];
        $correo = $usuario['correo'];
        $tipo = $usuario['tipo'];
        $habilitado = $usuario['habilitado'];
        $creado = $usuario['created_at'];
    }
?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edicion de  usuarios</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="card">
                    <div class="card-header" style="background-color: #8ec07c; color: white">
                        Llene la información detallada a continuación
                    </div>
                    <div class="card-body">
                        <form action="controller_edit.php" method="post">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" name="nombres" value="<?php echo $nombres?>" class="form-control" placeholder="Ingrese solo los nombres..." required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Apellidos</label>
                                        <input type="text" name="apellidos" value="<?php echo $apellidos?>" class="form-control" placeholder="Ingrese solo los apellidos..." required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="email" name="correo" value="<?php echo $correo?>" class="form-control" placeholder="Ingrese su correo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Rol</label>
                                        <select name="tipo" id="" class="form-control">
                                            <option value="<?php echo $tipo;?>"><?php echo $tipo;?></option>
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
                                        <label for="">Correo</label>
                                        <input type="text" class="form-control" placeholder="Ingrese su correo" required>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <center>
                                            <a href="<?php echo $URL."/admin/usuarios/";?>" class="btn btn-default btn-block">Cancelar</a>
                                        </center>
                                    </div>
                                    <div class="col-md-4">
                                        <center>
                                            <button type="submit" onclick="return confirm('Revise la información antes de enviar')" class="btn btn-primary btn-block">Actualizar usuario</button>
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