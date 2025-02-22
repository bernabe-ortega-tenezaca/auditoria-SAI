<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
    include('../../layout/admin/header.php');

    $id_get = $_GET['id'];

    $query = $PDO->prepare("SELECT * FROM proceso WHERE codigo =:codigo");
    $query->bindParam(':codigo', $id_get);
    $query->execute();

    $registro = $query->fetch(PDO::FETCH_ASSOC);

    if ($registro) {
        $tipo = $registro['tipo'];
        $linea = $registro['linea'];
        $nombre = $registro['nombre'];
        $area = $registro['area'];
        $responsable = $registro['responsable'];
        $create_at = $registro['created_at'];
    }
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edición de Proceso</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->

            <div class="card">
                <div class="card-header" style="background-color: #ea568c; color: white">
                    Precaución, el siguiente registro esta listo para borrarse.
                </div>
                <?php
                if (isset($_SESSION['msg'])): ?>
                    <script>
                        Swal.fire({
                            icon: 'success',
                            position: 'top-end',
                            title: 'CACPE - SAI',
                            text: '<?php echo $_SESSION['msg']; ?>',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>
                    <?php unset($_SESSION['msg']); ?>
                <?php endif; ?>
                <div class="card-body">
                    <form action="controller_delete.php" method="post">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" name="id_post" class="form-control" value="<?php echo $id_get;?>" hidden>
                                    <label for="tipo">Tipo</label>
                                    <input type="text" name="tipo" value="<?php echo $tipo; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=linea"">Línea</label>
                                    <input type="text" value="<?php echo $linea; ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre</label><span style="color: red;">*</span>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Area</label>
                                    <input type="text" name="area" class="form-control" value="<?php echo $area; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Responsable

                                    </label><input type="text" class="form-control" value="<?php echo $responsable; ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <a href="<?php echo $URL."/admin/procesos/";?>" class="btn btn-default btn-block">Cancelar</a>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="text-center">
                                        <button type="submit" onclick="return confirm('Revise la información antes de enviar')" class="btn btn-primary btn-block">Eliminar proceso</button>
                                    </div>
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

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Registro de responsables</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="controller_responsable.php" method="post">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <input type="text" name="nombre_res" class="form-control" placeholder="Ingrese los apellidos y nombres" required>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Registrar responsable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
