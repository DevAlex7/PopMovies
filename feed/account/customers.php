<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Proveedores</title>

    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.customers.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">
</head>
<body>
    
<header>
    <?php AdminSideNav::SideNav();?>
</header>
<main>

    <div class="row">
        <div class="card">
            <div class="card-content">
                <span class="card-title"> <i class="material-icons">business</i> Proveedores</span>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col s12 m5">
                        <!--Search Bar -->
                        <nav class="white">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input id=search type="search" placeholder="Filtrar..." required>
                                        <label class="label-icon"> <i class="material-icons black-text">search</i> </label>
                                    </div>
                                </form>
                            </div>
                        </nav>
                    </div>
                </div>
               <!-- <a class="btn" id="addCustomerbtn"> <i class="material-icons left">add</i> Agregar proveedor</a> -->
            </div>
        </div>
    </div>
    <!--Body Main -->
    <div class="row">
       <div class="col s12 m4">
            <div class="card" id="CardAdd">
                <div class="card-content center">
                <span class="card-title">Agregar Proveedor</span>
                <a href="" class="btn blue modal-trigger" data-target="ModalAddCustomer" id="AddCustomerBtn">+</a>
                </div>
            </div>
       </div>

       <!--Customers -->
       <div class="row">
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">sfsdf</span>
                        <span class="card-title">sa</span>
                        <span class="card-title">sfsdf</span>
                    </div>
                    <div class="card-action grey lighten-4">
                        <a href="" class="white-text btn small blue accent-4 tooltipped" data-position="bottom" data-tooltip="Información"><i class="material-icons">info</i></a>
                        <a href="" class="white-text btn small blue accent-4 tooltipped" data-position="top" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                        <a href="" class="white-text btn small blue accent-4 tooltipped" data-position="bottom" data-tooltip="Enviar un correo"><i class="material-icons">send</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="ModalAddCustomer">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Agregar Proveedor</span>
                    <div class="row">
                        <form class="col s12" method="POST" id="CreateProvider">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="material-icons prefix black-text">face</i>
                                    <input type="text" id="NameProvider" placeholder="Ingrese nombre del proveedor">
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix black-text">drafts</i>
                                    <input type="email" id="EmailProvider" placeholder="Ingrese correo del proveedor">
                                </div>
                                <div class="input-field col s6">
                                    <i class="material-icons prefix black-text">business</i>
                                    <input type="text" id="EnterpriseProvider" placeholder="Ingrese empresa proveedora">
                                </div>
                            </div>
                            <button type="submit" class="btn small blue"> <i class="material-icons left ">add</i> Agregar</button>
                            <a href="#!" class="modal-close waves-effect waves-green btn small blue-grey"> <i class="material-icons left ">close</i> Cancelar</a>
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
<script src="../../resources/dashboard/controllers/CustomersController.js"></script>
</body>
</html>