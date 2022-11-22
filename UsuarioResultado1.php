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
          <h1> Indicador de gesión del proceso administrativo</h1>
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
                                    <strong><i class="fas fa-plus-circle text-dark"></i>  Sección I. Planeación</strong> 
                                    </a>
                                    <h3>
                                        <?php
                                        $complete = scoreSeccion(1);
                                        $result1 = $complete -> fetch_assoc();
                                            if($result1["total"] < 1){
                                                $result1["total"] = 0;
                                            }
                                        ?>

                                        <span class="badge
                                        <?php
                                            if($result1["total"] <= 126){
                                                echo $noPassed;
                                            }elseif ($result1["total"] >= 130.2 && $result1["total"] <= 289.8){
                                                echo $mediumPassed;
                                            }elseif ($result1["total"] >= 294){
                                                echo $passed;
                                            }
                                        ?>
                                        float-right">

                                            <?php echo $result1["total"]; ?>
                                             / 420
                                        </span>


                                    </h3>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                    <table class="table table-striped table-light">
                                        <thead class="table-dark text-center">
                                          <tr>
                                              <th scope="col">BLOQUE</th>
                                              <th scope="col" class="bg-danger">30%-</th>
                                              <th scope="col" class="bg-warning">31%-69%</th>
                                              <th scope="col" class="bg-success">70%+</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 1);
                                              $p1 = $bloque -> fetch_assoc();
                                              ?>
                                                  <tr>
                                                    <td>
                                                        Bloque 1.1 - Misión.
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $valor = $p1["valor"] < 1 ? '0' :  $p1["valor"];
                                                        if ( $valor <= 15){
                                                            echo '&#9679;';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $valor = $p1["valor"] < 1 ? '0' :  $p1["valor"];
                                                        if ( $valor >= 15.1 && $valor <= 34.5){
                                                            echo '&#9679;';
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $valor = $p1["valor"] < 1 ? '0' :  $p1["valor"];
                                                        if ( $valor >= 34.6){
                                                            echo '&#9679;';
                                                        }
                                                        ?>
                                                    </td>
                                                  </tr>
                                          <?php
                                          $bloque = bloqueScore($_SESSION['usuario'], 2);
                                          $p2 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Bloque 1.2 - Visión.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p2["valor"] < 1 ? '0' :  $p2["valor"];
                                                    if ( $valor <= 15){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p2["valor"] < 1 ? '0' :  $p2["valor"];
                                                    if ( $valor >= 15.1 && $valor <= 34.5){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p2["valor"] < 1 ? '0' :  $p2["valor"];
                                                    if ( $valor >= 34.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                          <?php
                                          $bloque = bloqueScore($_SESSION['usuario'], 3);
                                          $p3 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>
                                                    Bloque 1.3. - Valores.
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p3["valor"] < 1 ? '0' :  $p3["valor"];
                                                    if ( $valor <= 9){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p3["valor"] < 1 ? '0' :  $p3["valor"];
                                                    if ( $valor >= 9.3 && $valor <= 20.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p3["valor"] < 1 ? '0' :  $p3["valor"];
                                                    if ( $valor >=20.8){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                          <?php
                                          $bloque = bloqueScore($_SESSION['usuario'], 4);
                                          $p4 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>
                                                    Bloque 1.4 - Objetivos.
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p4["valor"] < 1 ? '0' :  $p4["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p4["valor"] < 1 ? '0' :  $p4["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p4["valor"] < 1 ? '0' :  $p4["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                          $bloque = bloqueScore($_SESSION['usuario'], 5);
                                          $p5 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Bloque 1.5. - Politicas.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p5["valor"] < 1 ? '0' :  $p5["valor"];
                                                    if ( $valor <= 15){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p5["valor"] < 1 ? '0' :  $p5["valor"];
                                                    if ( $valor >= 15.1 && $valor <= 34.5){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p5["valor"] < 1 ? '0' :  $p5["valor"];
                                                    if ( $valor >= 34.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 6);
                                              $p6 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Bloque 1.6 - Procedimientos.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p6["valor"] < 1 ? '0' :  $p6["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p6["valor"] < 1 ? '0' :  $p6["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p6["valor"] < 1 ? '0' :  $p6["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 7);
                                              $p7 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Bloque 1.7 - Reglamento.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p7["valor"] < 1 ? '0' :  $p7["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p7["valor"] < 1 ? '0' :  $p7["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p7["valor"] < 1 ? '0' :  $p7["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 8);
                                              $p8 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Bloque 1.8. - Presupuesto.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p8["valor"] < 1 ? '0' :  $p8["valor"];
                                                    if ( $valor <= 9){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p8["valor"] < 1 ? '0' :  $p8["valor"];
                                                    if ( $valor >= 9.3 && $valor <= 20.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p8["valor"] < 1 ? '0' :  $p8["valor"];
                                                    if ( $valor >=20.8){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 9);
                                              $p9 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Bloque 1.9 - Programas.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p9["valor"] < 1 ? '0' :  $p9["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p9["valor"] < 1 ? '0' :  $p9["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p9["valor"] < 1 ? '0' :  $p9["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 10);
                                              $p10 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                                <td>Bloque 1.10. - Planeación estratégica.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p10["valor"] < 1 ? '0' :  $p10["valor"];
                                                    if ( $valor <= 15){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p10["valor"] < 1 ? '0' :  $p10["valor"];
                                                    if ( $valor >= 15.1 && $valor <= 34.5){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p10["valor"] < 1 ? '0' :  $p10["valor"];
                                                    if ( $valor >= 34.6){
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
                            <div class="card card-default" style="background:#4dd0e1;">
                                <div class="card-header">
                                    <a class="card-title text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" data-parent="#accordion" href="#collapseOne">
                                    <strong><i class="fas fa-plus-circle text-dark"></i>  Sección II. Organización</strong> 
                                    </a>
                                    <h3>
                                        <?php
                                        $complete = scoreSeccion(2);
                                        $result2 = $complete -> fetch_assoc();
                                        if($result2["total"] < 1){
                                            $result2["total"] = 0;
                                        }
                                        ?>
                                        <span class="badge
                                         <?php
                                            if($result2["total"] <= 54){
                                                echo $noPassed;
                                            }elseif ($result2["total"] >= 55.8 && $result2["total"] <= 124.2){
                                                echo $mediumPassed;
                                            }elseif ($result2["total"] >= 126){
                                                echo $passed;
                                            }
                                        ?>


                                         float-right">
                                              <?php echo $result2["total"]; ?> / 180
                                        </span>
                                    </h3>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse in" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                    <table class="table table-striped table-light">
                                        <thead class="table-dark text-center">
                                            <tr>
                                                <th scope="col">BLOQUE</th>
                                                <th scope="col" class="bg-danger">30%-</th>
                                                <th scope="col" class="bg-warning">31%-69%</th>
                                                <th scope="col" class="bg-success">70%+</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $bloque = bloqueScore($_SESSION['usuario'], 11);
                                            $p11 = $bloque->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td>Bloque 2.1 - División de trabajo: descripción de puestos.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p11["valor"] < 1 ? '0' :  $p11["valor"];
                                                    if ( $valor <= 15){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p11["valor"] < 1 ? '0' :  $p11["valor"];
                                                    if ( $valor >= 15.1 && $valor <= 34.5){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p11["valor"] < 1 ? '0' :  $p11["valor"];
                                                    if ( $valor >= 34.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                        <?php
                                            $bloque = bloqueScore($_SESSION['usuario'], 12);
                                            $p12 = $bloque->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td>Bloque 2.2 - División de trabajo: Jerarquización.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p12["valor"] < 1 ? '0' :  $p12["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p12["valor"] < 1 ? '0' :  $p12["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p12["valor"] < 1 ? '0' :  $p12["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $bloque = bloqueScore($_SESSION['usuario'], 13);
                                            $p13 = $bloque->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td>
                                                    Bloque 2.3. - División de trabajo: Departamentalización.
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p13["valor"] < 1 ? '0' :  $p13["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p13["valor"] < 1 ? '0' :  $p13["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p13["valor"] < 1 ? '0' :  $p13["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>

                                        <?php
                                            $bloque = bloqueScore($_SESSION['usuario'], 14);
                                            $p14 = $bloque->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td>
                                                    Bloque 2.4 - División de trabajo: Descripción de Actividades.
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p14["valor"] < 1 ? '0' :  $p14["valor"];
                                                    if ( $valor <= 9){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p14["valor"] < 1 ? '0' :  $p14["valor"];
                                                    if ( $valor >= 9.3 && $valor <= 20.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p14["valor"] < 1 ? '0' :  $p14["valor"];
                                                    if ( $valor >=20.8){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $bloque = bloqueScore($_SESSION['usuario'], 15);
                                            $p15 = $bloque->fetch_assoc();
                                        ?>
                                            <tr>
                                                <td>
                                                    Bloque 2.5. - Coordinación.
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p15["valor"] < 1 ? '0' :  $p15["valor"];
                                                        if ( $valor <= 6){
                                                            echo '&#9679;';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p15["valor"] < 1 ? '0' :  $p15["valor"];
                                                    if ( $valor >= 6.2 && $valor <= 13.8){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p15["valor"] < 1 ? '0' :  $p15["valor"];
                                                    if ( $valor >= 13.9){
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
                            <div class="card card-default" style="background:#00BCD4;">
                                <div class="card-header">
                                    <a class="card-title text-light" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" data-parent="#accordion" href="#collapseOne">
                                    <strong><i class="fas fa-plus-circle text-light"></i> Sección III. Dirección</strong> 
                                    </a>
                                    <h3>
                                        <?php
                                        $complete = scoreSeccion(3);
                                        $result3 = $complete -> fetch_assoc();
                                        if($result3["total"] < 1){
                                            $result3["total"] = 0;
                                        }
                                        ?>
                                        <span class="badge
                                         <?php
                                            if($result3["total"] <= 54){
                                                echo $noPassed;
                                            }elseif ($result3["total"] >= 55.8 && $result3["total"] <= 124.2){
                                                echo $mediumPassed;
                                            }elseif ($result3["total"] >= 126){
                                                echo $passed;
                                            }
                                        ?>

                                         float-right">
                                            <?php echo $result3["total"];?>
                                            / 180
                                        </span>
                                    </h3>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse in" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                      <table class="table table-striped table-light">
                                          <thead class="table-dark text-center">
                                            <tr>
                                              <th scope="col">BLOQUE</th>
                                                <th scope="col" class="bg-danger">30%-</th>
                                                <th scope="col" class="bg-warning">31%-69%</th>
                                                <th scope="col" class="bg-success">70%+</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 16);
                                              $p16 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 3.1 - Toma de Decisiones.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p16["valor"] < 1 ? '0' :  $p16["valor"];
                                                    if ( $valor <= 15){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p16["valor"] < 1 ? '0' :  $p16["valor"];
                                                    if ( $valor >= 15.1 && $valor <= 34.5){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p16["valor"] < 1 ? '0' :  $p16["valor"];
                                                    if ( $valor >= 34.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                            $bloque = bloqueScore($_SESSION['usuario'], 17);
                                            $p17 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 3.2 - Motivación.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p17["valor"] < 1 ? '0' :  $p17["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p17["valor"] < 1 ? '0' :  $p17["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p17["valor"] < 1 ? '0' :  $p17["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                          $bloque = bloqueScore($_SESSION['usuario'], 18);
                                          $p18 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 3.3. - Comunicación .</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p18["valor"] < 1 ? '0' :  $p18["valor"];
                                                    if ( $valor <=12){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p18["valor"] < 1 ? '0' :  $p18["valor"];
                                                    if ( $valor >= 12.4 && $valor <= 27.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p18["valor"] < 1 ? '0' :  $p18["valor"];
                                                    if ( $valor >= 27.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 19);
                                              $p19 = $bloque -> fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 3.4 - Liderazgo.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p19["valor"] < 1 ? '0' :  $p19["valor"];
                                                    if ( $valor <= 15){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p19["valor"] < 1 ? '0' :  $p19["valor"];
                                                    if ( $valor >= 15.1 && $valor <= 34.5){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p19["valor"] < 1 ? '0' :  $p19["valor"];
                                                    if ( $valor >= 34.6){
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
                            <div class="card card-default" style="background:#0097A7;">
                                <div class="card-header">
                                    <a class="card-title text-light" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" data-parent="#accordion" href="#collapseFour">
                                    <strong><i class="fas fa-plus-circle text-light"></i>  Sección IV. Control</strong> 
                                    </a>
                                    <h3>
                                        <?php
                                        $complete = scoreSeccion(4);
                                        $result4 = $complete -> fetch_assoc();
                                        if($result4["total"] < 1) {
                                            $result4["total"] = 0;
                                        }
                                        ?>
                                        <span class="badge
                                         <?php
                                            if($result4["total"] <= 42){
                                                echo $noPassed;
                                            }elseif ($result4["total"] >= 43.4 && $result4["total"] <= 96.9){
                                                echo $mediumPassed;
                                            }elseif ($result4["total"] >= 98){
                                                echo $passed;
                                            }
                                        ?>

                                         float-right">
                                            <?php echo $result4["total"];?>
                                             / 140
                                        </span>
                                    </h3>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse in" aria-labelledby="headingFour" data-parent="#accordion">
                                    <div class="card-body">
                                      <table class="table table-striped table-light">
                                          <thead class="table-dark text-center">
                                            <tr>
                                                <th scope="col">BLOQUE</th>
                                                <th scope="col" class="bg-danger">30%-</th>
                                                <th scope="col" class="bg-warning">31%-69%</th>
                                                <th scope="col" class="bg-success">70%+</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 20);
                                              $p20 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 4.1 - Establecimiento de estándares.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p20["valor"] < 1 ? '0' :  $p20["valor"];
                                                    if ( $valor <= 15){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p20["valor"] < 1 ? '0' :  $p20["valor"];
                                                    if ( $valor >= 15.1 && $valor <= 34.5){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p20["valor"] < 1 ? '0' :  $p20["valor"];
                                                    if ( $valor >= 34.6){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 21);
                                              $p21 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 4.2 - Medición y detección de desviaciones.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p21["valor"] < 1 ? '0' :  $p21["valor"];
                                                    if ( $valor <= 9){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p21["valor"] < 1 ? '0' :  $p21["valor"];
                                                    if ( $valor >= 9.3 && $valor <= 20.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p21["valor"] < 1 ? '0' :  $p21["valor"];
                                                    if ( $valor >=20.8){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 22);
                                              $p22 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 4.3. - Correcciones.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p22["valor"] < 1 ? '0' :  $p22["valor"];
                                                    if ( $valor <= 9){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p22["valor"] < 1 ? '0' :  $p22["valor"];
                                                    if ( $valor >= 9.3 && $valor <= 20.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p22["valor"] < 1 ? '0' :  $p22["valor"];
                                                    if ( $valor >=20.8){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $bloque = bloqueScore($_SESSION['usuario'], 23);
                                              $p23 = $bloque->fetch_assoc();
                                          ?>
                                            <tr>
                                              <td>Bloque 4.4 - Retroalimentación.</td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p23["valor"] < 1 ? '0' :  $p23["valor"];
                                                    if ( $valor <= 9){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p23["valor"] < 1 ? '0' :  $p23["valor"];
                                                    if ( $valor >= 9.3 && $valor <= 20.7){
                                                        echo '&#9679;';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    $valor = $p23["valor"] < 1 ? '0' :  $p23["valor"];
                                                    if ( $valor >=20.8){
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
                    </div>
                    <div class="col-md-12">
                        <?php
                            $total = $result1["total"] + $result2["total"] + $result3["total"] + $result4["total"];
                        ?>
                      <div class="card card-default
                      <?php
                        if($total <= 276){
                            echo $noPassed;
                        }else if($total >=277 && $total <= 634.8){
                            echo $mediumPassed;
                        }else if($total >= 634.9){
                            echo $passed;
                        }

                      ?>

                        ">
                        <div class="card-header text-light text-center">
                          <h1>
                              <strong><i class="fas fa-award"></i>  PUNTUACIÓN TOTAL:
                                  <?php
                                    echo $total;?> / 920
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