<?php
date_default_timezone_set('America/Mexico_City');
include "includes/function/sessionadmin.php";
include "includes/function/funciones.php";
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include_once 'admin/templates/header.php';
    ?>
    <title>ADN | Registros</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="js/dashboard.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <?php
    include_once 'admin/templates/navbar.php';
    include_once 'admin/templates/sidebar.php';
    include_once 'includes/function/paginacion.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div>
                        <h1 class="align-items-center"><strong> REGISTROS </strong></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive">
                                <div id="loader" class="text-center"> <img src="img/loader.gif"></div>
		                        <div class="outer_div"></div><!-- Datos ajax Final -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once 'admin/templates/footer.php';
    ?>
    <!-- ./wrapper -->



</body>

</html>