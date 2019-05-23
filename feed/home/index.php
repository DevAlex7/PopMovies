
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PopMovies | Login </title>

    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/index.css">

</head>
<body>
<div class="navbar-fixed">
    <nav class="nav-extended">
        <div class="nav-wrapper">
        <a href="/PopMovies/feed/home/main.php" class="brand-logo center">PopMovies</a>
        <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="/PopMovies/feed/public/"><i class="material-icons left">arrow_left</i> Regresar</a></li>
        </ul>
        </div>
    </nav>
</div>
<!-- SideNav -->
<ul class="sidenav" id="mobile-demo">
    <li><a>Salir</a></li>
</ul>

<div class="row" id="LoginCard">
    <div class="card col s12 m4 offset-m4">
        <div class="card-content">
            <div class="center">
                <span class="card-title">Iniciar Sesión</span>
            </div>
            <div class="row">
                <form class="col s12" method="POST" id="LoginForm">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="Username" name="Username" type="text">
                            <label for="Username">Usuario</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">vpn_key</i>
                            <input id="PasswordUser" name="PasswordUser" type="password">
                            <label for="PasswordUser">Contraseña</label>
                        </div>
                        <div class="center">
                            <button type="submit" class="btn blue"> <i class="material-icons right">check</i> Entrar</button>
                        </div>
                        <div class="divider" id="DividerDiv">
                        </div>
                        <div class="center" id="RegistrerPart">
                        <a href="/PopMovies/feed/home/signup.php">¿No tienes cuenta todavia? Ven y registrate</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/home/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/LoginController.js"></script>
</body>
</html>