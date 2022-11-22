<?php
date_default_timezone_set('America/Mexico_City');
include "includes/function/session.php";
?>

<!DOCTYPE html>
<html>

<head>
    <?php
    include("includes/templates/head.php");
    tittle("Encuesta");
    ?>
</head>

<body style="background: lightgray; font-size: 20px; line-height: 25px; margin:0; font-family:'Raleway', sans-serif;">

    <!--Barra de navegación-->
    <?php
    include("includes/templates/menu.php");
    ?>
    <!--Barra de navegación-->

    <!-- Contenido destabado -->

    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="jumbotron bg-ligth">
                <div class="container barra">
                    <h1 class="text-center"><strong>Evaluación del manejo del estrés</strong></h1>
                    <p class="text-justify">
                    <h3><strong>Descripción:</strong></h3>
                    <ol>
                        <li>
                        Las respuestas deben reflejar sus actitudes y comportamiento como son ahora, no como usted quisiera que fueran.
                        </li>
                        <li>
                        Sea honesto.
                        </li>
                        <li>
                        Este instrumento está diseñado para ayudarle a descubrir su nivel de competencia en la comunicación de apoyo, con la finalidad de que pueda adaptar su aprendizaje a sus necesidades específicas.
                        </li>
                        <li>
                        Cuando haya respondido el cuestionario, utilice la clave de resultados al final del capítulo, para identificar aquellas áreas de habilidad que se estudian en este capítulo y que usted necesita aprender a dominar
                        </li>
                    </ol>

                    <h3><strong>Instrucciones:</strong></h3>
                    <ul>
                        <li>
                            Todas las preguntas tienen seis opciones de respuesta, elija la que mejor describa lo que piensa sobre los elementos del proceso administrativo, tomando en cuenta lo siguiente:
                        </li>
                        <br>
                        <ol>
                            <li> Totalmente en desacuerdo </li>
                            <li> En desacuerdo </li>
                            <li> Ligeramente en desacuerdo </li>
                            <li> Ligeramente de acuerdo </li>
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
                    <div class="col-md-4 d-flex " style="max-width: 100% ; width: 100%">
            <!-- Contenido 4 columnas -->
                    <?php
                    include "includes/function/funciones.php";
                    if (isset($_SESSION['usuario'])) {
                        $seccion = obtSeccion(8, 8);
                        if ($seccion) {
                            foreach ($seccion as $row) {
                                ?>
                                <div class="card" style="margin: 2px">
                                    <img class="card-img-top image-responsive" src="<?php echo $row["imagen"] ?>" alt="Card image cap" max-width="100%" width="80%">
                                    <div class="card-body">
                                        <h5 class="text-center font-weight-bold" style="font-size: 1rem; width: fit-content">
                                            <?php echo $row["nombre"]; ?>
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
                                            <a class="btn btn-info" style="font-size: 1rem; width: fit-content; margin: 0;" href="PreguntasSeccionseis.php?ques=<?php echo $row["nombre"]; ?>">Empezar</a>
                                            <?php
                                        }
                                        ?>

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
                    </div>
                </div>
        </div>

    </div>

    <!-- Pie de pagina -->
    <footer class="page-footer font-small text-secondary pt-4"
        style="background-color:#404040; font-family:'Raleway', sans-serif;">
        <!-- Copyright -->
        <p class="text-center"><em>Sus respuestas serán anónimas y absolutamente confidenciales. Los cuestionarios serán
                procesados automáticamente.</em> </p>
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="https://mdbootstrap.com/education/bootstrap/"> MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
        <!-- <script src="js/app.js"></script> -->

    </footer>
    <!-- Pie de pagina -->
</body>
</html>