<?php require_once('../../global/helpers/movies-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tendencias | PopMovies </title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/trending.css">
    <link rel="stylesheet" href="../../resources/home/css/sidenav.css">
</head>

<body>
<?php MovieNavBar::NavBar(); ?>

<div class="row" id="MovieTrendings">

</div>



<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../resources/home/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/TrendingController.js"></script>
</body>
</html>