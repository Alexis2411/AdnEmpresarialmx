<?php
date_default_timezone_set('America/Mexico_City');
session_start();
if (isset($_SESSION["usuario"])) {
  include("InicioSesion.php");
  exit();
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php
  include("includes/templates/head.php");
  tittle("Registro");
  ?>
  <link rel="stylesheet" href="css/estilos-registro.css">
</head>

<body style="background: lightgray; font-size: 20px; line-height: 25px; margin:0; font-family:'Raleway', sans-serif;">
  <?php
  include("includes/templates/menu.php");
  ?>
  <!-- CONTENEDOR -->
  <div class="container">
    <!-- CARD -->
    <div class="card card-body bg-white">
      <img src="img/adn1.ico" class="rounded rounded-circle mx-auto d-block" alt="logo" style="width: 50px; height: 50px;">
      <!-- ENCABEZADO -->
      <div class="encabezado">
        <h2 class="text-center">Registro para ADN Empresarial</h2>
        <hr>
        <strong><h4 class="text-justify">Rellene todos los campos del formulario para completar su registro.</h4></strong>
      </div>
      <!-- ENCABEZADO -->
      <!-- FORM -->
      <form id="registro">
        <!-- ROW -->
        <div class="row">
            <!-- DIRECTIVO -->
            <div class="col-md-6">
              <h2>Directivo</h2>
              
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" >
                </div>

                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" >
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="cargo" name="cargo" placeholder="Puesto/Cargo" >
                </div>

                <div class="form-group col-md-6">
                  <select class="form-control" name="genero" id="genero">
                    <option value="">Género</option>
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                  </select>
                </div>
              </div>
                
              <div class="form-row">
                <div class="form-group col-md-6">
                  <select class="form-control obg" name="grado_estudios" id="grado_estudios">
                    <option value="">Grado de Estudios</option>
                    <option value="Preparatoria">Bachillerato</option>
                    <option value="Tecnico">Carrera Técnica</option>
                    <option value="Licenciatura">Licenciatura</option>
                    <option value="Maestria">Maestría</option>
                    <option value="Doctorado">Doctorado</option>
                  </select>
                </div>
                
                <div class="form-group col-md-2">
                  <input type="tel" class="form-control" id="lada" name="lada" placeholder="Lada" >
                </div>

                <div class="form-group col-md-4">
                  <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" >
                </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <input type="email" class="form-control obg" id="correo" name="correo" placeholder="Correo Electrónico" aria-describedby="inputGroupPrepend2" >
                </div>
              </div>

              <div class="form-group">
                <input type="password" class="form-control obg" id="contrasena" name="contrasena" placeholder="Contraseña">
                <span id="msj"></span>
              </div>

              <div class="form-group">
                <input type="password" class="form-control obg" id="verificacion" name="verificacion" placeholder="Verifique la contraseña">
                <span id="msn"></span>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <input type="email" class="form-control" id="correo_empresa" name="correo_empresa" placeholder="Correo Alterno o Corporativo" aria-describedby="inputGroupPrepend2" >
                </div>
              </div>

            </div>
            <!-- DIRECTIVO -->
            <!-- EMPRESA -->
            <div class="col-md-6">
              <H2>Empresa</H2>
              
              <div class="form-row">
                <div  class="form-group col-md-9">
                  <input type="text" class="form-control obg" id="nombre_empresa" name="nombre_empresa" placeholder="Nombre de Empresa" >
                </div>
                

                <div class="form-group col-md-3">
                  <select class="form-control obg" name="tipo_empresa" id="tipo_empresa">
                    <option value="">Giro</option>
                    <option value="Industrial">Industrial</option>
                    <option value="Comercio">Comercio</option>
                    <option value="Servicios">Servicios</option>
                  </select>
                </div>

              </div>
              
              <div class="form-row">
              
                <div class="form-group col-md-6">
                  <select class="form-control obg" id="fecha_fundacion" name="fecha_fundacion">
                  <option value="">Años de antigüedad</option>
                  <option value="Menos de 1 año">Menos de 1 año</option>
                  <option value="1 a 5 años">1 a 5 años</option>
                  <option value="6 a 10 años">6 a 10 años</option>
                  <option value="Más de 10 años"> Más de 10 años</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <select class="form-control obg" name="tamano_empresa" id="tamano_empresa">
                  <option value="">Número de Colaboradores</option>
                  <option value="Micro (1 a 10)">Micro (1 a 10)</option>
                  <option value="Pequeña (11 a 50)">Pequeña (11 a 50)</option>
                  <option value="Mediana (51 a 250)">Mediana (51 a 250)</option>
                  <option value="Grande (+ 250)">Grande (+ 250)</option>
                  </select>
                </div>

              </div>

              <div class="form-row">
                <div class="form-group col-md-2">
                  <input type="tel" class="form-control" id="lada_empresa" name="lada_empresa" placeholder="Lada" >
                </div>
                <div class="form-group col-md-5">
                  <input type="tel" class="form-control" id="telefono_empresa" name="telefono_empresa" placeholder="Teléfono Corporativo" >
                </div>
                <div class="form-group col-md-5">
                  <select class="form-control obg" name="pais" id="pais">
                    <option value="">Pais</option>
                    <option value="México">México</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <select class="form-control obg" name="estado" id="estado">
                    <option value="">Estado</option>
                    <option value="veracruz">Aguascalientes</option>
                    <option value="baja california">Baja California</option>
                    <option value="baja california sur">Baja California Sur</option>
                    <option value="campeche">Campeche</option>
                    <option value="coahuila">Coahuila</option>
                    <option value="colima">Colima</option>
                    <option value="chiapas">Chiapas</option>
                    <option value="chihuahua">Chihuahua</option>
                    <option value="durango">Durango</option>
                    <option value="df">Distrito Federal</option>
                    <option value="guanajuato">Guanajuato</option>
                    <option value="guerrero">Guerrero</option>
                    <option value="hidalgo">Hidalgo</option>
                    <option value="jalisco">Jalisco</option>
                    <option value="mexico">México</option>
                    <option value="michoacan">Michoacán</option>
                    <option value="morelos">Morelos</option>
                    <option value="mayarit">Nayarit</option>
                    <option value="muevo leon">Nuevo León</option>
                    <option value="oaxaca">Oaxaca</option>
                    <option value="puebla">Puebla</option>
                    <option value="queretaro">Querétaro</option>
                    <option value="quintana roo">Quintana Roo</option>
                    <option value="san luis">San Luis Potosí</option>
                    <option value="sinaloa">Sinaloa</option>
                    <option value="sonora">Sonora</option>
                    <option value="tabasco">Tabasco</option>
                    <option value="tamaulipas">Tamaulipas</option>
                    <option value="tlaxcala">Tlaxcala</option>
                    <option value="veracruz">Veracruz</option>
                    <option value="yucatan">Yucatán</option>
                    <option value="zacatecas">Zacatecas</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <select class="form-control obg" name="ciudad" id="ciudad">
                    <option value="">Ciudad</option>
                    <option value="Córdoba">Córdoba</option>
                    <option value="Fortín">Fortín de las Flores</option>
                    <option value="Ixtaczoquitlán">Ixtaczoquitlán</option>
                    <option value="Orizaba">Orizaba</option>
                    <option value="Nogales">Nogales</option>
                    <option value="Cd. Mendoza">Ciudad Mendoza</option>
                    <option value="Amatlan de los Reyes">Amatlán de los Reyes</option>
                    <option value="Cuitlahuac">Cuitlahuac</option>
                    <option value="Veracruz">Veracruz</option>
                    <option value="Boca del Río">Boca del Río</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-8">
                  <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" >
                </div>
                <div class="form-group col-md-4">
                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Código Postal" >
                </div>
              </div>

              <div class="form-group">
                <div class="form-check text-justify">
                  <input class="form-check-input" type="checkbox" value="1" id="term_con" name="term_con" >
                    <label class="form-check-label" for="invalidCheck2">
                      Para completar tu registro, debes aceptar los términos de uso y el procesamiento, tratamiento y transparencia de tus datos personales conforme a lo dispuesto en las políticas de privacidad
                    </label>
                </div>
              </div>
          
              <div class="form-group float-right">
                <div class="button float-right" role="group">
                  <a href="index.php" class="btn btn-outline-dark float-right">Cancelar</a>
                  <input type="hidden" value="crear" name="action">
                  <input type="submit" value="Registrarse" class="btn btn-info float-right" style="background-color:#3D708D; color:white;">
                </div>
              </div>
            </div>
            <!-- EMPRESA -->
        </div>
        <!-- ROW -->
      </form>
      <!-- FORM -->
    </div>
    <!-- CARD -->
  </div>
  <!-- CONTENEDOR -->

  <!-- Footer -->
  <footer class="page-footer font-small" style="background-color:#09080E; padding-top:5px;">
    <!-- Copyright -->
    <div class="footer-copyright text-center text-secondary py-3" style="background-color:#000000;">© 2020 Copyright:
      <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
    <script src="js/app.js"></script>
  </footer>
  <!-- Footer -->


</body>

</html>