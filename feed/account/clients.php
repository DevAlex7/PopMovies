<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DashBoard | Clientes </title>

    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.clients.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">
</head>
<body>
    <header>
    <?php AdminSideNav::SideNav();?>   
    </header>
    <main>
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel">
                    <div class="center">
                        <span class="card-title">Clientes</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m12">
                <table class="responsive-table">
                    <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Usuario</th>
                        <th>Membresia</th>
                    </tr>
                    </thead>

                    <tbody id="ListClients">

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <footer>

    </footer>
<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/dashboard/controllers/ClientController.js"></script>
</body>
</html>