<?php require_once('../../global/helpers/movies-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PopMovies | Mi carrito </title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/car.css">
    <link rel="stylesheet" href="../../resources/home/css/sidenav.css">
</head>
<body>
    <?php MovieNavBar::NavBar();?>
<div class="row">
    <div class="col s12 m12">
        <div class="card">
            <div class="card-content">
                <span class="card-title" id="Title">Tu lista de orden</span>
                <div id="TableInformation">
                    <table class="responsive-table" id="Information">
                        <thead>
                            <tr>
                                <th>Pelicula</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="readList">
                        </tbody>      
                    </table>
                </div>
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card">
                            <div class="card-content">
                                <p id="TextCardPay" class="card-title left-align"></p>
                                <a class="btn green right-align accent-4 modal-trigger"  href="#ConfirmBuy">Pagar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Confirm pay the order -->
<div class="modal" id="ConfirmBuy">
    <div class="row">
        <div class="col s12 m12">
            <div class="card-panel">
                <p> <i class="material-icons left">shopping_cart</i> ¿Desea cancelar esta orden?</p>
            </div>
            <div class="center">
                <a class="btn green accent-4" id="btnPay" onClick="confirmPay()">Si, cancelar</a>
                <a class="btn red modal-close">No, cerrar</a>
            </div>
        </div>
    </div>
</div>
<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../resources/home/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/CarController.js"></script>
</body>
</html>