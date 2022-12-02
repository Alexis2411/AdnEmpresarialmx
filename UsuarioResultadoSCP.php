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
  <title>Perfil | Resultados</title>
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
        <div class="container-fluid text-center">
          <h1> Solución Creativa de Problemas </h1>
        </div><!-- /.container-fluid -->
      </section>

      <!--S Main content -->
      <!-- Main content -->
        <section class="content">
            <div class="row">
                    <?php
                        include "includes/function/funciones.php";
                        $passed = "badge-success";
                        $mediumPassed = "badge-warning";
                        $noPassed = "badge-danger";
                    ?>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="accordion">
                        <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                        <div class="col-md-12">
                            <div class="card card-default" style="background:#b3e5fc;">
                                <div class="card-header">
                                    <a class="card-title text-dark" data-toggle="collapse" data-target="#collapseOne" aria-expanded="True" aria-controls="collapseOne" data-parent="#accordion" href="#collapseOne">
                                    <strong><i class="fas fa-plus-circle text-dark"></i> Diagnostico </strong> 
                                    </a>
                                    <h3>
                                        <?php
                                        $complete = scoreSeccion(11);
                                        $result1 = $complete -> fetch_assoc();
                                            if($result1["total"] < 1){
                                                $result1["total"] = 0;
                                            }
                                        ?>

                                        <span class="badge
                                        <?php
                                            if($result1["total"]/2 <= 101){
                                                echo $noPassed;
                                            }elseif ($result1["total"]/2 > 101 && $result1["total"]/2 < 113){
                                                echo $mediumPassed;
                                            }elseif ($result1["total"]/2 >= 114){
                                                echo $passed;
                                            }
                                        ?>
                                        float-right">

                                            <?php echo $result1["total"]/2; ?>
                                             / 132
                                        </span>


                                    </h3>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                    <table class="table table-striped table-light">
                                        <thead class="table-dark text-center">
                                          <tr>
                                              <th scope="col">BLOQUE</th>
                                              <th scope="col" class="bg-danger">Cuartil Inferior</th>
                                              <th scope="col" class="bg-warning">Media</th>
                                              <th scope="col" class="bg-success">Cuartil Superior</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 30);
                                              $p1 = $bloque -> fetch_assoc();
                                              ?>
                                                  <tr>
                                                    <td>
                                                       Solución analítica de problemas
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $valor = ($p1["valor"] < 1 ? '0' :  $p1["valor"]);
                                                        if ( $valor/2 <= 23){
                                                            echo '&#9679;';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $valor = $p1["valor"] < 1 ? '0' :  $p1["valor"];
                                                        if ( $valor/2 > 23 && $valor/2 < 26){
                                                            echo '&#9679;';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $valor = $p1["valor"] < 1 ? '0' :  $p1["valor"];
                                                        if ( $valor/2 >= 26){
                                                            echo '&#9679;';
                                                        }
                                                        ?>
                                                    </td>
                                                  </tr>
                                          <?php
                                          $bloque = bloqueScore($_SESSION['usuario'], 31);
                                          $p2 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Solución creativa de problemas</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p2["valor"] < 1 ? '0' :  $p2["valor"];
                                                    if ( $valor/2 <= 46){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p2["valor"] < 1 ? '0' :  $p2["valor"];
                                                    if ( $valor/2 > 46 && $valor/2 < 52){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p2["valor"] < 1 ? '0' :  $p2["valor"];
                                                    if ( $valor/2 >= 52){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                          <?php
                                          $bloque = bloqueScore($_SESSION['usuario'], 32);
                                          $p3 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>
                                                Fomento de la creatividad
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p3["valor"] < 1 ? '0' :  $p3["valor"];
                                                    if ( $valor/2 <= 32){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p3["valor"] < 1 ? '0' :  $p3["valor"];
                                                    if ( $valor/2 > 8 && $valor/2 < 36){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p3["valor"] < 1 ? '0' :  $p3["valor"];
                                                    if ( $valor/2 >= 36){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="col-md-12">
                        <?php
                            $total = $result1["total"]/2;
                        ?>
                      <div class="card card-default
                      <?php
                        if($total <= 101){
                            echo $noPassed;
                        }else if($total > 101 && $total < 114){
                            echo $mediumPassed;
                        }else if($total >= 114){
                            echo $passed;
                        }

                      ?>

                        ">
                        <div class="card-header text-light text-center">
                          <h1>
                              <strong><i class="fas fa-award"></i>  PUNTUACIÓN TOTAL:
                                  <?php
                                    echo $total;?> / 132
                              </strong>
                          </h1>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- END ALERTS AND CALLOUTS -->
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