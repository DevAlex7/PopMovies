<?php require_once('../../global/helpers/movies-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PopMovies | Mis favoritos</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/favorites.css">
    <link rel="stylesheet" href="../../resources/home/css/sidenav.css">
</head>
<body>
    <!--Dropdown -->
    <ul id="Options" class='dropdown-content'>
        <li><a href="#!">one</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider" tabindex="-1"></li>
        <li><a href="#!">three</a></li>
        <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
        <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
    </ul>

    <?php MovieNavBar::NavBar(); ?>
    <div class="row">
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <span id="Title" class="card-title"> Peliculas que te gustan </span>
                    <div id="Information">
                        <h6 id="PTotalMovies"></h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card red">
                <div class="card-content">
                    <span class="white-text card-title">Lista de tus favoritos</span>
                    <div class="row" id="FavoritesPart" style="height:380px; overflow-y:scroll;">

                    </div>
                </div>
            </div>
        </div>      
    </div>

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/FavoriteController.js"></script>
</body>
</html>