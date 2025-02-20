<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php
    include('../../layout/admin/header.php');
    //$noAuditoria = $_GET['id'];
    //$noProceso = $_GET['id_proceso'];
    $noAuditoria = '1';
    $noProceso = '1';

    $sentencia = $PDO->prepare("SELECT
                                                usuario.nombres, usuario.apellidos, usuario.correo,
                                                auditoria.objetivo,
                                                auditoria.alcance,
                                                auditoria.created_at
                                        FROM
                                            Usuario AS usuario
                                            INNER JOIN auditoria_interna AS auditoria ON usuario.id = auditoria.id_empleado
                                        WHERE
                                            auditoria.id = $noAuditoria");
    $sentencia->execute();
    $resultado = $sentencia->fetch();

    $nombres = $resultado['nombres'];
    $apellidos = $resultado['apellidos'];
    $correo = $resultado['correo'];
    $objetivo = $resultado['objetivo'];
    $alcance = $resultado['alcance'];
    $created_at = $resultado['created_at'];
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Auditoria Registrada</h1>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <b>Auditoria</b> <?=$noAuditoria . " - fecha de creación ". $created_at?>
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

                        <div class="row small">
                            <table class="table table-hover table-bordered table-striped table-striped" style="background-color: #FFFFFF">
                                <thead>
                                <tr>
                                    <td scope="col"><b>Funcionario</b></td>
                                    <td scope="col"><?php echo $nombres ." ". $apellidos . "<br/><small>" . $correo . "</small>";?></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="col"><b>Objetivo</b></th>
                                    <td scope="col"><?php echo $objetivo;?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><b>Alcance</b></th>
                                    <td scope="col"><?php echo $alcance;?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="table-responsive small">
                                <table class="table table-hover table-bordered table-striped small" style="background-color: #FFFFFF">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nivel de criticidad de riesgo asociados al proceso <b>30% </b></th>
                                            <td>Riesgo Bajo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Importancia estratégica del proceso <b>20% </b></th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Expectativas de la alta Gerencia / Órganos de Gobierno <b>20% </b></th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Hallazgo y/o oportunidades ( alto y media) de AI Y AEXT SEPS <b>15% </b></th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Fecha de Última AuditorÍa y/o inicio del ciclo de rotación <b>15% </b></th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Requerimientos Normativos Para la Auditoria Interna <b>50% </b></th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Nivel de riesgos AI</th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Actividad de control propuesta</th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Fecha de corte</th>
                                            <td>2021-05-25</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Fecha de inicio</th>
                                            <td>2021-05-25</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Fecha de fin</th>
                                            <td>2021-05-25</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Entregable</th>
                                            <td>De apoyo</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">Recursos</th>
                                            <td>De apoyo apoyo apoyo apoyo apoyo apoyo apoyo apoyo apoyo apoyo apoyo apoyo apoyo apoyo </td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="table-resposive small">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>No</th>
                                            <th>Documento</th>
                                            <th>Fecha de creacion</th>
                                            <th>Acciones</th>
                                        </thead>
                                        <tbody>
                                            <td>1</td>
                                            <td>asistencia.df</td>
                                            <td>2025-01-01</td>
                                            <td>Eliminar Actualizar</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group  col-md-6">
                                <div class="small">
                                    <label for="">Archivo</label>
                                    <input type="file" class="form-control">
                                </div>
                                <div class="small">
                                    acciones
                                </div>
                            </div>
                        </div>
                        <hr class="border border-primary border-3 opacity-75">
                        <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-4">
                                <center>
                                    <a href="<?php echo $URL."/admin/";?>" class="btn btn-default btn-block">Regresar</a>
                                </center>
                            </div>
                            <div class="col-md-4">
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

<script>
    new DataTable('#detalle', {
        fixedColumns: true,
        paging: false,
        searching: false,
        scrollCollapse: true,
        scrollX: true,
        scrollY: 300
    });
</script>

<!--Código para visualizar imagem-->
<script>
    function arquivo(evt){
        var files = evt.target.files;
        for(var i = 0, f; f = files[i]; i++) {
            if(!f.type.match('image.*')) {
                continue;
            }
            var reader = new FileReader();
            reader.onload = (function(theFile){
                return function(e){
                    document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="',e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
}
document.getElementById("file").addEventListener('change', arquivo, false);

</script>