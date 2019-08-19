<?php 
require_once('../../global/helpers/admin-sidenav.php');
require_once('../../global/helpers/settings-template.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Configuraciones </title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/settings.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">
</head>
<body>
    <header>
        <?php 
            AdminSideNav::SideNav();
        ?>
    </header>
    <main>
        <div class="row" id="options">
            <div class="col s12 m12">
                <ul class="tabs">
                    <li class="tab col s3"><a href="#test1" class="black-text"> <i class="material-icons" id="iconFigure">fingerprint</i> Contraseña </a></li>
                    <li class="tab col s3"><a href="#test2" class="black-text">Test 2</a></li>
                    <li class="tab col s3"><a href="#test3" class="black-text">Test 2</a></li>
                    <li class="tab col s3"><a href="#test4" class="black-text">Test 4</a></li>
                </ul>
            </div>
        <div id="test1" class="col s12">
            <div class="row center" id="cardcp">
                <div class="col s12 m5 offset-m3">
                    <div class="card" id="card-changeP">
                        <div class="card-content">
                            <span class="card-title center" id="titleBold">Cambiar contraseña</span>
                                <div class="row">
                                    <form class="col s12">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock</i>
                                                <input id="icon_prefix" type="password">
                                                <label for="icon_prefix">Ingrese su antigua contraseña</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock</i>
                                                <input id="sepass" type="password">
                                                <label for="sepass">Ingrese una nueva contraseña</label>
                                            </div>
                                            <div class="input-field col s12">
                                                <i class="material-icons prefix">lock</i>
                                                <input id="sepass2" type="password">
                                                <label for="sepass2">Repita la contraseña</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="test2" class="col s12">
            Test 2
        </div>
        <div id="test3" class="col s12">
            Test 3
        </div>
        <div id="test4" class="col s12">
            Test 4
        </div>
        </div>
    </main>
    <footer>

    </footer>
    <script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/dashboard/controllers/SettingsController.js"></script>
</body>
</html>