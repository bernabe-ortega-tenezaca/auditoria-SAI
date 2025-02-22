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
                    <h1 class="m-0">Listado de procesos</h1>
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
                        <div class="card-header">Procesos</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="listado" class="table table-bordered table-striped small">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Código</th>
                                        <th>Tipo</th>
                                        <th>Linea</th>
                                        <th>Nombre</th>
                                        <th>Area</th>
                                        <th>Responsable</th>
                                        <th>Creado</th>
                                        <th> <centered>Acciones</centered> </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
                                    $query = $PDO->prepare('SELECT * FROM proceso');
                                    $query->execute();

                                    $registros = $query->fetchAll(PDO::FETCH_ASSOC);
                                    $total = $query->rowCount();

                                    foreach($registros as $registro){
                                        $codigo = $registro['codigo'];
                                        $contador = $contador + 1;
                                        $tipo = $registro['tipo'];
                                        $linea = $registro['linea'];
                                        $nombre = $registro['nombre'];
                                        $area = $registro['area'];
                                        $responsable = $registro['responsable'];
                                        $creado = date("Y-m-d", strtotime($registro['created_at']));
                                        ?>
                                        <tr>
                                            <td><?php echo $contador;?></td>
                                            <td><?php echo $codigo;?></td>
                                            <td><?php echo $tipo;?></td>
                                            <td><?php echo $linea;?></td>
                                            <td><?php echo $nombre;?></td>
                                            <td><?php echo $area;?></td>
                                            <td><?php echo $responsable;?></td>
                                            <td><?php echo $creado;?></td>
                                            <td>
                                                <div class="text-center">
                                                    <a href="edit.php?id=<?php echo $codigo;?>" class="btn btn-outline-success btn-sm" title="Editar"><i class="fas fa-pen"></i></a>
                                                    <a href="delete.php?id=<?php echo $codigo;?>" class="btn btn-outline-danger btn-sm" title="Borrar"><i class="fas fa-trash"></i></a>
                                                </div>
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

