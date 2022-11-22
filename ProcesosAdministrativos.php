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
                <h1>Indicador de gestión del proceso administrativo</h1>
            </div><!-- /.container-fluid -->
        </section>

        <!--S Main content -->
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="accordion">
                        <!-- we are adding the .class so bootstrap.js collapse plugin detects it -->
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="jumbotron bg-ligth">
                                    <div class="container barra">
                                        <h1 class="text-center"><strong>Índice del Proceso Administrativo</strong></h1>
                                        <p class="text-justify">
                                        <h3><strong>Objetivo:</strong></h3>
                                        <ol>
                                            <li>
                                                Conocer el grado de aplicación que tienen las etapas del proceso administrativo dentro de la empresa.
                                            </li>
                                            <li>
                                                Los datos recolectados servirán para la elaboración de un índice que mida la practicidad del proceso administrativo a cualquier tipo de organización.
                                            </li>
                                        </ol>

                                        <h3><strong>Instrucciones:</strong></h3>
                                        <ul>
                                            <li>
                                                Todas las preguntas tienen cinco opciones de respuesta, elija la que mejor describa lo que piensa sobre los elementos del proceso administrativo, tomando en cuenta lo siguiente:
                                            </li>
                                            <br>
                                            <ol>
                                                <li> Totalmente en desacuerdo </li>
                                                <li> En desacuerdo </li>
                                                <li> Ni de acuerdo ni en desacuerdo </li>
                                                <li> De acuerdo </li>
                                                <li> Totalmente de acuerdo </li>
                                            </ol>
                                            <br>
                                            <li>
                                                No existen respuestas correctas o incorrectas y <strong>solamente puede elegir una opción.</strong>
                                            </li>
                                        </ul>
                                        </p>
                                        <p class="nota text-center" style="font-style: oblique;">
                                            Sus respuestas serán anónimas y absolutamente confidenciales.
                                            Los cuestionarios serán procesados automáticamente. <br>
                                            De antemano muchas gracias por su colaboración.
                                        </p>
                                    </div>
                                </div>
                                <!-- Contenido destabado -->
                            </div>

                            <div class="col-md-6">
                                <div class="row">
                                    <!-- <div class="col-md-4 d-flex " style="max-width: 100% ; width: 100%"> -->
                                        <!-- Contenido 4 columnas -->
                                        <?php
                                        include "includes/function/funciones.php";
                                        if (isset($_SESSION['usuario'])) {
                                            $seccion = obtSeccion();
                                            if ($seccion) {
                                                foreach ($seccion as $row) {
                                                    ?>
                                                        <div class="col-lg-6 mx-auto">
                                                            <div class="card shadow-sm">
                                                        <img class="card-img-top image-responsive" src="<?php echo $row["imagen"] ?>" alt="Card image cap" max-width="100%" width="80%">
                                                        <div class="card-body">
                                                            <h5 class="text-center font-weight-bold" style="font-size: 1rem; width: fit-content">
                                                                <?php echo romano($row["id_seccion"]) . "." . $row["nombre"]; ?>
                                                            </h5>
                                                            <?php
                                                            if ($row["completo"] == 1) {
                                                                $complete = scoreSeccion($row["id_seccion"]);
                                                                if ($complete) {
                                                                    foreach($complete as $comp){
                                                                        if($comp["total"] < 1 ){
                                                                            $puntaje = 0;
                                                                        }else{
                                                                            $puntaje = $comp["total"];
                                                                        }
                                                                        $puntajeTotal = $comp["valor"];
                                                                    }
                                                                }else{
                                                                    $puntaje = "error";
                                                                    $puntajeTotal = "error";
                                                                }
                                                                ?>
                                                                <p class="text-center" style="font-size: 1rem; width: fit-content; margin: 0;">PUNTAJE: <?php echo $puntaje; ?> / <?php echo $puntajeTotal; ?> </p>
                                                                <p class="text-center" style="font-size: 1rem; width: fit-content; margin: 0;"><strong> CONCLUIDO </strong></p>
                                                                <?php
                                                            }else {
                                                                ?>
                                                                <a class="btn btn-info" style="font-size: 1rem; width: fit-content; margin: 0;" href="PreguntasSeccion.php?ques=<?php echo $row["nombre"]; ?>">Empezar</a>
                                                                <?php
                                                            }
                                                            ?>

                                                        </div>
                                                    </div>
                                                        </div>
                                                    <?php
                                                }
                                            } else {
                                                echo "error";
                                            }
                                        }elseif (isset($_SESSION['invited'])) {
                                            $seccion = obtSeccionInvited();
                                            if ($seccion) {
                                                foreach ($seccion as $row) {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <img class="card-img-top image-responsive" src="<?php echo $row["imagen"] ?>" alt="Card image cap"
                                                             max-width="100%" width="80%">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-center font-weight-bold" > <?php echo romano($row["id_seccion"]); ?>.
                                                                <?php echo $row["nombre"]; ?></h5>

                                                            <a class="btn btn-info" href="InvitedSeccion.php?ques=<?php echo $row["nombre"]; ?>">Empezar</a>

                                                        </div>
                                                    </div>
                                                    <?php

                                                }
                                            } else {
                                                echo "error";
                                            }
                                        }
                                        ?>

                                        <!-- Contenido 4 columnas -->
                                    <!-- </div> -->
                                </div>
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