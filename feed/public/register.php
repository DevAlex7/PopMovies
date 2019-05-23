<?php
    require_once('../../global/helpers/tab.php');
    publicSite::headerTemplate('Registro');
    ?>
    <body class='Aki'>
        <div class="row">
            <div class="col s12">
                <div id="RegisterStyle" class="row">
                    <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 Card">
                        <form class="register-form" method="post">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <h5 class="ml-4">Registrarse</h5>
                                </div>
                            </div>
                            <div class="row margin">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">person_outline</i>
                                    <input id="name" type="text" name="first_name" class="validate" required>
                                    <label for="name" class="center-align">Nombre</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">person</i>
                                    <input id="lastname" type="text" name="last_name" class="validate" required>
                                    <label for="lastname" class="center-align">Apellido</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">email</i>
                                    <input id="email" type="text" name="e_mail" class="validate" required>
                                    <label for="email" class="center-align">Correo Electrónico</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">insert_emoticon</i>
                                    <input id="username" type="text" name="user_name" class="validate" required>
                                    <label for="username" class="center-align">Nombre de usuario</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">lock_outline</i>
                                    <input id="password" type="password" name="pass_word" class="validate" required>
                                    <label for="password" class="">Contraseña</label>
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons black-text prefix">replay</i>
                                    <input id="repeat" type="password" name="second_pass" class="validate" required>
                                    <label for="repeat" class="">Repite la contraseña</label>
                                </div>
                                <!--<label class="center-align col s12">
					                <input id="condicion" type="checkbox" name="condicion">
					                <span>Acepto <a href="#terminos" class="modal-trigger">términos y condiciones</a></span>
				                </label>-->
                            </div>
                            <div class="row center-align">
                                <button type="submit" class="btn waves-effect blue tooltipped"
                                data-tooltip="Registrar">Registrarse
                                </button>
                            </div>
                            <h6 class="white-text">.</h6>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Efecto parallax con una altura de 300px -->
        <div class="parallax-container">
            <div class="parallax">
                <img id="parallax">
            </div>
        </div>
        <?php
publicSite::footerTemplate('register.js');
?>