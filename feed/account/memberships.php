<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Membresias</title>

    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.memberships.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">
</head>
<body>
    <header>
        <?php  AdminSideNav::SideNav();?>
    </header>
    <main>

        <!--NavBar Memberships-->     
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <span class="card-title"> Membresias </span>
                </div>
                <div class="card blue">
                    <div class="card-content">
                        <a data-target="addMembership" class=" waves-effect waves-light btn white blue-text modal-trigger">Agregar Membresia</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row" id="Memberships">
           
        </div>

        <!--Modal Add Memberships -->
        <div id="addMembership" class="modal">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                    <span class="card-title">Agregar Membresia</span>
                        <form class="col s12" method="POST" id="form-createMembership" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s12 m5">
                                            <i class="material-icons prefix blue-text">bookmark</i>
                                            <input id="icon_prefix" type="text" id="NameMembership" name="NameMembership" class="validate">
                                            <label for="icon_prefix">Nombre de membresia</label>
                                        </div>
                                        <div class="input-field col s12 m5">
                                            <i class="material-icons prefix green-text">attach_money</i>
                                            <input id="icon_price" name="priceMembership" type="number" step="0.01" min="1" max="20" class="validate">
                                            <label for="icon_price">Precio</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer white">
                                <button type="submit" class="btn small blue white-text tooltipped" data-tooltip="Crear">Agregar</button>
                                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>

        <!--Modal Show Membership -->
        <div id="ShowMembership" class="modal">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                    <span class="card-title">Información de la membresia</span>
                        <form class="col s12" method="POST" id="UpdateMembership" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix blue-text">bookmark</i>
                                            <input type="text" id="NameUpdateMembership" name="NameUpdateMembership" class="validate">
                                        </div>
                                        <div class="input-field col s6">
                                            <i class="material-icons prefix green-text">attach_money</i>
                                            <input placeholder="Precio" id="UpdatePriceMembership" name="UpdatePriceMembership" type="number" step="0.01" min="1" max="20" class="validate">
                                        </div>
                                        <input type="hidden" id="idUpdateMembership" name="idUpdateMembership" class="validate">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer white">
                                <button type="submit" class="btn small blue white-text tooltipped" data-tooltip="Editar">Editar</button>
                                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>

        <!--Modal Delete Membership -->
        <div id="ShowMembershipDelete" class="modal">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">  
                        <form class="col s12" method="POST" id="DeleteMembership" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col s12">
                                    <div class="row">
                                        <span class="card-title">¿Desea eliminar esta membresia?</span>
                                        <span class="card-title" id="DeleteNameMembership"></span>
                                        <input type="hidden" id="idDeleteMembership" name="idDeleteMembership" class="validate">
                                    </div>
                                    <div class="modal-footer white">
                                        <button type="submit" class="btn small red white-text tooltipped" data-tooltip="Eliminar">Eliminar</button>
                                        <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                                    </div>
                                </div>
                            </div>
                        </form>
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
<script src="../../resources/dashboard/controllers/MembershipsController.js"></script>
</body>
</html>