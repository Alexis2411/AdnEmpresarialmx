<?php 
date_default_timezone_set('America/Mexico_City');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php
      include("includes/templates/head.php");
      tittle("Inicio");
    ?>
    <link rel="stylesheet" href="css/estilos_paginaweb.css">
</head>

<body style="background: lightgray; font-size: 20px; line-height: 25px; margin:0; font-family:'Raleway', sans-serif;">
        
<!--<menu>-->
    <?php
      include("includes/templates/menu.php");
    ?>
    <!--</menu>-->
    <main class="main">

        <div class="container bg-light">

            <div class="row" >
                <div class="col-lg-12 mx-auto text-center" style="font-size: 2.3rem; margin: 20px; font-weight: bolder">
                    Indicador de gestión del proceso administrativo
                </div>
                <div class="col-lg-6 d-flex justify-content-center align-items-center">
                    <ul>
                        <br>
                        <li><a href="Presentacion.php#queEs" style="text-decoration: none;">¿Qué es? </a></li>
                        <br>
                        <li><a href="Presentacion.php#comoSeMide" style="text-decoration: none;">¿Cómo se mide?</a></li>
                        <br>
                        <li><a href="Presentacion.php#componentes" style="text-decoration: none;">Los componentes</a></li>
                        <br>
                        <li><a href="Presentacion.php#paraQueSirve" style="text-decoration: none;">¿Para qué sirve?</a></li>
                        <br>
                        <a href="MenuEncuestas.php" class="btn btn-primary btn-lg text-white font-weight-bold" style="margin-top: 50px;">REGISTRATE</a>
                    </ul>
                </div>

                <div class="col-lg-6 d-flex justify-content-center">
                    <img src="img/procesoadmin.jpg" class="img-fluid">
                </div>
            </div>
            <br>
            
            <section class="featurette" style="margin:30px;">
                <hr>
                <h3 class="text-center font-bold"><strong>O B J E T I V O</strong></h3>
                <hr>
                <p>
                    <ul class="text-justify">
                        <li type="disc">Promover el fortalecimiento de las organizaciones públicas y privadas mediante la investigación, creación e innovación de estrategias integradoras diseñando proyectos que coadyuven a la solución de problemas de los sectores productivos.</li><br>
                        <li type="disc">Se busca no solo establecer el espacio donde confluyan las necesidades, capacidades  de fomento de la innovación en la región, sino también ayudar a identificar y priorizar esfuerzos en el desarrollo de posteriores y nuevas estrategias organizacionales de mayor eficiencia, que van desde la capacitación hasta el diseño e implementación de estrategias adhoc a las necesidades organizacionales.</li>
                    </ul>
                </p>
                <br>

                <hr class="featurette-divider">
            
                <h3 class="text-center font-bold"><strong>I M P O R T A N C I A</strong></h3>
                <hr>
                <p class="text-justify">
                    Las empresas enfrentan diversos desafíos a través de los años en búsqueda de su consolidación, sin embargo,
                    no se tiene un registro sobre el conocimiento y aplicación de las etapas del proceso
                    administrativo en sus actividades cotidianas para el diseño y aplicación de acciones que garanticen la constante
                    evolución de las  organizaciones. Por lo tanto, es necesario conocer los elementos del proceso administrativos
                    con los que operan para proporcionarles técnicas y herramientas económico-administrativas que les permitan
                    potencializar sus actividades empresariales.
                </p>
                <br>
            </section>

                <hr class="featurette-divider">
                <br>
            <div class="row row-cols-1 row-cols-md-2">
                <div class="col mb-6">
                    <div class="card bg-light">
                        <img src="img/encuesta.jpg" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <h5 class="card-title text-center font-bold" style="color:#3D708D;"><strong>Encuesta para Empresas</strong></h5>
                            <a href="MenuEncuestas.php" class="btn btn-pill text-white" style="background-color:#3D708D;">Empezar</a>
                        </div>
                    </div>
                </div>
                <div class="col mb-6">
                    <div class="card bg-light">
                        <img src="img/quienessomos.jpg" class="card-img-top img-fluid" alt="Responsive image">
                        <div class="card-body">
                            <h5 class="card-title text-center font-bold" style="color:#3D708D;"><strong>¿Quiénes somos?</strong></h5>
                            <a href="QuienesSomos.php" class="btn btn-pill text-white" style="background-color:#3D708D;">Conocenos</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <br>

            <hr class="featurette-divider">

            <section id="contact" class="contacto featurette text-center">
                <div class="card-deck">
                    <div class="card bg-light" style="padding:0;">
                        <div class="card-body">
                            <h4 class="card-title">Horarios</h4>
                            <h5 class="card-text"><i class="fas fa-university mr-3"></i> Facultad de Negocios y Tecnologías</h5>
                            <h5 class="card-text"><i class="fas fa-calendar-day mr-3"></i> Lunes a Viernes </h5>
                            <h5 class="card-text"><i class="far fa-clock mr-3"></i> 10:00 a 14:00 hrs </h5>
                        </div>
                    </div>
                    <div class="card bg-light" style="padding:0;">
                        <div class="card-body">
                            <h4 class="card-title">Contacto</h4>
                            <h5 class="card-text"><i class="fas fa-user mr-3"> </i> Dr. Omar Juárez Rivera </h5>
                            <h5 class="card-text"><i class="far fa-envelope mr-3"> </i> <a href="mailto:ojuarez@uv.mx">ojuarez@uv.mx</a> </h5>
                            <h5 class="card-text"><i class="fas fa-phone-square-alt mr-3"> </i> (272) 728 08 15 </h5>
                        </div>
                    </div>  
                    <div class="card bg-light" style="padding:0;">
                        <div class="card-body">
                            <h4 class="card-title">Ubicación</h4>
                            <h5 class="card-text"><i class="fas fa-university mr-3"></i> Campus Ixtaczoquitlán</h5>
                            <h5 class="card-text"><i class="fas fa-map-marked-alt mr-3"></i> Carretera Estatal Sumidero - Dos Rios, Km 1, Ixtaczoquitlán Veracruz, México. </h5>
                        </div>
                    </div>
                </div>
            </section>
            <br>
            <hr class="featurette-divider">
            <br>
        </div>

        <div id="map-container-google-1" class="z-depth-1-half map-container" frameborder="0" style=" border:0;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15097.588004549558!2d-97.03804447812368!3d18.913813817912317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x985793c74db2ba34!2sUniversidad%20Veracruzana!5e0!3m2!1ses!2smx!4v1606370225482!5m2!1ses!2smx" width="100%" height="425" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>

    </main>

    <!-- Footer -->
    <footer class="page-footer font-small" style="background-color:#09080E; padding:5px 0 0;">
        <!-- Footer Links -->
        <div class="container text-center text-md-left mt-5 text-muted">
            <!-- Grid row -->
            <div class="row mt-3">

                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

                    <!-- Content -->
                    <h6 class="text-uppercase font-weight-bold">ADN Empresarial</h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p>
                        <i class="fas fa-user-check mr-3"></i> <a href="MenuEncuestas.php">Registrate</a> para poder acceder a la encuesta </p>
                    <hr>
                    <h6 class="text-uppercase font-weight-bold">Acerca de</h6><br>
                    <p>
                    <i class="fas fa-users mr-3"></i><a href="QuienesSomos.php">Conócenos</a>
                    </p>

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Contacto</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-user mr-3"></i> Dr. Omar Juárez Rivera</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i><a href="mailto:ojuarez@uv.mx">ojuarez@uv.mx</a></p>
                <p>
                    <i class="fas fa-phone mr-3"></i> +52 (272) 728 08 15</p>
                <p>
                    <i class="fas fa-calendar-day mr-3"></i> Lunes a Viernes de 10:00 a 14:00 hrs </p>

                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">

                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                <!-- Links -->
                <h6 class="text-uppercase font-weight-bold">Ubicación</h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                <i class="fas fa-university mr-3"></i> Facultad de Negocios y Tecnologías. Campus Ixtac.</p>
                <p>
                    <i class="fas fa-map-marked-alt mr-3"></i> Carretera Estatal Sumidero - Dos Rios, Km 1, Ixtaczoquitlán Veracruz, México. </p>
                </div>
                <!-- Grid column -->
            </div>
            <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <!-- Grid row -->
        </div>
        <!-- Footer Links -->
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-secondary" style="background-color:#000000;">© 2020 Copyright: MDBootstrap.com
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->

</body>

</html>