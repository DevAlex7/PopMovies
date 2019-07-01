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