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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body>
<header>
<?php AdminSideNav::SideNav();?>
</header>
<main>
    <div class="card">
        <div class="card-content">
            <!--Get URL variable for Id movie-->
            <input id="MovieId" class="hide" value="<?php print $_GET['movie'] ?>">
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
                        <span class="card-title">Precio</span></blockquote>
                        <input type="text" name="PriceEdit" id="PriceEdit">
                        <span class="card-title">Cantidad de existencia:</span>
                        <input type="text" name="CountMovieEdit" id="CountMovieEdit">
                        <span class="card-title">Proveedor:</span>
                        <select name="EditCustomerMovie" id="EditCustomerMovie">
                        </select>
                        <div class="card-action center">
                            <button type="submit" class="btn blue"> <i class="material-icons left">edit</i> Editar </button>
                            <a href="movies.php" class="btn red"><i class="material-icons left">close</i>Cancelar</a>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="ModalDeleteMovie">
        <div class="modal-content">

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