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
                    <h1 class="m-0">Inicio de una nueva Auditoria</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header">
                    Llene la información detallada a continuación
                </div>
                <?php
                if(isset($_SESSION['msg'])){
                    //$respuesta = $_SESSION['msg'];?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            position: 'top-end',
                            title: 'CACPE - SAI',
                            text: '<?php echo $_SESSION['msg'];?>',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    </script>

                    <?php
                    unset($_SESSION['msg']);
                }
                ?>
                <div class="card-body">
                    <form action="controller_create.php" method="post">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label for="id_empleado">Empleado</label>
                                    <select name="id_empleado" id="id_empleado" class="form-control">
                                        <?php
                                        $query_emp = $PDO->prepare('SELECT * FROM usuario');
                                        $query_emp->execute();

                                        $registros_emp = $query_emp->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($registros_emp as $registro){
                                            $id_empleado = $registro['id'];
                                            $nombre_resp = $registro['nombres'] . " " . $registro['apellidos'];
                                            ?>
                                            <option value="<?php echo $id_empleado;?>"><?php echo $nombre_resp;?></option>
                                            <?php
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
                                    <textarea name="objetivo" id="objetivo" cols="30" rows="5" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alcance">Alcance</label><span style="color: red;">*</span>
                                    <textarea name="alcance" id="alcance" cols="30" rows="5" class="form-control" required></textarea>
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
