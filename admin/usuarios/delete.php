<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php
    include('../../layout/admin/header.php');
    $id_get = $_GET['id'];

    $query = $PDO->prepare("SELECT * FROM Usuario WHERE id ='$id_get';");
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
                    <h1 class="m-0">Eliminar usuarios</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header" style="background-color: #ea568c; color: white">
                    Realmente desea eliminar el usuario?
                </div>
                <div class="card-body">
                    <form action="controller_delete.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="id" value="<?php echo $id_get?>" class="form-control" hidden>
                                    <label for="nombres">Nombres</label>
                                    <input type="text" name="nombres" value="<?php echo $nombres?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="apellidos" value="<?php echo $apellidos?>" class="form-control"  disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="email" name="correo" value="<?php echo $correo?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Rol</label>
                                    <input type="text" name="rol" value="<?php echo $tipo?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <center>
                                        <a href="<?php echo $URL."/admin/usuarios";?>" class="btn btn-default btn-block">Cancelar</a>
                                    </center>
                                </div>
                                <div class="col-md-4">
                                    <center>
                                        <button type="submit" onclick="return confirm('Realmente desea eliminar la información?')" class="btn btn-primary btn-block">Eliminar usuario</button>
                                    </center>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include('../../layout/admin/footer.php') ?>
