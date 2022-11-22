<?php
date_default_timezone_set('America/Mexico_City');
  include "includes/function/session.php";
  include "includes/function/funciones.php";
  
  if(isset($_GET["ques"]) && $_GET["ques"] !=""){
    $mostrar = mosSeccion($_GET["ques"]);
    //Hace una consulta a la tabla seccion retorna id nombre total de pregutnas y si esta completo
     if ($mostrar) {
      foreach($mostrar as $ide){
        $_SESSION['seccion'] = $ide['id_seccion']; 
        $ids = $ide['id_seccion'];
        $nombre = $ide['nombre'];
        $tPreguntas = $ide['total'];
       // $romano = romano($ide['id_seccion']);
        $completo = $ide['completo'];
      }
      if ($completo == 1) {
        header("location: MenuEncuestas.php");
      }
      $idu = $_SESSION["usuario"];
    }else {
      header("location: MenuEncuestas.php");
    }
  }else{
    header("location: MenuEncuestas.php");
  }
  
  ?>
<!DOCTYPE html>
<html lang="es" dir="ltr" style="min-height: 100%; position: relative;">

<head>
  <?php
  include("includes/templates/head.php");
  $titulo ="Sección  $nombre";
  tittle($titulo);
  ?>
  <link rel="stylesheet" href="css/estilos_preguntas.css">
</head>

<body style="background: lightgray; font-size: 20px; line-height: 25px; margin:0; font-family:'Raleway', sans-serif;">

  <!--Encabezado de pagina --->
  <?php
  include("includes/templates/menu.php");
  ?>
  <main class="main">
    <div class="container" style="background-color:white; font-family: 'Raleway', sans-serif; margin-top: 48px; padding: 32px; border-radius: 20px;">
      <div class="row">
        <div class="col-lg-12">

          <!--Botones de Pagina numerico-->
          <div class="nav nav-pills d-flex justify-content-center nav-pre" id="nav-tab" role="tablist">
            <?php
            //retorna id de pregunta, numero de pregunta, completo, resuelto, valor, visible
            $preguntas = btnPreguntas($ids,$idu);
            if ($preguntas) {
              $i = 1;
              foreach ($preguntas as $rows) {
                ($i == 1) ? $status = 'true' : $status = 'false';
                ($i == 1) ? $activo = 'active' : $activo = '';
                
                if ($rows["visible"]) {
                  if ($rows["valor"] == 10) {
                    ($rows["resuelto"] == $rows["minimo"]) ? $comp="completo" : $comp="";
                  }else{
                    ($rows["completo"]) ? $comp="completo" : $comp="";
                  }
                }else {
                  ($rows["resuelto"] == $rows["minimo"]) ? $comp="completo" : $comp="";
                }
            ?>

                <button class="btn btn-primary btn-lg <?php echo $activo ?> <?php echo $comp ?>" id="p<?php echo $rows["id_pregunta"] ?>" data-toggle="tab" href="#pr<?php echo $rows["id_pregunta"] ?>" role="tab" aria-controls="pr<?php echo $rows["id_pregunta"] ?>" aria-selected="<?php echo $status ?>"> <?php echo $rows["numero_pregunta"] ?> </button>

            <?php
                $i++;
              }
            } else {
              echo "error";
            }

            ?>

          </div>
          <!--Botones de Pagina numerico-->

          <div class="tab-content" id="nav-tabContent">

            <?php
            $preguntas = numPreguntas($ids);
            if ($preguntas) {
              $i = 1;
              foreach ($preguntas as $row) {
                
                ($i == 1) ? $status = 'show active' : $status = '';
                if ($i != $tPreguntas) {
                  $class = 'btnNext';
                  $text = "Siguiente";
                }else {
                  $class = 'btnEnd'; 
                  $text = "Finalizar";
                }
                $id = $row["id_pregunta"];
            ?>
                <div class="tab-pane fade <?php echo $status ?>" id="pr<?php echo $id ?>" role="tabpanel" aria-labelledby="pr<?php echo $id ?>">
                  <?php
                  $preg = obtPreguntas($id,$idu);
                  if ($preg) {
                    foreach ($preg as $columna) {
                       
                      ?>
                      <h3 class="text-center" style="color: #3D708D;">Bloque <?php echo $columna["numero_pregunta"] ?> <?php echo $columna["bloque"] ?> </h3>
                      <?php 
                      if ($columna["visible"]) {
                      ?>

                      <table class="table table-striped">
                        <tbody>
                          <tr style="background-color:#d9e5e7;">
                            <th scope="row">
                              <!-- <div class="col-sm-8"> -->
                              <?php echo $columna["pregunta"] ?>

                              <!-- </div> -->
                            </th>
                              <?php 
                              $action = activarPregunta($columna["valor"]);
                              ?>
                            <td class="select-res">
                              <nav class="nav nav-pills ">

                                <a class="nav-item nav-link <?php echo $action["option1"][0]; ?>" id="pre-id-<?php echo $id ?>-<?php echo $idu ?>" data-toggle="tab" href="#pre-<?php echo $id ?>" role="tab" aria-controls="pre-<?php echo $id ?>" aria-selected="<?php echo $action["option1"][1]; ?>">SI</a>

                                <a class="nav-item nav-link <?php echo $action["option2"][0]; ?>" id="empty-id-<?php echo $id ?>-<?php echo $idu ?>" data-toggle="tab" href="#empty-<?php echo $id ?>" role="tab" aria-controls="empty-<?php echo $id ?>" aria-selected="<?php echo $action["option2"][1]; ?>" data-id="">NO</a>
                              </nav>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <?php 
                        }
                      ?>

                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade <?php ($columna["visible"] ? $act = $action["option1"][0] : $act = "active show"); echo $act; ?>" id="pre-<?php echo $id ?>" role="tabpanel" aria-labelledby="pre-id-<?php echo $id ?>">
                          <div class="card card-body">
                            <table class="table table-striped">
                              <thead>
                                <tr style="background-color: #d9e5e7;">
                                  <th scope="col"></th>
                                  <th scope="col" class="font-weight-bold">1</th>
                                  <th scope="col" class="font-weight-bold">2</th>
                                  <th scope="col" class="font-weight-bold">3</th>
                                  <th scope="col" class="font-weight-bold">4</th>
                                  <th scope="col" class="font-weight-bold">5</th>
                                  <th scope="col" class="font-weight-bold">6</th>
                                  <th scope="col" class="font-weight-bold">7</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                $subp = subPreguntas($id,$idu);
                                if ($subp) {
                                  foreach ($subp as $sub) {
                                ?>
                                    <tr class="res-radio">
                                      <th scope="row"> <?php echo $sub["numero_subpregunta"] ?>.- <?php echo $sub["subpregunta"] ?> </th>
                                      <?php 
                                        for ($r=1; $r < 8; $r++) { 
                                          if ($sub["posicion"] != $r) {
                                            ?>
                                            <td><input type="radio" name="sub<?php echo $sub["id_subpregunta"] ?>" id="p:<?php echo $idu ?>:<?php echo $sub["id_subpregunta"] ?>:<?php echo $r ?>:<?php echo $id ?>" class="option" ></td>
                                            <?php 
                                          }else {
                                            ?>
                                            <td><input type="radio" name="sub<?php echo $sub["id_subpregunta"] ?>" id="p:<?php echo $idu ?>:<?php echo $sub["id_subpregunta"] ?>:<?php echo $r ?>:<?php echo $id ?>" class="option" checked ></td>
                                            <?php 
                                          }
                                        }
                                      ?>
                                      
                                    </tr>

                                <?php
                                  }
                                } else {
                                  echo "Error";
                                }

                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <?php
                        if ($columna["visible"]) {
                          ?>        
                        <div class="tab-pane fade <?php echo $action["option2"][1]; ?>" id="empty-<?php echo $id ?>" role="tabpanel" aria-labelledby="empty-id-<?php echo $id ?>"></div>
                        <?php
                        }
                        ?> 
                      </div>

                  <?php
                    }
                  } else {
                    echo "error";
                  }
                  ?>

                  <a class="btn btn-info btn-lg float-right <?php echo $class; ?>" id="end" > <?php echo $text; ?> </a>

                </div>
            <?php
                $i++;
              }
            } else {
              echo "error";
            }
            ?>
          </div>
          <!--Fin Bloques-->
        </div>
      </div>
    </div>
    <!--Contenedor de tabla, etc-->
  </main>

  <!-- FOOTER -->
  <script src="js/app.js"></script>
  <footer class="page-footer font-small text-secondary pt-4 fixed-bottom" style="background-color:#404040; position:relative; bottom:0; width:100%; font-family:'Raleway', sans-serif;">
    <p class="text-center"><em>Sus respuestas serán anónimas y absolutamente confidenciales. Los cuestionarios serán procesados automáticamente.</em> </p>
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
      <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
    </div>
  </footer>
  <!-- FOOTER -->

</body>

</html>
