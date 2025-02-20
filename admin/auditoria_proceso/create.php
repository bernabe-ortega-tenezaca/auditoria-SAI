<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php
    include('../../layout/admin/header.php');
    $noAuditoria = $_GET['id'];
    $objetivo = $_GET['objetivo'];
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registro Procesos de Auditoria</h1>
                </div>
            </div>

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
                        <input type="text" name="noAuditoria" class="form-control" value='<?=$noAuditoria ?>' hidden>

                        <div class="row">
                            <table class="table table-hover table-bordered table-striped" style="background-color: #FFFFFF">
                                <thead>
                                    <tr>
                                        <th scope="col">Auditoria</th>
                                        <th scope="col">Objetivo</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <tr>
                                        <td><?=$noAuditoria;?></td>
                                        <td><?=$objetivo;?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="border border-primary border-3 opacity-75">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nivel de criticidad</label>
                                    <select name="nivelCriticidad" id="" class="form-control">
                                        <option value="riesgoBajo">Riesgo Bajo</option>
                                        <option value="riesgoModerado">Riesgo Moderado</option>
                                        <option value="riesgoAlto">Riesgo Alto</option>
                                        <option value="riesgoExterno">Riesgo Externo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Importancia</label>
                                    <select name="importancia" id="" class="form-control">
                                        <option value="De apoyo">De apoyo</option>
                                        <option value="Riesgo operativo">Riesgo operativo</option>
                                        <option value="Estrategicos">Estrategicos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Expectativa</label>
                                    <select name="expectativa" id="" class="form-control">
                                        <option value="No se presentan expectativa">No se presentan expectativas</option>
                                        <option value="Gerencia de área">Gerencia de área</option>
                                        <option value="Gerencia">Gerencia</option>
                                        <option value="Órganos de gobierno">Órganos de gobierno</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Hallazgo</label>
                                    <select name="hallazgo" id="" class="form-control">
                                        <option value="Hallazgo bajo">Hallazgo bajo</option>
                                        <option value="Hallazgo medio">Hallazgo medio</option>
                                        <option value="Hallazgo alto">Hallazgo alto</option>
                                        <option value="Hallazgo externo">Hallazgo externo</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de última auditoria</label>
                                    <select name="fUltimaAuditoria" id="" class="form-control">
                                        <option value="Menor a un año">Menor a un año</option>
                                        <option value="Entre 1 y 2 años">Entre 1 y 2 años</option>
                                        <option value="Entre 3 y 4 años">Entre 3 y 4 años</option>
                                        <option value="Mayor a 5 años">Mayor a 5 años</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                               <div class="form-group">
                                    <label for="">Requisitos normativos</label>
                                    <select name="reqNormativos" id="" class="form-control">
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                    </select>
                               </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nivel de riesgo</label>
                                    <select name="nivelRiesgo" id="" class="form-control">
                                        <option value="Muy bajo">Muy bajo</option>
                                        <option value="Bajo">Bajo</option>
                                        <option value="Medio">Medio</option>
                                        <option value="Alto">Alto</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Actividades realizadas en la Auditoria</label>
                                    <textarea name="actividadControl" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de corte</label>
                                    <input type="date" name="fCorte" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de inicio</label>
                                    <input type="date" name="fInicio" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de fin</label>
                                    <input type="date" name="fFin" class="form-control">
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Entregables</label>
                                    <input type="text" name="entregables" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Recursos</label>
                                    <input type="text" name="recursos" class="form-control">
                                </div>
                            </div>
                        </div>
                        <hr class="border border-primary border-3 opacity-75">
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
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include('../../layout/admin/footer.php') ?>
