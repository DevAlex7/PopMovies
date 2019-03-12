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
    <link rel="stylesheet" href="../../resources/dashboard/css/css.home.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">
</head>
<body>
    <header>
        <?php  AdminSideNav::SideNav();?>
    </header>
    <main>

        <!--NavBar Memberships-->     
        <nav class="blue white-text">
            <div class="nav-wrapper">
            <a href="#!" class="brand-logo center"><i class="material-icons">bookmark</i>Membresias</a>
                <ul class="right hide-on-med-and-down">
                    <li><a data-target="addMembership" class="waves-effect waves-light btn white blue-text modal-trigger">Agregar Membresia</a></li>
                </ul>
            </div>
        </nav>

        <!--Modal Add Memberships -->
        <div id="addMembership" class="modal">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                        <form method="post" id="form-create" enctype="multipart/form-data">
                            <span class="card-title">Agregue una membresia</span>
                                <input type="text" name="NameActor" id="NameActor" placeholder="ingrese nombre de actor">
                                <button type="submit" class="btn small blue white-text tooltipped" data-tooltip="Crear">Agregar</button>
                            </div>
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