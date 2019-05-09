<?php
    require_once('../../global/helpers/tab.php');
    publicSite::headerTemplate('Iniciar Sesión');
?>
    <body class="Aki">
        <div class="row">
            <div class="col s12">
                <div id="LoginStyle">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 Card">
                        <form method="post" id="login-form">
                            <div class="row">
                                <div class="input-field col s12">
                                    <h5 class="ml-4">Iniciar Sesión</h5>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons black-text prefix pt-2">person_outline</i>
                                    <input id="username" type="text" name="username" class="validate" required/>
                                    <label for="username">Nombre de usuario</label>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <i class="material-icons black-text prefix pt-2">lock_outline</i>
                                    <input id="password" type="password" name="password" class="validate" required/>
                                    <label for="password">Contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button type="submit" class="btn waves-effect waves-light border-round black col s12 tooltipped"
                                    data-tooltip="Ingresar">ENTRAR</button>
                                </div>
                            </div>
                            <div class="row center">
                                <div class="input-field col s12">
                                    <p class="margin medium-small"><a href="forget.php">Olvidé mi contraseña</a></p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php
publicSite::footerTemplate('index.js');
?>