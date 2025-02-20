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
                        <h1 class="m-0">Registro de un nuevo Proceso</h1>
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Código</label>
                                        <input type="text" name="codigo" class="form-control" placeholder="Ingrese un código alfanumérico" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tipo</label>
                                        <select name="tipo" id="" class="form-control">
                                            <option value="Operativo">Operativo</option>
                                            <option value="Gobernante">Gobernante</option>
                                            <option value="Apoyo">Apoyo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Línea</label>
                                        <select name="linea" id="" class="form-control">
                                            <option value="Minorista">Minorista</option>
                                            <option value="Tradicional">Tradicional</option>
                                            <option value="Microfinanzas">Microfinanzas</option>
                                            <option value="Tesasería">Tesasería</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre</label><span style="color: red;">*</span>
                                        <input type="text" name="nombre" class="form-control" placeholder="Ingrese el nombre del proceso" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Area</label>
                                        <input type="text" name="area" class="form-control" placeholder="Ingrese el nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Responsable</label>
                                        <table>
                                            <tr>
                                                <td>
                                                    <select name="responsable" id="" class="form-control">
                                                        <?php
                                                            $query_resp = $PDO->prepare('SELECT * FROM responsables');
                                                            $query_resp->execute();

                                                            $registros_resp = $query_resp->fetchAll(PDO::FETCH_ASSOC);

                                                            foreach($registros_resp as $registro){
                                                                $id_resp = $registro['id'];
                                                                $nombre_resp = $registro['nombres'];
                                                        ?>
                                                        <option value="<?php echo $nombre_resp;?>"><?php echo $nombre_resp;?></option>
                                                        <?php
                                                            }
                                                        ?>

                                                    </select>
                                                </td>
                                                <td>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
                                                        +
                                                    </button>
                                                </td>
                                            </tr>
                                        </table>
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