<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Home</title>

    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.home.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/Chart.min.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">
</head>
<body>
<header>
    <?php AdminSideNav::SideNav();?>    
</header>

<main>
<nav class="blue">
        <a style="margin-left:1rem" class="brand-logo">Bienvenido</a>
</nav>
<div class="row">
    <!-- Grafico stock de peliculas -->
    <div class="col s12 m6">
        <div class="card" id="ChartMovies">
            <div class="card-content">
            <div class="center">
                <span class="card-title white-text"># de Peliculas</span>
            </div>
            <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
    <!--Grafico compras de peliculas a proveedores -->
    <div class="col s12 m6">
        <div class="card" id="CakeGraphic">
            <div class="card-content">
                <span class="card-title center white-text">Compras a proveedores</span>
                <div class="chart-container">
                    <div class="doughnut-chart-container">
                        <canvas id="doughnut-chartcanvas-1"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Grafico peliculas favoritas por usuarios -->
    <div class="col s12 m6">
        <div class="card" id="ChartTop">
            <div class="card-content">
                <span class="card-title center white-text">Top favoritos</span>
                <div id="chartTopFav">
                    <canvas id="chartTop">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- Grafico cantidad de peliculas vendidas -->
    <div class="col s12 m6">
        <div class="card" id="chartTopFav">
            <div class="card-content">
            <span class="card-title center white-text">Peliculas Vendidas</span>
            <div>
                <canvas id="MostSailChart"></canvas>
            </div>
            </div>
        </div>
    </div>
    <!-- Grafico ventas por dia -->
    <div class="col s12 m12">
        <div class="card" id="SailsCard">
            <div class="card-content">
                <span class="card-title center white-text">Ventas por fechas</span>
                <div>
                    <canvas id="SailsDates"></canvas>
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
<script src="../../resources/dashboard/controllers/MainDashboard.js"></script>
<script src="../../resources/dashboard/js/Chart.min.js"></script>
<script src="../../resources/dashboard/controllers/ChartController.js"></script>

</body>
</html>