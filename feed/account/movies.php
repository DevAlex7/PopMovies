<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Peliculas</title>
    
    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.home.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">

</head>
<body>
<header>
    <?php AdminSideNav::SideNav(); ?>
</header>
<main>
        <div class="card">
            <div class="card-content">
                <span class="card-title">Peliculas</span>
            </div>
        </div>
        <!--Todas las peliculas-->
        <div class="row">
            <div class="col s12 m4">
                <div class="card z-depth-3">
                    <div class="card-content">
                      <div class="chip">
                        <p>miedo</p>
                      </div>
                      <div class="chip">
                        <p>miedo</p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
</main>
</body>
</html>