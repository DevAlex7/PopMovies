<?php require_once('../../global/helpers/movies-sidenav.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PopMovies | Pelicula</title>
    <link rel="stylesheet" href="../../resources/dashboard/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/home/css/viewmovie.css">
    <link rel="stylesheet" href="../../resources/home/css/sidenav.css">
</head>
<body>


<?php MovieNavBar::NavBar(); ?>
<div class="row">
    <div class="col s12 m6">
        <div class="card">
            <div class="card-image">
                <img src="" id="ImageCover">
            </div>
        </div>
    </div>
    <div class="col s12 m6">
       <div class="card">
            <div class="card-content">
                <span> <h5 id="MovieTitle"></h5> </span>
                <p id="MovieYear"></p>
                <p id="MovieDescription"></p>
                <p id="MovieTime"></p>
                <p id="MoviePrice"></p>
                <i class="material-icons red-text tooltipped" onclick="favorite()" data-position="right" data-tooltip="Marca como favorito" id="IconLove"></i>
                <div id="GendersinMovie">
                    <p>Generos:</p>
                    <div id="GendersPart">
                    </div>
                </div>
                <div id="ActorsinMovie">
                    <p>Reparto:</p>
                    <div id="ActorsPart">
                    </div>
                </div>
                <div class="card-panel z-depth-1-half indigo" id="ShopPart">
                    <div class="row">
                        <div class="col s12 m6">
                            <input type="number" validate class="white-text" min="1" name="Counter" id="Counter">
                            <label class="white-text">Cantidad a llevar</label>
                        </div>
                        <div class="col s12 m6">
                        <a class="btn blue" id="BtnShop" onclick="addtoCar()" > <i class="material-icons left">shopping_cart</i> Añadir</a>
                        </div>
                    </div>
                </div>
            </div>
       </div>
    </div>
    <div class="col s12 m6">
       <div class="card">
            <div class="card-content">
                <span class="card-title">Comentarios</span>
                <div class="row" id="CommentsPart" style="height:330px; overflow-y:scroll;">
                    
                </div>
                <div class="row">
                    <form class="col s12" id="FormCommentUser">
                        <div class="row">
                            <div class="input-field col s12">
                            <input type="hidden" name="idMovie" id="idMovie">
                            <textarea id="Comment" name="Comment" class="materialize-textarea" placeholder="Escriba su comentario..."></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn blue">Comentar</button>
                    </form>
                </div>
            </div>
       </div>
    </div>
    <!--Modal Edit Comment -->
    <div class="modal" id="MessageUser">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Editar comentario</span>
                    <div class="row">
                        <form class="col s12" id="FormEditComment">
                            <div class="row">
                                <div class="input-field col s12">
                                <p>Comentario:</p>
                                <input type="hidden" name="idEditMovie" id="idEditMovie">
                                <textarea id="EditComment" name="EditComment" class="materialize-textarea" placeholder="Escriba su comentario..."></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn orange"> <i class="material-icons left">edit</i> Editar</button>
                            <a class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</a>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Delete comment -->
    <div class="modal red" id="DeleteMessageUser">
        <div class="modal-content">
            <div class="card">
                <div class="card-content">
                <span class="card-title">Borrar comentario</span>
                    <div class="row">
                        <form class="col s12" id="FormDeleteComment">
                            <div class="row">
                               <div class="center">
                               <input type="hidden" name="idDeleteMovie" id="idDeleteMovie">
                                <span class="card-title">¿Desea eliminar este comentario?</span>
                               </div>
                            </div>
                            <div class="center">
                            <button type="submit" class="btn red"> <i class="material-icons left">delete</i> Si, eliminar</button>
                            <a class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</a>   
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/home/js/sidenav.js"></script> 
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/home/controllers/ViewmovieController.js"></script>
</body>
</html>
