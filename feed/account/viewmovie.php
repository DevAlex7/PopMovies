<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Pelicula</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.movies.css">

</head>
<body>
<header>
<?php AdminSideNav::SideNav();?>
</header>
<main>
    <div class="card">
        <div class="card-content">
            <!--Get URL variable for Id movie-->
            <div class="row">
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-image">
                         <img src="" id="ImageCover">
                        </div>
                        <div class="video-container" id="VideoTrailer">
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                   <form method="post" id="EditFormMovie">
                        <input id="MovieId" name="MovieId" type="hidden" value="<?php print $_GET['movie'] ?>">
                        <span class="card-title">Descripción de la pelicula</span>
                        <span class="card-title"> Titulo </span>
                        <input type="text" id="TitleMovieEdit" name="TitleMovieEdit">
                        <div id="MovieSipnosisPart">
                            <span class="card-title">Sipnosis</span>
                            <textarea name="SipnosisEdit" id="SipnosisEdit" class="materialize-textarea"></textarea>
                        </div>
                       <span class="card-title">Tiempo de duración</span>
                        <input type="text" id="TimeMovieEdit" name="TimeMovieEdit">
                        <span class="card-title">Imagen de la pelicula</span>
                        <div class="file-field input-field ">
                            <div class="btn waves-effect">
                                <span><i class="material-icons">image</i></span>
                                <input 
                                id="FileMovieCover" 
                                type="file" 
                                name="FileMovieCover" 
                                required/>
                            </div>
                            <div class="file-path-wrapper">
                                <input type="text" name="ImageCoverEdit" id="ImageCoverEdit" class="file-path validate" placeholder="Seleccione una imagen"/>
                            </div>
                        </div>
                        <span class="card-title">Año</span>
                        <input type="text" name="YearMovieEdit" id="YearMovieEdit">
                        <span class="card-title">Precio</span></blockquote>
                        <input type="number" min="1" step="any"  name="PriceEdit" id="PriceEdit">
                        <span class="card-title">Cantidad de existencia:</span>
                        <input type="number" min="1" name="CountMovieEdit" id="CountMovieEdit">
                        <span class="card-title">Proveedor:</span>
                        <select name="EditCustomerMovie" id="EditCustomerMovie">
                        </select>
                        <span class="card-title">Trailer de la pelicula</span>
                        <textarea class="materialize-textarea" id="TrailerMovieEdit" name="TrailerMovieEdit" cols="30" rows="10"></textarea>
                        <div class="card-action center">
                            <button type="submit" class="btn orange"> <i class="material-icons left">edit</i> Editar </button>
                            <button class="btn modal-trigger red" data-target="ModalDeleteMovie" > <i class="material-icons left">delete</i> Eliminar </button>
                            <a href="movies.php" class="btn grey"><i class="material-icons left">close</i>Cancelar</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
            <span class="card-title">Detalles adicionales</span>
            <div class="row">
                <!-- Show Actors -->
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content">
                            <p>Actores</p>
                            <p id="exceptionActors"></p>
                            <div id="ActorsTags">
                                      
                            </div>
                        </div>
                    </div>
                </div> 
                <!-- Show Genders -->
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content">
                            <p>Generos</p>
                            <p id="exceptionGenders"></p>
                            <div id="GendersTags">

                            </div>
                        </div>
                    </div>
                </div>
                <!--Show Clasification --> 
                <div class="col s12 m6">
                    <div class="card">
                        <div class="card-content">
                            <p>Clasificación</p>
                            <p id="exceptionClasification"></p>
                            <p id="clasification"></p>
                            <p id="clasificationDescription"></p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    <!--Modal delete movie selected -->
    <div class="modal" id="ModalDeleteMovie">
        <div class="modal-content">
            <div class="card">
                <div class="card red">
                    <div class="card-content">
                        <input type="text" class="hide" value="<?php print $_GET['movie'] ?>">
                        <span class="card-title white-text">¿Desea eliminar esta pelicula?</span>
                        <button onClick="DeleteMoviebyId()" class="btn red"> <i class="material-icons left">delete</i> Eliminar</button>
                        <a class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</a>
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
<script src="../../resources/dashboard/controllers/ViewMovieController.js"></script>
</body>
</html>