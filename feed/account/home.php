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
</head>
<body>
<header>
    <?php AdminSideNav::SideNav();?>    
</header>

<main>

<div class="card">
    <div class="card-content">
        <span class="card-title">Bienvenido</span>
    </div>
</div>
<div class="row">
    <div class="col m5">
        <div class="card">
            <div class="card-content">
            <canvas id="myChart"></canvas>
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