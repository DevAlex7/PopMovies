<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Memberships</title>

    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.memberships.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">
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
                    <span class="card-title"> <i class="material-icons">bookmark</i> Membresias </span>
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
                    <form class="col s12" method="post" id="form-create" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col s12">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">bookmark</i>
                                        <input id="icon_prefix" type="text" id="NameMembership" name="NameMembership" class="validate">
                                        <label for="icon_prefix">Nombre de membresia</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <i class="material-icons prefix">attach_money</i>
                                        <input id="icon_price" name="priceMembership" type="number" step="0.01" min="1" max="20" class="validate">
                                        <label for="icon_price">Precio</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn small blue white-text tooltipped" data-tooltip="Crear">Agregar</button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            </div>
            </form>
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