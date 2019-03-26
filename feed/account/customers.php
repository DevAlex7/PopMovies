<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Proveedores</title>

    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.customers.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">
</head>
<body>
    
<header>
    <?php AdminSideNav::SideNav();?>
</header>
<main>
<ul id='dropdown1' class='dropdown-content'>
    <li><a href="#!">one</a></li>
    <li><a href="#!">two</a></li>
    <li class="divider" tabindex="-1"></li>
    <li><a href="#!">three</a></li>
    <li><a href="#!"><i class="material-icons">view_module</i>four</a></li>
    <li><a href="#!"><i class="material-icons">cloud</i>five</a></li>
  </ul> 
<!--Header -->
    <div class="row">
        <div class="card yellow">
            <div class="card-content">
                <span class="card-title">Customers</span>
                <div class="row">
                    <div class="col s12 m6">
                        <nav id="SearchBar">
                        <form  method="post" id="SearchField">
                            <div class="nav-wrapper white" id="SearchBarInput">
                                <div class="input-field col s11">
                                    <input id="search" name="search" type="search" placeholder="Buscar..." required>
                                    <label class="label-icon" onClick="" for="search"><i class="material-icons black-text">search</i></label>
                                    <i class="material-icons" onClick="ClearSearchBar()">close</i>
                                </div>
                                <div class="s1">
                                    <i class="material-icons black-text tooltipped" data-position="right" data-tooltip="Agregar Customer" onClick="ClearSearchBar()">add</i>
                                </div>
                            </div>
                        </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--Information -->
<div class="row" id="CustomersList">

</div>


    
</main>
<footer>

</footer>
<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/dashboard/controllers/CustomersController.js"></script>
</body>
</html>