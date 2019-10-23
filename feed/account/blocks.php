<?php 
require_once('../../global/helpers/admin-sidenav.php');
require_once('../../global/helpers/settings-template.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bloqueos</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/settings.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">
</head>
<body>
    <header>
        <?php 
            AdminSideNav::SideNav();
        ?>
    </header>
    <main>
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Usuarios bloqueados o inactivos</span>
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Usuario</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>

                            <tbody id="readUsers">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Respuestas de recuperación de contraseña</span>
                        <table class="responsive-table">
                            <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Respuesta</th>
                                <th>Acciones</th>
                            </tr>
                            </thead>
                            <tbody id="readAnswers">
                            </tbody>
                        </table>
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
<script src="../../resources/dashboard/controllers/BlockController.js"></script>
</body>
</html>