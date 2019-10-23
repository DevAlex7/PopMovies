<?php require_once('../../global/helpers/movies-sidenav.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/feed.css">
    <link rel="stylesheet" href="../../resources/home/css/sidenav.css">
</head>
<body>

<?php MovieNavBar::NavBar(); ?>

<!--Main-->
<div class="row" id="SearchContent">
  <div class="col s12 m8 offset-m2">
    <nav class="white">
      <div class="nav-wrapper">
        <form>
          <div class="input-field">
            <input id="search" type="search" placeholder="Buscar una pelicula...">
            <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>
  </div>
</div>      
<div class="row">
    <div class="col s12 m12">
      <div class="row" id="ContentCards">
      </div>
    </div>
</div>

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/home/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/MainController.js"></script>
</body>
</html>