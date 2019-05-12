<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Administradores</title>

    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.managers.css">

</head>
<body>
    <header>
        <?php AdminSideNav::SideNav();?>    
    </header>
    <main>
        <!--Nav Bar -->
            <nav class="blue">
                <div class="nav-wrapper">
                    <ul id="nav-mobile" class="right">
                        <li><a class="modal-trigger" href="#ModalCreateAdmin"> <i class="material-icons left">person</i> Crear Administrador</a></li>
                    </ul>
                </div>
            </nav>
        <!--List of Administrators -->
        
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <div class="center">
                        <span class="card-title">Administradores</span>
                    </div>
                    <!--<div class="row" id="SearchRow">
                        <nav class="white">
                            <div class="nav-wrapper">
                            <form>
                                <div class="input-field">
                                <input id="search" type="search" placeholder="Buscar...">
                                <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                <i class="material-icons">close</i>
                                </div>
                            </form>
                            </div>
                        </nav>
                    </div>
-->
                    <div class="row" id="TableAdmins">
                    <table class="responsive-table">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody id="ListAdministrators">

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modals -->
        <div class="modal" id="ModalCreateAdmin">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <form class="col s12" id="FormCreateAdminUser">
                                <div class="row">
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input  name="NameUser" id="NameUser" type="text" class="validate" placeholder="Nombre">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input  type="text" name="LastNameUser" id="LastNameUser" class="validate" placeholder="Apellido">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">assignment_ind</i>
                                        <input  name="Username" id="Username" type="text" class="validate" placeholder="Usuario">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">mail</i>
                                        <input  type="text" name="EmailUser" id="EmailUser" class="validate" placeholder="Email">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">vpn_key</i>
                                        <input  type="password" name="UserPassword" id="UserPassword" class="validate" placeholder="Ingrese Contraseña">
                                    </div>
                                    <div class="input-field col s12 m6">
                                        <i class="material-icons prefix">vpn_key</i>
                                        <input  type="password" class="validate" name="UserPassword2" id="UserPassword2" placeholder="Repita la contraseña">
                                    </div>
                                </div>
                                <div class="center">
                                    <button type="submit" class="btn blue"> <i class="material-icons left">add</i>Agregar</button>
                                    <a class="btn grey modal-close"> <i class="material-icons left">close</i>Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Edit -->
        <div class="modal" id="ModalEditAdmin">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
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
            </div>
        </div>
         <!--Delete -->
         <div class="modal" id="ModalDeleteAdmin">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <form class="col s12" id="FormDeleteAdminUser">
                                <div class="row">
                                    <input type="hidden" id="id_listDelete" name="id_listDelete">
                                </div>
                                <div class="center">
                                    <span id="notificacion" class="card-title"></span>
                                    <button type="submit" class="btn red"> <i class="material-icons left">delete</i>Eliminar</button>
                                    <a class="btn grey modal-close"> <i class="material-icons left">close</i>Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
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
<script src="../../resources/dashboard/controllers/ManagersController.js"></script>
</body>
</html>