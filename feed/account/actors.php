<?php require_once('../../global/helpers/admin-sidenav.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Actores</title>

    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.actors.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">

</head>
<body>
    
    <header>
         <?php AdminSideNav::SideNav();?>    
    </header>
    <main>
        <div class="card">
            <div class="card-content">
                <span class="card-title"> Actores</span>
            </div>
        </div>       
        <!-- Options bar --> 
        <div class="row">
            <div class="card blue">
                <div class="card-content">
                    <a data-target="addactor" class="btn small white blue-text modal-trigger">Agregar Actor</a>
                </div>
            </div>
        </div>
        <!--Search Bar -->
        <div class="row">
            <div class="col s12 m12">
            <nav class="white">
                <div class="nav-wrapper">
                    <form  method="POST" id="SearchField">
                        <div class="input-field">
                            <input id="searchActors" name="searchActors" type="search" placeholder="Buscar actores...">
                            <label class="label-icon " for="search"><i class="material-icons black-text">search</i></label>
                            <i onclick="clearSearchField()" class="material-icons">close</i>
                        </div>
                    </form>
                </div>
            </nav>
            </div>
        </div>
        <!--Table actors -->
        <div class="row" id="ActorsList">
            <div class="card z-depht-3">
                <div class="card-content">
                    <table class="highlight z-depht-5">
                        <thead>
                            <tr>
                                <th>Actor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="ActorsRead">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!--Add Actor to movie -->
        <div class="card">
            <div class="card-content">
                <div class="chip">¡Agrega un actor a cada pelicula!</div>
                <div id="AddActorstoMovies">
                    <div class="row">
                       <form class="col s12" id="ListMoviesinActors" name="ListMoviesinActors" method="POST">
                           <div class="row">
                               <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">movie</i>
                                    <select name="ActorsSelect" id="ActorsSelect"></select>
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
                <table class="highlight centered">
                    <thead>
                        <tr>
                            <th>Pelicula</th>
                            <th>Actor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="ActorsInMovies">
            
                    </tbody>
                </table>
            </div>
        </div>
<!-- ---------- Modals Actors in movies ---------->
<!--Modal edit Actors in Movies -->
<div class="modal" id="ModalEditActorsInMovies">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <form class="col s12 m12" id="FormEditActortoMovie">
                        <div class="row">
                        <span class="card-title">Editar Actor para</span>
                            <input class="hide" type="text" name="id_list" id="id_list">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">face</i>
                                <select name="SelectEditActortoMovie" id="SelectEditActortoMovie"></select>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">movie</i>
                                <select name="SelectEditMovie" id="SelectEditMovie"></select>
                            </div>
                            <div class="center">
                                <button type="submit" class="btn blue center-align"> <i class="material-icons left">edit</i>Editar</button> 
                                <a class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal delete Actors in Movies -->
<div class="modal red" id="DeleteActorsInMovies">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
            <form method="POST" id="FormDeleteActorinMovie">    
                <input type="hidden" name="idDeleteActorMovie" id="idDeleteActorMovie">
                <div class="center">
                    <span class="card-title">¿Desea eliminar este registro?</span>
                    <button type="submit" class="btn red"> <i class="material-icons left">delete</i> Eliminar </button>
                    <a  class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar </a>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<!-- ---------- Modals  Actors in movies ---------->
        <!--Modal add Actor-->
        <div id="addactor" class="modal">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                        <form method="post" id="form-create" enctype="multipart/form-data">
                                <span class="card-title">Agregar Actor</span>
                                <input type="text" name="NameActor" id="NameActor" placeholder="ingrese nombre de actor">
                                <button type="submit" class="btn small blue white-text tooltipped" data-tooltip="Crear">Agregar</button>
                                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div> 

        <!--Modal Update Actor -->
        <div id="updateActor" class="modal">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                        <form method="post" id="ActorFormUpdate" enctype="multipart/form-data">
                                <span class="card-title">Actualizar Actor</span>
                                <input type="hidden" name="idUpdateActor" id="idUpdateActor" placeholder="id">
                                <input type="text" name="UpdateNameActor" id="UpdateNameActor" placeholder="ingrese nombre de actor">
                                <button type="submit" class="btn small blue white-text tooltipped" data-tooltip="Crear">Actualizar</button>
                            </div>
                        </form>
                    </div>
                </div>
            <div class="modal-footer">
                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
            </div>
            </form>
        </div> 

        <!--Modal Delete Actor -->
        <div id="deleteActor" class="modal">
            <div class="modal-content">
                <div class="card">
                    <div class="card-content">
                        <form method="POST" id="DeleteActorForm">
                            <span class="card-title">Eliminar Actor</span>
                                <input type="hidden" name="idDeleteNameActor" id="idDeleteNameActor">
                                <span class="card-title" id="DeleteActor" name="DeleteActor"></span>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn small blue white-text tooltipped" data-tooltip="Eliminar">Eliminar</button>
                                <a class="modal-close waves-effect waves-green btn-flat">Cerrar</a>
                            </div>
                        </form>
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
<script src="../../resources/dashboard/controllers/ActorsController.js"></script>
</body>
</html>
