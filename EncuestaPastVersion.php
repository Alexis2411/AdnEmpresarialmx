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

    <!-- Contenido 4 columnas -->
    <div class="container menuxd">
        <div class="row">
            <?php
            include "includes/function/funciones.php";
            if (isset($_SESSION['usuario'])) {
                $seccion = obtSeccion();
                if ($seccion) {
                    foreach ($seccion as $row) {
                ?>
            <div class="col-md-3">
                <img class="card-img-top image-responsive" src="<?php echo $row["imagen"] ?>" alt="Card image cap" max-width="100%" width="80%">
                <div class="card-body">
                    <h5 class="card-title text-center font-weight-bold"> <?php echo romano($row["id_seccion"]); ?>.
                        <?php echo $row["nombre"]; ?></h5>
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
                    <p class="text-center">PUNTAJE: <?php echo $puntaje; ?> / <?php echo $puntajeTotal; ?> </p>
                    <p class="text-center"><strong> CONCLUIDO </strong></p>
                    <?php
                                    }else {
                                        ?>
                    <a class="btn btn-info" href="PreguntasSeccion.php?ques=<?php echo $row["nombre"]; ?>">Empezar</a>
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
                    <h5 class="card-title text-center font-weight-bold"> <?php echo romano($row["id_seccion"]); ?>.
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

        </div>
    </div>
    <!-- Contenido 4 columnas -->

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