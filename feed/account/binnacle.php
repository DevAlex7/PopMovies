<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Bitacora</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.binnacle.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">
</head>
<body>
<header>
<?php AdminSideNav::SideNav();?>    
</header>
<main>
    <div class="row">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Registro de actividades</span>
                
                <div class="row" id="ContentBinnacle">
                    <nav class="white">
                        <div class="nav-wrapper">
                            <form>
                                <div class="input-field">
                                    <input id="search" type="search" required>
                                    <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                                    <i class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>

                <div class="row">
                    <div class="center">
                        <div class="card-action">
                            <a  onClick="GetActionsforAdmins()" class="transparent border-none blue-text">Bitacora de administradores</a>
                            <a  onclick="GetActionsforClients()" class="transparent blue-text">Bitacora de Clientes</a>
                        </div>
                    </div>
                </div>
                <div class="collection" id="ListBinnacle">
                    
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
<script src="../../resources/dashboard/controllers/BinnacleController.js"></script>
</body>
</html>