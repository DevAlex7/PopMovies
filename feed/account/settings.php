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
        <div class="row">
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"> <i class="material-icons left">edit</i> Cambiar contraseña</span>
                        <div class="divider"></div>
                        <div class="row" id="passwordsForm">
                            <form class="col s12" id="formChangePassword">
                                <div class="row">
                                    <div class="input-field col s12 m6 offset-m3">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="actualpass" name="actualpass" type="password">
                                        <label for="actualpass">Ingrese su contraseña actual</label>
                                    </div>
                                    <div class="input-field col s12 m6 offset-m3">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="passuser1" name="passuser1" type="password">
                                        <label for="passuser1">Ingrese nueva contraseña</label>
                                    </div>
                                    <div class="input-field col s12 m6 offset-m3">
                                        <i class="material-icons prefix">lock</i>
                                        <input id="passuser2" name="passuser2" type="password">
                                        <label for="passuser2">Repita la nueva contraseña  </label>
                                    </div>
                                </div>
                                <div class="row center">
                                    <button type="submit" class="btn blue">Cambiar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12 m8 offset-m2">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title"> <i class="material-icons left">people</i> Usuarios de confianza</span>
                        <div class="divider"></div>
                        <div class="center">
                            <a class="btn blue modal-trigger" href="#viewUsers" id="btnUsers"> <i class="material-icons left">people</i> Ver usuarios</a>
                        </div>
                        <div class="row">
                            <div class="col s12 m12">
                            <table class="centered">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td>Alvin</td>
                                        <td>Eclair</td>
                                        <td>$0.87</td>
                                    </tr>
                                    <tr>
                                        <td>Alan</td>
                                        <td>Jellybean</td>
                                        <td>$3.76</td>
                                    </tr>
                                    <tr>
                                        <td>Jonathan</td>
                                        <td>Lollipop</td>
                                        <td>$7.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="viewUsers">
            <div class="modal-content">
                <div class="card-panel blue">
                    <h5 id="textBold">Usuarios</h5>
                </div>
                <div class="row" id="result">
                </div>
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