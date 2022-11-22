
<nav class="navbar navbar-expand-lg navbar-dark cabecera navbar-toggleable-sm sticky-top">
         <a class="navbar-brand encabezado" href="index.php">
             <img src="img/adn1.ico" width="35px" height="35px">
             <strong>ADN Empresarial</strong>
         </a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarToggler01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
<?php
if (!isset($_SESSION["usuario"]) &&$_SERVER["PHP_SELF"] =="/pagina-web-2020/InicioSesion.php") {
?>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto text-center">
                    <li class="nav-item active">
                        <a class="nav-link" href="Registro.php"><span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        
   <?php
}else if (!isset($_SESSION["usuario"]) && $_SERVER["PHP_SELF"] !="/pagina-web-2020/InicioSesion.php") {
    ?>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto text-center">
              <li class="nav-item active">
                <a class="nav-link text-light" href="InicioSesion.php">Iniciar Sesión<span class="sr-only"></span></a>
              </li>
            </ul>
          </div>
<?php
} else {
?>  
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto text-center">
              <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hola <?php echo $_SESSION['nombre']; ?>
                </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="UsuarioInicio.php">Resultados</a>
                  <a class="dropdown-item" href="MenuEncuestas.php">Encuestas</a>
                  <a class="dropdown-item" href="CerrarSesion.php">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </div>
    <?php
  }
  ?>
  </nav>
