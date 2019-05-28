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
</head>
<body>
<?php MovieNavBar::NavBar();?>
<div class="row">
    <div class="col s12 m3">
        <div class="card ">
            <div class="card-content">
                <span class="card-title">Opciones</span>
                <div class="collection" id="OptionsPart">
                    <a onclick="viewTodayCart();" class="collection-item blue-text" id="TodayItem">Hoy</a>
                    <a onclick="viewPendingCart();" class="collection-item blue-text" id="PendingItem">Ver pendientes</a>
                    <a onclick="viewCarPaid();" class="collection-item blue-text" id="PaidsItem">Ver pagados</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col s12 m9">
        <div class="card">
            <div class="card-content">
                <span class="card-title" id="Title"></span>
                <div id="TableInformation">
                    <table class="responsive-table" id="Information">
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Confirm pay the order -->
<div class="modal" id="ConfirmBuy">
    <div class="modal-content">
        <div class="row">
            <div class="card">
                <div class="card-content">
                    <div class="center">
                    <span class="card-title"> <i class="material-icons green-text accent-4">shopping_cart</i> Detalles de su carrito</span>
                    </div>
                    <span>Nombre de la pelicula:</span>
                    <span class="card-title" id="SpanNameMovie"></span>
                    <span>Precio:</span>
                    <span id="SpanPriceMovie" class="card-title"></span>
                    <div id="Divider" class="divider"></div>
                    <div id="DetailCart">
                        <span>Cantidad solicitada:</span>
                        <span id="SpanCountCart" class="card-title"> </span>
                        <span>Total de compra:</span>
                        <span id="SpanTotalOrder" class="card-title"></span>
                        <span>Fecha de pedido:</span>
                        <span id="SpanDateOrder" class="card-title"></span>
                    </div>
                    <div class="divider"></div>
                    <div class="center">
                    <a onclick="confirmPay()" class="btn green accent-4" id="ConfirmPayment">Pagar</a>
                    <a class="btn grey  modal-close" id="ConfirmPayment"> <i class="material-icons left">close</i> Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal red" id="ConfirmCancel">
    <div class="modal-content">
        <div class="card red">
            <div class="card-content">
                <div class="center">
                    <span class="card-title white-text">¿Desea borrar esta orden de su lista de carrito?</span>
                    <div class="card-action">
                    <a onclick="cancelOrderToday();" class="btn green accent-4">Si, borrar</a>
                    <a class="grey modal-close btn">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal red" id="ConfirmCancelPending">
    <div class="modal-content">
        <div class="card red">
            <div class="card-content">
                <div class="center">
                    <span class="card-title white-text">¿Desea borrar esta orden de su lista de carrito?</span>
                    <div class="card-action">
                    <a onclick="cancelOrderPending();" class="btn green accent-4">Si, borrar</a>
                    <a class="grey modal-close btn">Cancelar</a>
                    </div>
                </div>
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