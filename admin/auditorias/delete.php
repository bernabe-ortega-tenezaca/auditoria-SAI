<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php
    include('../../layout/admin/header.php');
    $id_get = $_GET['id'];
    $empleado = $_GET['empleado'];

    $query = $PDO->prepare("SELECT * FROM auditoria_interna WHERE id='$id_get'");
    $query->execute();

    $registros = $query->fetchAll(PDO::FETCH_ASSOC);

    $id_empleado = "";
    $objetivo = "";
    $alcance = "";

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
                            <input type="text" name="id_post" id="id_post" class="form-control" value="<?php echo $id;?>" hidden>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="empleado">Empleado </label>
                                    <input type="text" name="empleado" value="<?php echo $empleado;?>" class="form-control" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="objetivo">Objetivo</label><span style="color: red;">*</span>
                                    <textarea name="objetivo" id="objetivo" cols="30" rows="5" class="form-control" disabled><?php echo $objetivo;?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alcance">Alcance</label><span style="color: red;">*</span>
                                    <textarea name="alcance" id="alcance" cols="30" rows="5" class="form-control" disabled><?php echo $alcance;?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <a href="<?php echo $URL."/admin/auditorias";?>" class="btn btn-default btn-block">Cancelar</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center"></div>
                                        <button type="submit" onclick="return confirm('Realmente desea eliminar la información?')" class="btn btn-primary btn-block">Eliminar registro</button>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

    <?php include('../../layout/admin/footer.php') ?>

