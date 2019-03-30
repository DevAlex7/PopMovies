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

<!--Header -->
    <div class="row">
        <div class="card" id="HeaderPart">
            <div class="card-content">
                <span class="card-title white-text">Proveedores</span>
                <div class="row">
                    <div class="col s12 m6">
                        <nav id="SearchBar">
                        <form  method="post" id="SearchField">
                            <div class="nav-wrapper white" id="SearchBarInput">
                                <div class="input-field col s12">
                                    <input id="search" name="search" type="search" placeholder="Buscar..." required>
                                    <label class="label-icon" onClick="" for="search"><i class="material-icons black-text">search</i></label>
                                    <i class="material-icons" onClick="ClearSearchBar()">close</i>
                                </div>
                                <div class="input-field col s12">
                                    <a href="" id="BtnAddCustomer" data-target="ModalCreateCustomer" class="btn modal-trigger white black-text">Agregar Proveedor</a>
                                </div>
                            </div>
                        </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--Information -->
<div class="row" id="CustomersList">

</div>

<!-Modal add Customer -->
<div class="modal red" id="ModalCreateCustomer">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Agregar Proveedor</span>
                <div class="row">
                    <form class="col s12" method="POST" id="AddCustomerForm">
                        <div class="row">
                            <div class="input-field col s12 m6 offset-m3">
                                <i class="material-icons prefix black-text">account_circle</i>
                                <input id="NameProvider" name="NameProvider" type="text" class="input-field" placeholder="Ingrese nombre del proveedor">
                            </div>
                            <div class="input-field col s12 m6 offset-m3">
                                <i class="material-icons prefix black-text">email</i>
                                <input id="EmailProvider" name="EmailProvider" type="text" class="input-field" placeholder="Ingrese correo del proveedor"> 
                            </div>
                            <div class="input-field col s12 m6 offset-m3">
                                <i class="material-icons prefix black-text">store</i>
                                <input id="EnterpriseProvider" name="EnterpriseProvider" type="text" class="input-field" placeholder="Ingrese empresa del proveedor"> 
                            </div>
                            <div class="input-field col s12 m6 offset-m3">
                                <div class="row">
                                    <div class="col s12 center">
                                        <button class="btn red" type="submit"> <i class="material-icons left">add</i> Agregar </button>
                                        <a class="btn grey modal-close" > <i class="material-icons left">close</i> Cancelar </a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Show-Edit Customer -->
<div class="modal red" id="EditCustomerModal">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
            <span class="card-title">Información de proveedor</span> 
                <div class="row">
                    <form class="col s12" method="POST" id="EditCustomer">
                        <div class="row">
                            <input id="EditidProvider" name="EditidProvider" type="hidden" class="input-field" placeholder="id">
                            <div class="input-field col s12 m6 offset-m3">
                                <i class="material-icons prefix black-text">account_circle</i>
                                <input id="EditNameProvider" name="EditNameProvider" type="text" class="input-field" placeholder="Ingrese nombre del proveedor">
                            </div>
                            <div class="input-field col s12 m6 offset-m3">
                                <i class="material-icons prefix black-text">email</i>
                                <input id="EditEmailProvider" name="EditEmailProvider" type="text" class="input-field" placeholder="Ingrese correo del proveedor"> 
                            </div>
                            <div class="input-field col s12 m6 offset-m3">
                                <i class="material-icons prefix black-text">store</i>
                                <input id="EditEnterpriseProvider" name="EditEnterpriseProvider" type="text" class="input-field" placeholder="Ingrese empresa del proveedor"> 
                            </div>
                            <div class="input-field col s12 m6 offset-m3">
                                <div class="row">
                                    <div class="col s12 center">
                                    <button class="btn red" type="submit"> <i class="material-icons left">edit</i> Editar </button>
                                    <a class="btn grey modal-close" > <i class="material-icons left">close</i> Cancelar </a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Delete Customer -->
<div class="modal red" id="ModalDeleteCustomer">
    <div class="modal-content col s5">
        <div class="card">
            <form method="POST" id="DeleteCustomerForm">
                <div class="card-content center">
                        <span class="card-title">¿Desea eliminar a este proveedor?</span>
                        <input type="text" name="DeleteCustomerinput" id="DeleteCustomerinput">
                </div>
                <div class="card-action center">
                    <button class="btn red"> <i class="material-icons left">check</i> Aceptar</button>
                    <button class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</button>
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
<script src="../../resources/dashboard/controllers/CustomersController.js"></script>
</body>
</html>