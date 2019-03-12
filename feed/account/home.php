<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Home</title>

    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.home.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">

</head>
<body>
<header>
    <?php AdminSideNav::SideNav();?>    
</header>

<main class="blue">

    <div class="row">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Bienvenido Administrador</span>
                <span class="card-title"></span>
            </div>
        </div>
    </div>

    <div class="row blue">
      <div class="col s12 m6">
          <div class="card">
              <div class="card-content">
                 <span class="card-title" id="Shop"></span>
                 <div class="divider"></div>
                 <a class="waves-effect waves-light btn-small transparent blue-text" id="ShowShops"><i class="material-icons left">shop</i>ir a ventas</a>
              </div>
          </div>
      </div>
      <div class="col s12 m6">
          <div class="card">
              <div class="card-content">
                <span class="card-title" id="Products"></span>
                <div class="divider"></div>
                <a class="waves-effect waves-light btn-small transparent blue-text" id="ShowProducts"><i class="material-icons left">movie</i>ver productos</a>
              </div>
          </div>
      </div>
      <div class="col s12 m6">
          <div class="card">
              <div class="card-content">
                <span class="card-title" id="Customers"></span>
                <div class="divider"></div>
                <a class="waves-effect waves-light btn-small transparent blue-text" id="ShowProducts"><i class="material-icons left">movie</i>ver productos</a>
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

</body>
</html>