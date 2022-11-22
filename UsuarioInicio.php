<?php
date_default_timezone_set('America/Mexico_City');
include "includes/function/session.php";
?>
<!DOCTYPE html>
<html>
<head>
  <?php
    include_once 'usuario/templates/header.php';
  ?>
  <title>Perfil | Inicio</title>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php
    include_once 'usuario/templates/navbar.php';
    include_once 'usuario/templates/sidebar.php';
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
          <div class="card-body">
            ¡Bienvenido a adn empresarial!
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    
    <?php
    include_once 'usuario/templates/footer.php';
    ?>
  </div>
</body>
</html>