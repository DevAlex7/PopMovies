<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Generos</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.genders.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/sidenav.css">
</head>
<body>
<header>
<?php  AdminSideNav::SideNav();?>
</header>
<main>
    <div class="row">
        <div class="card">
            <div class="card-panel">
                <span class="card-title"> Generos</span>
            </div>
        </div>
    </div>
<!--Add Gender -->
    <div class="row">
        <div class="col s12 m6">
            <div class="card">
                <div class="card-content">
                    <form method="POST" id="form-createGender">
                        <div class="row">
                            <div class="col s12 m12">
                                <div class="row">
                                    <div class="col s6">
                                        <input type="text" id="GenderName" name="GenderName" placeholder="Ingrese genero">
                                    </div>
                                    <div class="file-field input-field col s12 m9" id="TimeSection">
                                        <div class="btn waves-effect">
                                            <span><i class="material-icons">image</i></span>
                                            <input 
                                            id="FileGenderCover" 
                                            type="file" 
                                            name="FileGenderCover" 
                                            required/>
                                        </div>
                                        <div class="file-path-wrapper">
                                            <input type="text" class="file-path validate" placeholder="Seleccione una imagen"/>
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <button class="btn-small blue" type="submit" id="ButtonAdd">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!--Table Genders -->
        <div class="col s12 m6">
           <!-- Search --> 
            <div class="row">
                <div class="col s12 m12">
                    <nav class="white">
                        <div class="nav-wrapper">
                            <form  method="POST" id="SearchField">
                                <div class="input-field">
                                    <input id="searchGenders" name="searchGenders" type="search" placeholder="Buscar actores...">
                                    <label class="label-icon " for="search"><i class="material-icons black-text">search</i></label>
                                    <i onclick="clearSearchField()" class="material-icons">close</i>
                                </div>
                            </form>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- ********-->
            <div class="card">
                <div class="card-content">
                <span class="card-title">Lista de Generos</span>
                <table class="highlight z-depht-5">
                        <thead>
                            <tr>
                                
                            </tr>
                        </thead>

                        <tbody id="GendersRead">
                           
                        </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
 
<!-- Add gender to Movies -->
<div class="row">
    <div>
    <div class="divider"></div>
        <div id="MoviesGender">
        <div class="chip" id="TitleChip">¡Agrega generos a tus peliculas!</div>
            <div class="card">
                <div class="card-content">
                    <div class="row">
                        <form class="col s12" id="ListMoviesinGenders" name="ListMoviesinGenders" method="POST">
                            <div class="row">
                                <div class="input-field col s12 m6">
                                    <i class="material-icons prefix">movie</i>
                                    <select name="GenderSelect" id="GenderSelect"></select>
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
                    <div class="row">
                        <div class="col s12 m12">
                            <table class="highlight centered">
                                <thead>
                                    <tr>
                                        <th>Genero</th>
                                        <th>Pelicula</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody id="TableGendersInMovies">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal Delete -->
    <div id="ModalDeleteGender" class="modal">
        <div class="modal-content white">
            <h6 class="card-title">Eliminar Genero</h6>
            <p id="NameGender"></p>
            <form method="POST" id="DeleteGender">
                <div class="row">
                    <div class="s12 m5">
                        <div class="card red white-text">
                            <div class="card-content">
                                <span class="card-title">¿Desea eliminar el genero seleccionado?</span>
                                <span class="card-title" name="ShowNameGender" id="ShowNameGender"></span>
                                <input type="hidden" name="idGender" id="idGender" placeholder="Id">
                                <input type="hidden" name="DeleteImage" id="DeleteImage">
                            </div>
                        </div> 
                        <button type="submit" class="btn small red white-text tooltipped" data-tooltip="Eliminar"> <i class="material-icons left">check</i> Eliminar</button>
                        <a class="modal-close waves-effect waves-white blue darken-1 btn small white-text"> <i class="material-icons left">clear</i> Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!--Modal Edit Gender -->
<div class="modal" id="EditModalGender">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
            <span class="card-title">Editar Genero</span>
                <form method="POST" id="FormEditGender" class="col s12">
                <p>Genero seleccionado:</p>
                    <div class="row">
                        <div class="col s4">
                            <input type="hidden" name="ImageEditGender" id="ImageEditGender">
                            <input type="hidden" id="idEditGender" name="idEditGender">
                            <input type="text" id="NameEditGender" name="NameEditGender">
                        </div>
                            <div class="file-field input-field col s12 m9" id="TimeSection">
                                <div class="btn waves-effect">
                                    <span><i class="material-icons">image</i></span>
                                    <input 
                                    id="FileEditCover" 
                                    type="file" 
                                    name="FileEditCover" 
                                    />
                                </div>
                                <div class="file-path-wrapper">
                                    <input type="text" class="file-path validate" id="Image" placeholder="Seleccione una imagen"/>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn blue"> <i class="material-icons left">edit</i> Editar</button>
                    <a class="btn red modal-close"> <i class="material-icons left">close</i>Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modals Genders in Movies -->

<!--Modal Edit List -->
<div class="modal" id="ModalEditListGenderInMovie">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <div class="row">
                    <form class="col s12 m12" id="FormEditGendertoMovie">
                        <div class="row">
                        <span class="card-title">Editar Genero para pelicula</span>
                            <input class="hide" type="text" name="id_list" id="id_list">
                            <div class="input-field col s12 m6">
                                <i class="material-icons prefix">face</i>
                                <select name="SelectEditGendertoMovie" id="SelectEditGendertoMovie"></select>
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
<div class="modal red" id="ModalDeleteListGenderInMovie">
    <div class="modal-content">
        <div class="card">
            <div class="card-content">
                <form method="POST" id="FormDeleteGenderinMovie">    
                    <input type="hidden" name="idDeleteGenderMovie" id="idDeleteGenderMovie">
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
</main>    
<footer>

</footer>
<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/dashboard/controllers/GendersController.js"></script>
</body>
</html>