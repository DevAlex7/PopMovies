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
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a><i class="material-icons left">person</i>Crear Administrador</a></li>
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
                    <div class="row">
                    <table>
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
    </main>
    <footer>

    </footer>
</body>
</html>