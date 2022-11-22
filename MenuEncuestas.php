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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="page-footer font-small fixed-bottom" style="background-color:#09080E; padding:5px 0 0;">
        <div class="footer-copyright text-center py-3" style="background-color:#000000;">© 2020 Copyright:
            <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
        </div>
    </footer>
    <!-- Footer -->
</body>

</html>
