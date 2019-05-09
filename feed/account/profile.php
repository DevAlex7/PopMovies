<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Mi perfil</title>

    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.profile.css">

</head>
<body>
    <header>
        <?php AdminSideNav::SideNav();?>   
    </header>
    <main>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <div class="center"> <span class="card-title">¡Bienvenido a tu perfil!</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card  light-blue darken-4">
                    <div class="card-content">
                        <span class="card-title white-text">Tu información personal</span>
                        <div class="divider" style="margin-top:1rem"></div>
                        <span class="card-title white-text">Nombre Completo:</span>
                        <p class="white-text" id="NameUser"></p>
                        <span class="card-title white-text" style="margin-top:1rem">Usuario:</span>
                        <p class="white-text" id="Username"></p>
                        <span class="card-title white-text" style="margin-top:1rem">Correo electronico:</span>
                        <p class="white-text" id="UsernameEmail"></p>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card   red darken-3">
                    <div class="card-content">
                        <span class="card-title white-text">Acciones que puedes hacer con tu cuenta</span>
                        <div class="divider white"></div>
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="card-panel">
                                    <button class="btn red">Eliminar mi cuenta</button>
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="card-panel">
                                    <button class="btn orange modal-trigger" onclick="EditbyId()" data-target="ModalEditProfile">Editar mi cuenta</button>
                                </div>
                            </div>
                            <div class="col s12 m12">
                                <div class="card-panel">
                                    <button class="btn indigo darken-2 modal-trigger" onclick="DeletebyId()" data-target="ModalEditProfile">Cambiar contraseña</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modals -->
        <div class="modal" id="ModalEditProfile">
            <div class="modal-content">
            <div class="row">
                            <form class="col s12" method="POST" id="FormEditAdminUser">
                                <div class="row">
                                    <input type="hidden" id="id_listEdit" name="id_listEdit">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input  name="EditNameUser" id="EditNameUser" type="text" class="validate" placeholder="Nombre">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input  type="text" name="EditLastNameUser" id="EditLastNameUser" class="validate" placeholder="Apellido">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">assignment_ind</i>
                                        <input  name="EditUsername" id="EditUsername" type="text" class="validate" placeholder="Usuario">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">mail</i>
                                        <input  type="text" name="EditEmailUser" id="EditEmailUser" class="validate" placeholder="Email">
                                    </div>
                                </div>
                                <div class="center">
                                    <button type="submit" class="btn orange"> <i class="material-icons left">edit</i>Editar</button>
                                    <a class="btn red modal-close"> <i class="material-icons left">close</i>Cancelar</a>
                                </div>
                            </form>
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
<script src="../../resources/dashboard/controllers/ProfileController.js"></script>
</body>
</html>