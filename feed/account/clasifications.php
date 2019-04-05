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
                        <form method="POST" id="SearchFieldClasification">
                            <div class="nav-wrapper">
                                    <div class="input-field">
                                        <input id="search" name="search" type="search" placeholder="Buscar clasificación">
                                        <label class="label-icon"><i class="material-icons black-text">search</i></label>
                                        <i class="material-icons" onClick="ClearSearchField()">close</i>
                                    </div>
                            </div>
                        </form> 
                        </nav>
                        <p id="searchbarsugestion" class="green-text">Sugerencia de busqueda: AA, A, B, B15, C, D</p>
                        <span class="card-title" id="TitleTable">Lista de clasificaciones</span>
                        <div id="ClasificationsTable">
                            <table class="highlight">
                                <thead>
                                    <tr>
                                        <th>Clasificación</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="ClasificationsList">
                           
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Add Clasification -->
    <div class="modal" id="ModalAddClasification">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Agregar Clasificación</span>
                    <div class="row">
                        <form class="col s12" method="POST" id="ClasificationAddForm">
                            <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix black-text">view_list</i>
                                <input id="NameClasification" name="NameClasification" type="text" class="input-field" placeholder="Nombre de la clasificación">
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix black-text">view_headline</i>
                                <textarea name="DescriptionClasification" class="materialize-textarea" placeholder="Descripción de la clasificación" id="DescriptionClasification" cols="30" rows="10"></textarea>
                            </div>
                            <div class="input-field col s12 m12">
                                <button type="submit" class="btn green white-text"> <i class="material-icons left">add</i> Agregar</button>
                                <a class="btn modal-close grey">Cancelar</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Edit Clasification -->
    <div class="modal" id="ModalEditClasification">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Editar Clasificación</span>
                    <div class="row">
                        <form class="col s12" method="POST" id="ClasificationAddForm">
                            <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix black-text">view_list</i>
                                <input id="EditNameClasification" name="EditNameClasification" type="text" class="input-field" placeholder="Nombre de la clasificación">
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix black-text">view_headline</i>
                                <textarea name="EditDescriptionClasification" id="EditDescriptionClasification" class="materialize-textarea" placeholder="Descripción de la clasificación" id="DescriptionClasification" cols="30" rows="10"></textarea>
                            </div>
                            <div class="input-field col s12 m12">
                                <button type="submit" class="btn green white-text"> <i class="material-icons left">edit</i> Agregar</button>
                                <a class="btn modal-close grey">Cancelar</a>
                            </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal Delete Clasification -->
    <div class="modal" id="ModalDeleteClasification">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Agregar Clasificación</span>
                    <div class="row">
                        <form class="col s12" method="POST" id="ClasificationAddForm">
                            <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix black-text">view_list</i>
                                <input id="EditNameClasification" name="EditNameClasification" type="text" class="input-field" placeholder="Nombre de la clasificación">
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix black-text">view_headline</i>
                                <textarea name="EditDescriptionClasification" id="EditDescriptionClasification" class="materialize-textarea" placeholder="Descripción de la clasificación" id="DescriptionClasification" cols="30" rows="10"></textarea>
                            </div>
                            <div class="input-field col s12 m12">
                                <button type="submit" class="btn green white-text"> <i class="material-icons left">edit</i> Agregar</button>
                                <a class="btn modal-close grey">Cancelar</a>
                            </div>
                            </div>
                        </form>
                    </div>
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
<script src="../../resources/dashboard/controllers/ClasificationController.js"></script>
</body>
</html>