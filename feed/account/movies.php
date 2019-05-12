<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Peliculas</title>
    
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
                <span class="card-title">Peliculas</span>
                <button 
                data-target="ModalAddMovie" 
                class="btn blue modal-trigger"
                ><i class="material-icons left">movie</i> Agregar pelicula</button>
            </div>
        </div>

        <!--Search Bar -->
      <!--<div class="container">
          <nav class="white">
            <div class="nav-wrapper">
              <form>
                <div class="input-field">
                  <input id="search" type="search" placeholder="Filtrar por genero, actor, clasificación o nombre de pelicula">
                  <label class="label-icon" for="search"><i class="material-icons black-text">search</i></label>
                  <i class="material-icons">close</i>
                </div>
              </form>
            </div>
          </nav>
        </div>                
        -->   
        
        <!-- All Movies -->
        <div class="row" id="AllMovies">
        </div>

  <!--Modals -->
        <!--Modal Add Movie -->
        <div class="modal" id="ModalAddMovie">
          <div class="modal-content">
            <div class="card">
              <div class="card-content">
                <span class="card-title">Agregar pelicula</span>
                <div class="divider"></div>
                <div class="row">
                  <form class="col s12" method="POST" id="FormMovieCreate" enctype="multipart/form-data">
                    <div class="row">
                      <div class="input-field col s10">
                        <i class="material-icons prefix black-text">movie</i>
                        <input 
                          type="text" 
                          placeholder="Nombre de la pelicula"
                          name="CreateMovieName"
                          id="CreateMovieName">
                      </div>
                      <div class="input-field col s10">
                        <i class="material-icons prefix black-text">reorder</i>
                        <input 
                          type="text"
                          placeholder="Sipnosis de la pelicula"
                          name="CreateSipnosisMovie"
                          id="CreateSipnosisMovie">
                      </div>
                      <div class="input-field col s12 m12">
                        <span class="card-title">Detalles de la pelicula</span>
                      </div>
                      <div class="input-field col s12 m6" id="TimeSection">
                        <i class="material-icons prefix">access_time</i>
                        <input 
                        type="text" 
                        placeholder="Hora de duración de la pelicula"
                        name="CreateTimeMovie"
                        id="CreateTimeMovie">
                      </div>
                      <div class="file-field input-field col s12 m6" id="TimeSection">
                        <div class="btn waves-effect">
                            <span><i class="material-icons">image</i></span>
                            <input 
                            id="FileMovieCover" 
                            type="file" 
                            name="FileMovieCover" 
                            required/>
                        </div>
                        <div class="file-path-wrapper">
                            <input type="text" class="file-path validate" placeholder="Seleccione una imagen"/>
                        </div>
                      </div>
                      <div class="input-field col s12 m6">
                        <i class="material-icons prefix">attach_money</i>
                        <input 
                        type="number" 
                        min="1" 
                        step="any" 
                        placeholder="Precio de la pelicula"
                        name="CreatePriceMoney"
                        id="CreatePriceMoney"/>
                      </div>
                      <div class="input-field col s12 m6">
                        <i class="material-icons prefix">add</i>
                        <input 
                        type="number" 
                        min="1" 
                        placeholder="Cantidad de existencia"
                        name="CreateStockMovie"
                        id="CreateStockMovie"
                        validate>
                      </div>
                      <div class="input-field col s12 m6">
                        <i class="material-icons prefix">person</i>
                        <select name="ComboCustomers" id="ComboCustomers"></select>
                      </div>
                      <div class="input-field col s12 m6">
                        <i class="material-icons prefix">calendar_today</i>
                        <input 
                        type="number"
                        min="1000"
                        max="2020" 
                        name="YearMovie" 
                        id="YearMovie"
                        validate
                        placeholder="Año">
                      </div>
                      <div class="input-field col s12 m6">
                        <i class="material-icons prefix">live_tv</i>
                        <textarea 
                        name="TrailerMovie" 
                        id="TrailerMovie"
                        class="materialize-textarea" 
                        cols="30" 
                        rows="10" placeholder="HTML"></textarea>
                      </div>
                      <div class="input-field center col s12 m12">
                        <button type="submit" class="btn blue">Agregar</button>
                        <a class="btn grey modal-close">Cancelar</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
</main>
<footer></footer>
<script src="../../resources/globaljs/jquery-3.2.1.min.js"></script>
<script src="../../resources/globaljs/materialize.min.js"></script> 
<script src="../../resources/dashboard/js/sidenav.js"></script>
<script src="../../global/helpers/functions.js"></script>
<script src="../../resources/dashboard/controllers/MovieController.js"></script>

</body>
</html>