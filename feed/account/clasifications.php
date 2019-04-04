<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Clasificaciones</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.clasifications.css">
</head>
<body>
<header>
    <?php AdminSideNav::SideNav();?>  
</header>
<main>
    <div class="card">
        <div class="card-content">
            <span class="card-title">Clasificaciones</span>
            <button class="btn blue modal-trigger" data-target="ModalAddClasification">Agregar clasificación</button>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m12">
                <div class="card">
                    <div class="card-content">
                        <nav class="white">
                            <div class="nav-wrapper">
                                <form>
                                    <div class="input-field">
                                        <input id="search" type="search" placeholder="Buscar clasificación">
                                        <label class="label-icon"><i class="material-icons black-text">search</i></label>
                                        <i class="material-icons">close</i>
                                    </div>
                                </form>
                            </div>
                        </nav>
                        <p id="searchbarsugestion" class="green-text">Sugerencia de busqueda: AA, A, B, B15, C, D</p>
                        <span class="card-title" id="TitleTable">Lista de clasificaciones</span>
                        <div id="ClasificationsTable">
                        <table class="highlight">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Item Name</th>
                                    <th>Item Price</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>Alvin</td>
                                    <td>Eclair</td>
                                    <td>$0.87</td>
                                </tr>
                                <tr>
                                    <td>Alan</td>
                                    <td>Jellybean</td>
                                    <td>$3.76</td>
                                </tr>
                                <tr>
                                    <td>Jonathan</td>
                                    <td>Lollipop</td>
                                    <td>$7.00</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="ModalAddClasification">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Agregar Clasificación</span>
                <form method="post" id="ClasificationAddForm">
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix black-text">list</i>
                                    <input type="text" name="NameClasification" id="NameClasification" placeholder="Ingrese nombre de clasificación">
                                </div>
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix black-text">view_headline</i>
                                    <textarea class="materialize-textarea" id="DescriptionClasification" name="DescriptionClasification" type="text" name="" placeholder="Ingrese descripción de la clasificación" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer white">
                    <button class="btn green white-text" type="submit"> <i class="material-icons left">add</i> Agregar</button>
                    <a class="modal-close btn red"> <i class="material-icons left">close</i> Cancelar</a>
                </div>
                </form>
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
<script src="../../resources/dashboard/controllers/ClasificationController.js"></script>
</body>
</html>