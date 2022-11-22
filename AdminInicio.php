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
  <title>ADN | Inicio</title>
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
            <div class="col-sm-6">
              <h1>Inicio</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h1 class="card-title text-center">Bienvenido</h1>
          </div>
          <div class="card-body">
            Hola! Este es tu perfil de administrador. <br>
            Recuerda que aquí podrás ver los registros de quienes han contestado la encuesta, y de igual manera, poder ver sus resultados para poder exportarlo a excel si así lo deseas. <br>
            
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