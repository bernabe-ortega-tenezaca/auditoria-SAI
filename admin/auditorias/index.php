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
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de auditorias</h1>
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
                    <br>
                    <div class="card card-blue">
                        <div class="card-header">Auditoriaas</div>
                        <div class="card-body">
                            <div class="table-responsive small">
                                <table id="listado" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Empleado</th>
                                        <th>Objetivo</th>
                                        <th>Alcance</th>
                                        <th>Creado</th>
                                        <th> <centered>Detalles</centered></th>
                                        <th> <centered>Acciones</centered> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
                                    $query = $PDO->prepare(' SELECT audit.id, audit.id_empleado,	audit.objetivo, audit.alcance, audit.abierto, audit.created_at, `user`.apellidos, `user`.nombres 
                                                                   FROM auditoria_interna AS audit 
                                                                   INNER JOIN usuario AS `user`	ON audit.id_empleado = `user`.id');
                                    $query->execute();

                                    $registros = $query->fetchAll(PDO::FETCH_ASSOC);
                                    $total = $query->rowCount();

                                    foreach($registros as $registro){
                                        $id = $registro['id'];
                                        $contador = $contador + 1;
                                        $empleado = $registro['apellidos'] . ' ' . $registro['nombres'];
                                        $id_empleado = $registro['id_empleado'];
                                        $objetivo = $registro['objetivo'];
                                        $alcance = $registro['alcance'];
                                        $abierto = $registro['abierto'];
                                        $creado_at = date("Y-m-d", strtotime($registro['created_at']));
                                        ?>
                                        <tr>
                                            <td><?php echo $contador;?></td>
                                            <td><?php echo $empleado;?></td>
                                            <td><?php echo $objetivo;?></td>
                                            <td><?php echo $alcance;?></td>
                                            <td><?php echo $creado_at;?></td>
                                            <td class="text-center">
                                                <a href="../auditoria_proceso/detalles.php?id=<?php echo $id;?>" class="btn btn-outline-primary btn-sm" title="Ver">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="../auditoria_proceso/create.php?id=<?php echo $id;?>&objetivo=<?php echo $objetivo;?>" class="btn btn-outline-primary btn-sm" title="Procesos"><i class="fa fa-tasks" aria-hidden="true"></i></a>
                                                <a href="edit.php?id=<?php echo $id;?>" class="btn btn-outline-success btn-sm" title="Editar"><i class="fas fa-edit"></i></a>
                                                <a href="delete.php?id=<?php echo $id;?>&empleado=<?php echo $empleado?>" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
<?php include('../../layout/admin/footer.php') ?>
<script>
    $(function(){
        $("#listado").DataTable({
            "responsive": true,
            "autoWidth": false,
            "paging": true,
            "lengthChange": true,
            "searching": true,
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
