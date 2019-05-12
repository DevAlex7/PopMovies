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
                                    <h5 class="ml-4">Reestablecer</h5>
                                    <p class="ml-4">Escribe una nueva contraseña</p>
                                </div>
                            </div>
                            <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">lock_outline</i>
                                        <input id="password" type="password">
                                        <label for="password" class="">Contraseña</label>
                                    </div>
                            </div>
                            <div class="row margin">
                                    <div class="input-field col s12">
                                        <i class="material-icons prefix pt-2">replay</i>
                                        <input id="repeat" type="password">
                                        <label for="repeat" class="">Repite la contraseña</label>
                                    </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12">
                                    <a href="login.php"
                                    class="btn waves-effect waves-light border-round black col s12">CAMBIAR</a>
                                </div>
                            </div>
                            <h6 class="white-text">.</h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- PLUGIN: Funciona para los textarea dinámicos. -->
        <script src="../../resources/public/js/plugin.js" type="text/javascript"></script>
    </body>
</html>