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
    <link rel="stylesheet" href="css/menuEncuestas.css">
</head>

<body class="align-items-center" style="background: lightgray; font-size: 20px; line-height: 25px; margin:0; font-family:'Raleway', sans-serif;">
    <?php
        include("includes/templates/menu.php");
    ?>
    <div class="container justify-content-center align-items-center">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card text-center car-body">
                    <table>
                        <thead class="text-center">
                            <h3><strong class="text-center">ENCUESTAS A RESPONDER</strong></h3>
                            <hr>
                            <br>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-7">
                                    <h3 class="card-title text-justify">Procesos Administrativos</h3>
                                </td>
                                <td class="col-5">
                                    <a href="Encuesta1.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <tr>
                                
                            </tr>
                            <tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Diagnóstico de la Comunicación de Apoyo</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaApoyo.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>

                            </tr>
                            <tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Evaluación del Manejo del Estrés</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaEstres.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            </tr>

                            <tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Solución Creativa de Problemas</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaSolAnaCrea.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            </tr>

                            <tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Ganar Poder e Influencia</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaPoderInlfuencia.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            </tr>
                            
                            <tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Uso de estrategias de influencia</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaEstrategiasInfluencia.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Diagnóstico para Motivar a los Demás</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaMotivación.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Manejo de Conflictos Interpersonales</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaConInt.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Facultamiento y Delegación Eficaces</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaFaDele.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Facultamiento Personal</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaFaPe.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Desarrollo de Equipos</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaCompDesaE.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Necesidad de Formación de Equipos</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaNeFoE.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>
                            <td class="col-7">
                                    <h3 class="card-title text-justify">Liderar el cambio positivo</h3>
                                </td>
                                <td class="col-5">
                                    <a href="EncuestaDirCamPos.php" class="btn btn-pill text-white" style="background-color:#3D708D;"> COMENZAR</a>
                                </td>
                            </tr>



                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer -->
</body>

</html>
