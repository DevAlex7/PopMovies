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
    
    <!--Add Clasifications to Movies -->
    <div class="card">
        <div class="card-content">
            <div class="chip">¡Agrega una clasificación a tus peliculas!</div>
            <div id="AddClasificationtoMovies">
                <div class="row">
                    <form class="col s12" id="ListClasificationsinMovies" name="ListClasificationsinMovies" method="POST">
                        <div class="row">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">view_list</i>
                                <select name="ClasificationsSelect" id="ClasificationsSelect"></select>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">movie</i>
                                <select name="MoviesSelect" id="MoviesSelect"></select>
                            </div>
                        </div>
                        <div class="card-action center">
                        <button type="submit" class="btn blue align-center">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m12">
                <table class="centered">
                    <thead>
                    <tr>
                        <th>Clasificación</th>
                        <th>Pelicula</th>
                        <th>Pelicula</th>
                    </tr>
                    </thead>
                    <tbody id="readClasificationsInMovies">
                    </tbody>
                </table>
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
                        <form class="col s12" method="POST" id="ClasificationEditForm">
                            <div class="row">
                            <input id="idEditClasification" name="idEditClasification" type="hidden" class="input-field" placeholder="Nombre de la clasificación">
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
            <div class="card red">
                <div class="card-content">
                <span class="card-title white-text">Eliminar clasificación</span>
                    <div class="row">
                        <form class="col s12" method="POST" id="ClasificationDeleteForm">
                            <div class="row">
                                <input type="hidden" name="idDeleteClasification" id="idDeleteClasification">
                                <div class="input-field col s12 m6">
                                    <span id="deleteClasificationSpan" name="deleteClasificationSpan" class="card-title white-text"></span>
                                    <span class="card-title white-text" id="showNameDeleteSpan" name="showNameDeleteSpan" ></span>
                                </div>
                                <div class="input-field col s12 m12">
                                    <button type="submit" class="btn red white-text"> <i class="material-icons left">delete</i> Eliminar</button>
                                    <a class="btn modal-close grey">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal edit clasification in Movie -->
    <div class="modal" id="ModalEditClasificationInMovie">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12 m12" method="POST" id="FormEditClasificationInMovie">
                            <div class="row">
                                <input type="hidden" id="Id_List" name="Id_List">
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">view_list</i>
                                    <select name="EditSelectClasification" id="EditSelectClasification"></select>
                                    <label for="icon_prefix">Clasificación</label>
                                </div>
                                <div class="input-field col s12 m12">
                                    <i class="material-icons prefix">movie</i>
                                   <select name="EditSelectMovie" id="EditSelectMovie" disabled></select>
                                    <label for="icon_telephone">Pelicula</label>
                                </div>
                                <div class="center">
                                    <button type="submit" class="btn green"> <i class="material-icons left">edit</i> Editar</button>
                                    <a class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal delete clasification in Movie -->
    <div class="modal" id="ModalDeleteClasificationInMovie">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12">
                            <div class="row">
                                
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