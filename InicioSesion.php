<?php 
 if (isset($_SESSION["usuario"])) {
     header("location: MenuEncuesta.php");
 }
 if (isset($_SESSION["admin"])) {
    header("location: AdminInicio.php");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
            include("includes/templates/head.php");
            tittle("Inicio de Sesión");
        ?>
        <link rel="stylesheet" href="css/estilos_inicioSesion.css">
    </head>
    <body style="background: lightgray; font-size: 20px; line-height: 25px; margin:0; font-family:'Raleway', sans-serif;">
        <?php
            include("includes/templates/menu.php");
        ?>
        <div class="container justify-content-center align-items-center">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6" style="width:auto; margin:auto auto;">
                    <div class="card text-center car-body">
                        <form class="px-4 py-2" id="formulario">
                        <img src="img/adn1.ico" class="rounded rounded-circle mx-auto d-block" alt="logo" style="width: 50px; height: 50px;">

                            <div class="form-group">
                                <h3 class="titulo">Inicio de Sesión</h3><br>
                                <input type="email" class="form-control email font-italic" name="username" id="username" placeholder="Correo Electrónico">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control password font-italic" name="password" id="password" placeholder="Contraseña">
                            </div>
                            <label class="espacioDown medio">
                            <input type="checkbox" name="recordar" id="recordar" value="1"> Recordar Sesión
                            </label>
                            <input type="hidden" id="action" name="action" value="login">
                            <input type="submit" class="btn btn-info btn-lg botones" value="Iniciar Sesión">
                            <a class="btn btn-outline-dark btn-lg botones" href="index.php" role="button"> Cancelar </a>
                        </form>
                        <div class="dropdown-divider"></div>
                        <div class="form-group pie">
                            <label for="exampleDropdownFormPassword1">¿Aun no tienes una cuenta?</label>
                            <a href="Registro.php" style="color: blue;">Registrate Aquí</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer class="page-footer font-small" style="background-color:#09080E; padding:5px 0 0;">
            <div class="footer-copyright text-center py-3" style="background-color:#000000;">© 2020 Copyright:
                <a href="https://mdbootstrap.com/"> MDBootstrap.com</a>
            </div>
            <script src="js/app.js"></script>
        </footer>
        <!-- Footer -->
    </body>
</html>