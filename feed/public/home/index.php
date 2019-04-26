<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>PopMovies - Bienvenido</title>
        <!-- ÍCONO DE LA VENTANA -->
        <link rel="shortcut icon" type="image/x-icon" href="../../../resources/public/img/Logo.ico">
        <!-- MATERIAL ICONS -->
        <link href="../../../resources/public/css/material-icons.css" rel="stylesheet">
        <!-- MATERIALIZE.MIN -->
        <link href="../../../resources/public/css/materialize.min.css" rel="stylesheet">
        <!-- ESTILO -->
        <link href="../../../resources/public/css/page.css" rel="stylesheet">
    </head>

    <body class="oa">
        <header>
            <nav class="black">
                <div class="nav-wrapper">
                    <div class="ico">
                        <a href="#" class="brand-logo"><i class="tiny material-icons">movie</i>PopMovies</a>
                    </div>
                    <div class="input-field search-field ">
                        <input id="search" type="search" placeholder="Busca una película" class="search white-text" required>
                        <label class="label-icon" for="search"><i class="material-icons white-text ">search</i></label>
                    </div>
                    <ul class="right">
                        <li><a href="sass.html">Trailers</a></li>
                        <li><a href="sass.html">Favoritos</a></li>
                        <li><a href="../login.php"><i class="tiny material-icons">power_settings_new</i></a></li>
                        <li><a> </a></li>
                        <!-- Dropdown Trigger
                        <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dropdown<i class="material-icons right">arrow_drop_down</i></a></li>-->
                    </ul>
                </div>
            </nav>
            <ul id="slide-out" class="sidenav sidenav-fixed">
                <li><a class="subheader">Géneros</a></li>
                <li><a href="account.php"><i class="material-icons">settings</i>Ajustes de la cuenta</a></li>
                <li><a href="users.php"><i class="material-icons">people</i>Usuarios del sistema</a></li>
                <li><a href="../login.php"><i class="material-icons">power_settings_new</i>Cerrar Sesión</a></li>
                <div class="user-view center">
                    <h6 class="white-text">.</h6>
                </div>
            </ul>
        </header>

        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="activator" src="images/office.jpg">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                <p><a href="#">This is a link</a></p>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
        <script src=""></script>
        <script src="../../../resources/public/js/init.js" type="text/javascript"></script>
    </body>
</html>