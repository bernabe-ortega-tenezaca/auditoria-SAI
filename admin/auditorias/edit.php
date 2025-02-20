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

    $query = $PDO->prepare('SELECT * FROM auditoria_interna WHERE id=:id_get');
    $query->bindParam(':id_get', $id_get, PDO::PARAM_INT);
    $query->execute();

    $registros = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($registros as $registro) {
        $id = $registro['id'];
        $id_empleado = $registro['id_empleado'];
        $objetivo = $registro['objetivo'];
        $alcance = $registro['alcance'];
    }
    ?>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edición de auditoria</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->

                <div class="card">
                    <div class="card-header" style="background-color: #8ec07c; color: white">
                        Llene la información detallada a continuación
                    </div>
                    <div class="card-body">
                        <form action="controller_edit.php" method="post">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="id" value="<?php echo $id;?>" hidden>
                                        <label for="id_empleado">Empleado</label>
                                        <select name="id_empleado" id="id_empleado" class="form-control">
                                            <?php
                                            $query_emp = $PDO->prepare('SELECT * FROM usuario');
                                            $query_emp->execute();

                                            $registros_emp = $query_emp->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($registros_emp as $registro_emp) {
                                                $id_empleado_opt = $registro_emp['id'];
                                                $nombre_resp = $registro_emp['nombres'] . " " . $registro_emp['apellidos'];
                                                $selected = ($id_empleado_opt == $id_empleado) ? 'selected' : '';
                                                echo "<option value='$id_empleado_opt' $selected>$nombre_resp</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="objetivo">Objetivo</label><span style="color: red;">*</span>
                                        <textarea name="objetivo" id="objetivo" cols="30" rows="5" class="form-control" required><?php echo $objetivo;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alcance">Alcance</label><span style="color: red;">*</span>
                                        <textarea name="alcance" id="alcance" cols="30" rows="5" class="form-control" required><?php echo $alcance;?></textarea>
                                    </div>
                                </div>
                            </div>
                            <center>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-4">
                                        <center>
                                            <a href="<?php echo $URL."/admin/auditorias/";?>" class="btn btn-default btn-block">Cancelar</a>
                                        </center>
                                    </div>
                                    <div class="col-md-4">
                                        <center>
                                            <button type="submit" onclick="return confirm('Revise la información antes de enviar')" class="btn btn-primary btn-block">Registrar proceso</button>
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
