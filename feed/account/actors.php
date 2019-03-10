<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Actores </title>

    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.home.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">

</head>
<body>
    
    <header>
         <?php AdminSideNav::SideNav();?>    
    </header>
    <main>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Actores</span>
            </div>
        </div>       
        <!--Barra de opciones --> 
        <div class="row">
            <div class="card blue">
                <div class="card-content">
                    <a data-target="addactor" class="btn small white blue-text modal-trigger">Agregar Actor</a>
                </div>
            </div>
        </div>
        <!--Modal add Actor-->
        <div id="addactor" class="modal">
            <div class="modal-content">
               <div class="card">
                <div class="card-content">
                    <span class="card-title">Agregar Actor</span>
                    <input type="text" placeholder="ingrese nombre de actor">
                    <button class="btn small blue white-text">Agregar</button>
                </div>
               </div>
            </div>
            <div class="modal-footer">
                <a class="modal-close waves-effect waves-green btn-flat">Agree</a>
            </div>
        </div> 
        <!--Tabla de actores -->
        <div class="row">
            <div class="card z-depht-3">
                <div class="card-content">
                    <table class="highlight z-depht-5">
                        
                        <thead>
                            <tr>
                                <th><span class="card-title">Actor Name</span></th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Alvin</td>
                                
                            </tr>
                            <tr>
                                <td>Alan</td>
                                
                            </tr>
                            <tr>
                                <td>Jonathan</td>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
<footer>
</footer>
<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../resources/dashboard/controllers/ActorsController.js"></script>
</body>
</html>
