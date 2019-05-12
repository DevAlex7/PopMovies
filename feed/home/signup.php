<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PopMovies | Registro</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/signup.css">
</head>
<body>
<div class="navbar-fixed">
    <nav class="nav-extended">
        <div class="nav-wrapper">
        <a href="/PopMovies/feed/home/main.php" class="brand-logo center">PopMovies</a>
        <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a onclick="Open()" data-target="mobile-demo"> <i class="material-icons left">menu</i> Menu</a></li>
            <li><a href=""> <i class="material-icons left">close</i> Salir</a></li>
        </ul>
        </div>
    </nav>
</div>
<!-- SideNav -->
<ul class="sidenav" id="mobile-demo">
    <li><a>Salir</a></li>
</ul>
<div class="row">
    <div class="card col s12 m4 offset-m4">
        <div class="card-content">
            
            <div class="row">
                <form class="col s12" id="FormClientRegistrer">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix black-text">account_circle</i>
                            <input id="NameUser" name="NameUser" type="text">
                            <label class="black-text" for="NameUser">Nombre</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix black-text">account_circle</i>
                            <input id="LastnameUser" name="LastnameUser" type="text">
                            <label class="black-text" for="LastnameUser">Apellido</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix black-text">mail</i>
                            <input id="EmailUser" name="EmailUser" type="text">
                            <label class="black-text" for="EmailUser">Correo electronico</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix black-text">account_box</i>
                            <input id="Username" name="Username" type="text">
                            <label class="black-text" for="Username">Usuario</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix black-text">vpn_key</i>
                            <input id="PasswordUser" name="PasswordUser" type="password">
                            <label class="black-text" for="PasswordUser">Contraseña</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix black-text">vpn_key</i>
                            <input id="Passwordtwo" name="Passwordtwo" type="password">
                            <label class="black-text" for="Passwordtwo">Repita su contraseña</label>
                        </div>
                        <div class="center">
                            <button type="submit" class="btn blue"> <i class="material-icons right">near_me</i> Registrarme</button>
                            <a href="/PopMovies/feed/home/" class="btn blue"> <i class="material-icons right">person_pin</i> Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/SignupController.js"></script>
</body>
</html>