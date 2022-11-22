<?php
date_default_timezone_set('America/Mexico_City');
include "includes/function/sessionadmin.php";
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once 'admin/templates/header.php';
  ?>
    <title>ADN | Búsqueda Avanzada</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/app.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
    include_once 'admin/templates/navbar.php';
    include_once 'admin/templates/sidebar.php';
    ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-m-12">
                            <h1>Búsqueda Avanzada - Resultados de Procesos Administrativos</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Filtros de Búsqueda</h3>
                    </div>
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <select class="form-control" name="giro" id="giro" onchange="exportCSV();">
                                    <option value="">Giro</option>
                                    <option value="Industrial">Industrial</option>
                                    <option value="Comercio">Comercio</option>
                                    <option value="Servicios">Servicios</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select class="form-control" name="antiguedad" id="antiguedad" onchange="exportCSV();">
                                    <option value="">Antiguedad</option>
                                    <option value="Menos de 1 año">Menos de 1 año</option>
                                    <option value="1 a 5 años">1 a 5 años</option>
                                    <option value="6 a 10 años">6 a 10 años</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select class="form-control" name="colaboradores" id="colaboradores"
                                    onchange="exportCSV();">
                                    <option value="">Colaboradores</option>
                                    <option value="Micro (1 a 10)">Micro (1 a 10)</option>
                                    <option value="Pequeña (11 a 50)">Pequeña (11 a 50)</option>
                                    <option value="Mediana (51 a 250)">Mediana (51 a 250)</option>
                                    <option value="Grande (+ 250)">Grande (+ 250)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <select class="form-control" name="pais" id="pais" onchange="exportCSV();">
                                    <option value="">Pais</option>
                                    <option value="México">México</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control" name="estado" id="estado" placeholder="Estado"
                                    onchange="exportCSV();">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Ciudad"
                                    onchange="exportCSV();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <button class="btn btn-outline-info btn-block" type="button" name="busqueda"
                            onclick="load(1);">Realizar Búsqueda</button>
                            </div>
                            <div class="col-md-6">
                                <form action="export.php" method="POST">
                                    <input type="hidden" name="action" id="action" value="export">
                                    <input type="hidden" name="Expgiro" id="Expgiro">
                                    <input type="hidden" name="Expantiguedad" id="Expantiguedad">
                                    <input type="hidden" name="Expcolaboradores" id="Expcolaboradores">
                                    <input type="hidden" name="Exppais" id="Exppais">
                                    <input type="hidden" name="Expestado" id="Expestado">
                                    <input type="hidden" name="Expciudad" id="Expciudad">
                                    <button type="submit" class="btn btn-outline-success btn-block">Exportar</button>
                                </form>
                            </div>
                        </div>
                        <br>

                        <div class="datos_ajax">

                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <?php
    include_once 'admin/templates/footer.php';
    ?>
    </div>
</body>

</html>