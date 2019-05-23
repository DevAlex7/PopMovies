<?php require_once('../../global/helpers/movies-sidenav.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PopMovies | Generos</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/genders.css">
</head>
<body>
  <?php MovieNavBar::NavBar(); ?>
<div class="row" id="SearchContent">
  <div class="col s12 m8 offset-m2">
    <nav class="white">
      <div class="nav-wrapper">
        <form>
          <div class="input-field">
            <input id="search" type="search" placeholder="Buscar un genero...">
            <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
            <i class="material-icons">close</i>
          </div>
        </form>
      </div>
    </nav>
  </div>
</div>      
<div class="container">
    <div class="row" id="GendersContent">
    
    </div>
</div>
      

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/GenderController.js"></script>
</body>
</html>