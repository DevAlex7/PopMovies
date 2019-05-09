    <?php
    require_once('../../global/helpers/tab.php');
    publicSite::headerTemplate('Olvidé mi contraseña');
    ?>
        <div class="row">
            <div class="col s12">
                <div id="LoginStyle" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 Card">
                        <form class="login-form">
                            <div class="row">
                                <div class="input-field col s12">
                                <h5 class="ml-4">Olvidé mi contraseña</h5>
                                <p class="ml-4">Se te enviará un enlace para que puedas cambiarla</p>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <i class="material-icons black-text prefix pt-2">mail</i>
                                <input id="email" type="text">
                                <label for="email" class="center-align">Correo electrónico</label>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <a href="password.php"
                                    class="btn waves-effect waves-light border-round black col s12">SIGUIENTE</a>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="input-field col s12">
                                <p class="margin medium-small"><a href="login.php">Volver</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- PLUGIN: Funciona para los textarea dinámicos. -->
    <script src="../../resources/public/js/plugin.js" type="text/javascript"></script>
</body>
</html>