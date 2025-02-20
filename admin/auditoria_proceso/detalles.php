<?php
    include('../../app/config/config.php');
    include('../../app/config/conexion.php');
    include('../../layout/admin/sesion.php');
    include('../../layout/admin/datos_session_user.php');
?>

<?php
    include('../../layout/admin/header.php');
    $noAuditoria = $_GET['id'];

    $sentencia = $PDO->prepare("SELECT usuario.nombres, usuario.apellidos, usuario.correo, auditoria.objetivo, auditoria.alcance, auditoria.created_at FROM Usuario AS usuario INNER JOIN auditoria_interna AS auditoria ON usuario.id = auditoria.id_empleado WHERE auditoria.id = $noAuditoria");
    $sentencia ->execute();
    $resultado = $sentencia->fetch();

    $nombres = $resultado['nombres'];
    $apellidos = $resultado['apellidos'];
    $correo = $resultado['correo'];
    $objetivo = $resultado['objetivo'];
    $alcance = $resultado['alcance'];
    $created_at = date("Y-m-d", strtotime($resultado['created_at']));

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><b>Auditoria</b> <?=$noAuditoria . " - fecha de creación ". $created_at?></h1>
                </div>
            </div>

            <div class="card">
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
                            <table class="table table-hover table-bordered table-striped table-striped small" style="background-color: #FFFFFF">
                                <thead>
                                <tr>
                                    <th scope="col"><b>Funcionario</b></th>
                                    <td><b><?php echo $nombres ." ". $apellidos . "</b><small>" . " - ". $correo . "</small>";?></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="col"><b>Objetivo</b></th>
                                    <td><?php echo $objetivo;?></td>
                                </tr>
                                <tr>
                                    <th scope="col"><b>Alcance</b></th>
                                    <td><?php echo $alcance;?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                        <div class="row">
                            <div class="table-responsive small">
                                <table id="detalle" class="table table-sm table-bordered" style="background-color: #FFFFFF">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="text-center align-middle">No</th>
                                        <th scope="col" class="text-center align-middle">
                                            <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                                <span style="flex: 1; border-bottom: 1px solid rgba(0, 0, 0, 0.2);">Nivel de criticidad de riesgos asociados al proceso</span>
                                                <span style="flex: 1;">30%</span>
                                            </div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                                <span style="flex: 1; border-bottom: 1px solid rgba(0, 0, 0, 0.2);">Importancia estratégica del proceso</span>
                                                <span style="flex: 1;">20%</span>
                                            </div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                                <span style="flex: 1; border-bottom: 1px solid rgba(0, 0, 0, 0.2);">Expectativas de la alta Gerencia / Órganos de Gobierno</span>
                                                <span style="flex: 1;">20%</span>
                                            </div>
                                        </th>
                                        <th scope="col" >
                                            <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                                <span style="flex: 1; border-bottom: 1px solid rgba(0, 0, 0, 0.2);">Hallazgo y/o oportunidades ( alto y media) de AI Y AEXT SEPS</span>
                                                <span style="flex: 1;">15%</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="text-center align-middle">
                                            <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                                <span style="flex: 1; border-bottom: 1px solid rgba(0, 0, 0, 0.2);">Fecha de Última AuditorÍa y/o inicio del ciclo de rotación</span>
                                                <span style="flex: 1;">15%</span>
                                            </div>
                                        </th>
                                        <th scope="col">
                                            <div class="d-flex flex-column justify-content-between" style="height: 100%;">
                                                <span style="flex: 1; border-bottom: 1px solid rgba(0, 0, 0, 0.2);">Requerimientos Normativos Para la Auditoria Interna</span>
                                                <span style="flex: 1;">50%</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="text-center align-middle">Nivel de riesgos AI</th>
                                        <th scope="col" class="text-center align-middle">Actividad de Control propuesta</th>
                                        <th scope="col" class="text-center align-middle">Fecha corte</th>
                                        <th scope="col" class="text-center align-middle">Fecha inicio</th>
                                        <th scope="col" class="text-center align-middle">Fecha fin</th>
                                        <th scope="col" class="text-center align-middle">Entregable</th>
                                        <th scope="col" class="text-center align-middle">Recursos</th>
                                    </tr>
                                    </thead>
                                    <tbody class="table-group-divider ">
                                    <?php
                                    $contador = 0;
                                    $query = $PDO->prepare('SELECT procesos.id, procesos.nivelCriticidad,
                                            procesos.importancia, procesos.expectativa, procesos.hallazgo, procesos.fUltimaAuditoria,
                                            procesos.reqNormativos, procesos.nivelRiesgo, procesos.actividadControl, procesos.fCorte,
                                            procesos.fInicio, procesos.fFin,procesos.entregables, procesos.recursos  
                                            FROM auditoria_interna AS auditoria INNER JOIN auditoria_procesos AS procesos ON auditoria.id = procesos.noAuditoria WHERE auditoria.id = :noAuditoria');
                                    $query->execute(array('noAuditoria' => $noAuditoria));
                                    $query->execute();

                                    $procesos = $query->fetchAll(PDO::FETCH_ASSOC);
                                    $total = $query->rowCount();

                                    foreach($procesos as $proceso){
                                        $id = $proceso['id'];
                                        $contador = $contador + 1;
                                        $nivelCriticidad = $proceso['nivelCriticidad'];;
                                        $importancia = $proceso['importancia'];
                                        $expectativa = $proceso['expectativa'];
                                        $hallazgo = $proceso['hallazgo'];
                                        $fUltimaAuditoria = $proceso['fUltimaAuditoria'];
                                        $regNormativos = $proceso['reqNormativos'];
                                        $nivelRiesgo = $proceso['nivelRiesgo'];
                                        $actividadControl = $proceso['actividadControl'];
                                        $fCorte = $proceso['fCorte'];
                                        $fInicio = $proceso['fInicio'];
                                        $fFin = $proceso['fFin'];
                                        $entregables = $proceso['entregables'];
                                        $recursos = $proceso['recursos'];
                                        ?>
                                        <tr>
                                            <td class="text-center"><?=$contador;?></td>
                                            <td><?=$nivelCriticidad;?></td>
                                            <td><?=$importancia;?></td>
                                            <td><?=$expectativa;?></td>
                                            <td><?=$hallazgo;?></td>
                                            <td><?=$fUltimaAuditoria;?></td>
                                            <td><?=$regNormativos;?></td>
                                            <td><?=$nivelRiesgo;?></td>
                                            <td><?=$actividadControl;?></td>
                                            <td><?=$fCorte;?></td>
                                            <td><?=$fInicio;?></td>
                                            <td><?=$fFin;?></td>
                                            <td><?=$entregables;?></td>
                                            <td><?=$recursos;?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="border border-primary border-3 opacity-75">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <center>
                                    <a href="<?php echo $URL."/admin/auditorias/";?>" class="btn btn-primary btn-block">Aceptar</a>
                                </center>
                            </div>
                            <div class="col-md-4">
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>

<?php include('../../layout/admin/footer.php') ?>


    <script>
        $(function(){
            $("#detalle").DataTable({
                "responsive": true,
                "autoWidth": false,
                "paging": false,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %ds fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir",
                        "renameState": "Cambiar nombre",
                        "updateState": "Actualizar",
                        "createState": "Crear Estado",
                        "removeAllStates": "Remover Estados",
                        "removeState": "Remover",
                        "savedStates": "Estados Guardados",
                        "stateRestore": "Estado %d"
                    },
                }
            }).buttons().container().appendTo('#listado_wrapper .col-md-6:eq(0)');
        });
    </script>
