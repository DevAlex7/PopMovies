<?php require_once('../../global/helpers/admin-sidenav.php');  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Generos</title>

    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.genders.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">

</head>
<body>
<header>
<?php  AdminSideNav::SideNav();?>
</header>
<main>

    <div class="row">
        <div class="card">
            <div class="card-panel">
                <span class="card-title"> <i class="material-icons" id="IconGenders">sentiment_satisfied_alt</i> Generos</span>
            </div>
        </div>
    </div>

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

        <div class="col s12 m6">
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

<!--Modal Delete -->
    <div id="ModalDeleteGender" class="modal">
            <div class="modal-content white">
                <h6 class="card-title">Eliminar Genero</h6>
                <p id="NameGender"></p>
                <form method="POST">
                    <div class="row">
                        <div class="s12 m5">
                            <input type="text" placeholder="Id">
                            <button type="submit" class="btn small red white-text tooltipped" data-tooltip="Eliminar">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer white">
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
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