<?
date_default_timezone_set('America/Mexico_City');
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <?php
    include("includes/templates/head.php");
    tittle("Presentación");
    ?>
</head>
<body style="background: lightgray; font-size: 20px; line-height: 25px; margin:0; font-family:'Raleway', sans-serif;">
    <?php
    include("includes/templates/menu.php");
    ?>

    <div id="queEs" class="container">
        <h1>Indicador de gestión del proceso administrativo</h1>
        <div class="row" style="margin-top:30px ">
            <h2>¿Qué es?</h2>
            El indicador de gestión del proceso administrativo (IGPA) es un instrumento de índole cuantitativo que mide la implementación del proceso administrativo dentro de las organizaciones.
        </div>

        <div class="row" style=" word-wrap: break-word; margin-top: 30px; ">
            <h2  id="comoSeMide">¿Cómo se mide?</h2>
            Cada bloque está conformado por un número irregular de ítems <br>
            A cada ítem tiene asignado un valor análogo a 10 puntos. Si=10 puntos No=0 puntos <br>
            Cada Bloque en atención al número de ítems, totaliza la sumatoria de puntos en función al número de ítems.<br>
            La totalidad de puntos de las cuatro secciones del proceso administrativo es 1080 puntos. <br>
            Se pretende unificar el peso de cada proceso administrativo, porque en función de los puntos de cada sección se tiene un “desequilibrio” en importancia y proporción de cada sección.
            <br>
            Si se considera que las cuatro secciones del proceso administrativo representan el 100%, entonces el total obtenido por sección se saca la proporción correspondiente del 25%
            <br>
            Tomando en consideración que cada bloque tiene un número de ítems éstos se dividirán entre el 25% de su valor por bloque, así entonces, la sección de planeación tiene diez ítems casa uno tiene un valor de 2.5% y se contabilizarán solo los que tengan como respuesta Sí.
            <br>
            Habiendo ya contabilizado y ponderado cada ítem y las cuatro secciones, se tendrá un total por cada área del proceso administrativo, teniendo un máximo puntaje por sección se puede asignar un semáforo de atención. En el caso de Planeación, siendo el máximo 450 puntos que representa el 100% de puntaje, dividido en tres partes proporcionales nos dan 150 puntos como mínimo (rojo) 300 (regular) y 450 (bien), estableciendo en una escala sería: (0-150 puntos)=Rojo (atención urgente)  de (151-300 puntos)=Amarillo (atención mediata) de (301-45 puntos)=Verde (atención a mediano plazo).
            <br><br>
            <b>Estableciendo:</b> <br>
            <table class="table table-striped text-center" style="margin-top: 30px;">
                <tr>
                    <th>Sección</th>
                    <th>Total de puntos</th>
                    <th>Puntos por color semáforo</th>
                    <th style="background-color: red;  color: black;">Malo</th>
                    <th style="background-color: yellow; color: black;">Regular</th>
                    <th style="background-color: #1c7430;  color: black;">Bueno</th>
                </tr>
                <tr>
                    <th>Planeación</th>
                    <th>420</th>
                    <th>140</th>
                    <th>0-140 pts</th>
                    <th>141-280 pts</th>
                    <th>281-420 pts</th>
                </tr>
                <tr>
                    <th>Organización</th>
                    <th>180 </th>
                    <th>60 </th>
                    <th>0-60 pts</th>
                    <th>61-120 pts</th>
                    <th>121-180 pts</th>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <th>180 </th>
                    <th>60 </th>
                    <th>0-60 pts</th>
                    <th>61-120 pts</th>
                    <th>121-180 pts</th>
                </tr>
                <tr>
                    <th>Control</th>
                    <th>140 </th>
                    <th>46.66 </th>
                    <th>0-47 pts</th>
                    <th>48-94 pts</th>
                    <th>95-140 pts</th>
                </tr>
                <tr>
                    <th>Total</th>
                    <th>920</th>
                    <th>306.66</th>
                    <th>0-306 pts</th>
                    <th>307-614 pts</th>
                    <th>615-920 pts</th>
                </tr>
            </table>
            <hr>

            <table class="table table-striped text-center" style="margin-top: 30px;">
                <tr>
                    <th>Sección</th>
                    <th>Bloque</th>
                    <th>No. Preguntas</th>
                    <th>Total de puntos</th>
                    <th style="background-color: red; color: black; ">Mal 30%-</th>
                    <th style="background-color: yellow; color: black;">Regular 31% - 69%</th>
                    <th style="background-color: #1c7430; color: black;">Bien 70% +</th>
                </tr>
                <tr>
                    <th>Planeación [420]</th>
                    <th>Misión</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Visión</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Valores</th>
                    <th>3</th>
                    <th>30</th>
                    <th>0-10</th>
                    <th>11-20</th>
                    <th>21-30</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Objetivos</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Políticas</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Procedimientos</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Reglamentos</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Presupuestos</th>
                    <th>3</th>
                    <th>30</th>
                    <th>0-10</th>
                    <th>11-20</th>
                    <th>21-30</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Programas</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Planeación estratégica</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th>Organización [180]</th>
                    <th>Descripción de puestos</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Jerarquización</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Departamentalización</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Descripción de actividades</th>
                    <th>3</th>
                    <th>30</th>
                    <th>0-10</th>
                    <th>11-20</th>
                    <th>21-30</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Coordinación</th>
                    <th>2</th>
                    <th>20</th>
                    <th>0-6</th>
                    <th>7-13</th>
                    <th>14-20</th>
                </tr>
                <tr>
                    <th>Dirección [180]</th>
                    <th>Toma de desiciones</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Motivación</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Comunicación</th>
                    <th>4</th>
                    <th>40</th>
                    <th>0-13</th>
                    <th>14-26</th>
                    <th>27-40</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Liderazgo</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th>Control [140]</th>
                    <th>Establecimiento de estándares</th>
                    <th>5</th>
                    <th>50</th>
                    <th>0-16</th>
                    <th>17-33</th>
                    <th>34-50</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Medición y detección de desviaciones</th>
                    <th>3</th>
                    <th>30</th>
                    <th>0-10</th>
                    <th>11-20</th>
                    <th>21-30</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Corecciones</th>
                    <th>3</th>
                    <th>30</th>
                    <th>0-10</th>
                    <th>11-20</th>
                    <th>21-30</th>
                </tr>
                <tr>
                    <th></th>
                    <th>Retroalimentación</th>
                    <th>3</th>
                    <th>30</th>
                    <th>0-10</th>
                    <th>11-20</th>
                    <th>21-30</th>
                </tr>
            </table>
        </div>

        <div class="row" style="margin-top: 30px;">
            <h2 id="componentes">Los componentes</h2>
            El IGPA se mide a través de las 4 etapas del proceso administrativo y de los componentes de cada una de ellas:
            <ol>
                <li>Planeación</li>
                <li>Organización</li>
                <li>Dirección</li>
                <li>Control</li>
            </ol>
        </div>

        <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
            <h2 id="paraQueSirve">¿Para qué sirve?</h2>
            El IGPA es una herramienta analítica que permite establecer el grado de implementación del proceso administrativo mediante una serie de preguntas que otorga una puntuación y lo clasifica según el puntaje obtenido en las categorías de malo, regular y bueno. Le ayuda a los responsables de las organizaciones a visualizar qué aspecto del proceso administrativo les hace falta implementar para ayudar a las tareas cotidianas de su organización.

        </div>


    </div>

    <!-- Footer -->
    <footer>
        <!-- Copyright -->
        <div class="footer-copyright text-center text-secondary py-3">
            © 2020 Copyright: MDBootstrap.com
        </div>
        <!-- Copyright -->
    </footer>
    <!-- Footer -->


</body>


</html>

