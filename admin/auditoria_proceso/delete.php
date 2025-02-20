<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php
    include('../../layout/admin/header.php');
    $id_get = $_GET['id'];

    $query = $PDO->prepare("SELECT * FROM auditoria_interna WHERE id= '$id_get'");
    $query->execute();

    $registros = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($registros as $registro) {
        $id = $registro['id'];
        $id_empleado = $registro['id_empleado'];
        $objetivo = $registro['objetivo'];
        $alcance = $registro['alcance'];
        $abierto = $registro['abierto'];
    }
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Eliminar registro</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header" style="background-color: #ea568c; color: white">
                    Realmente desea eliminar el registro?
                </div>
                <div class="card-body">
                    <form action="controller_delete.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Empleado</label>
                                    <input type="text" name="id_empleado" value="<?php echo $id_empleado?>" class="form-control" placeholder="Ingrese solo los nombres..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Objetivo</label>
                                    <input type="text" name="objetivo" value="<?php echo $objetivo?>" class="form-control" placeholder="Ingrese solo los apellidos..." disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Alcance</label>
                                    <input type="email" name="alcance" value="<?php echo $alcance?>" class="form-control" placeholder="Ingrese su correo" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <center>
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
                        </center>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include('../../layout/admin/footer.php') ?>

