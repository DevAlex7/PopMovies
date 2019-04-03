<!DOCTYPE html>
<!-- IDIOMA DE LA PÁGINA -->
<html lang="es">
  <!-- BEGIN: Head -->
  <head>
    <!-- CARACTERES ESPECIALES -->
    <meta charset="UTF-8">
    <!-- TÍTULO DE LA VENTANA -->
    <title>PopMovies - Iniciar Sesión</title>
    <!-- ÍCONO DE LA VENTANA -->
    <link rel="shortcut icon" type="image/x-icon" href="../../resources/public/img/Logo.ico">
    <!-- MATERIAL ICONS -->
    <link href="../../resources/public/css/icon.css" rel="stylesheet">
    <!-- ESTILO DEL FORMULARIO -->
    <link rel="stylesheet" type="text/css" href="../../resources/public/materialize.css">
    <!-- TAMAÑO DEL FORMULARIO -->
    <link rel="stylesheet" type="text/css" href="../../resources/public/style.css">
    <!-- POSICIÓN Y BG -->
    <link rel="stylesheet" type="text/css" href="../../resources/public/login.css">
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Navbar -->
  <header>
      <nav class="black">
        <div class="brand-sidebar black">
          <h1 class="logo-wrapper">
            <a class="brand-logo center" href="">
              <img src="../../resources/public/img/icon.png" alt="ico-illusion">
              <span class="white-text">PopMovies</span>
            </a>
          </h1>
        </div>
      </nav>
    </header>
    <!-- END: Navbar -->

  <body class="vertical-layout page-header-light vertical-menu-collapsible vertical-menu-nav-light 1-column login-bg blank-page" data-open="click" data-menu="vertical-menu-nav-dark" data-col="1-column">
    <div class="row">
      <div class="col s12">
        <div class="container">
          <div id="login-page" class="row">
            <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card">
              <form class="login-form">
                <div class="row">
                  <div class="input-field col s12">
                    <h5 class="ml-4">Iniciar Sesión</h5>
                  </div>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <i class="material-icons prefix pt-2">person_outline</i>
                    <input id="username" type="text">
                    <label for="username" class="center-align">Nombre de Usuario</label>
                  </div>
                </div>
                <div class="row margin">
                  <div class="input-field col s12">
                    <i class="material-icons prefix pt-2">lock_outline</i>
                    <input id="password" type="password">
                    <label for="password" class="">Contraseña</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col s12 m12 l12 ml-2 mt-1">
                    <p>
                      <label>
                        <input type="checkbox">
                        <span>Recordar mis datos</span>
                      </label>
                    </p>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <a href="homeviews/index.php" class="btn waves-effect waves-light border-round black col s12">ENTRAR</a>
                  </div>
                </div>
                <div class="row center">
                  <div class="input-field col s12">
                    <p class="margin medium-small"><a href="forgot.php">Olvidé mi contraseña</a></p>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

  <!-- PLUGIN: Funciona para los textarea dinámicos. -->
  <script src="js/plugin.js" type="text/javascript"></script>
  
</html>