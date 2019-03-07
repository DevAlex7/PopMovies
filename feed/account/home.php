<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Dashboard</title>
    <link rel="stylesheet" href="../../resources/public/css/materialize.min.css">
  
    <link rel="stylesheet" href="../../resources/public/css/material-icons.css">
    <link rel="stylesheet" href="../../resources/dashboard/css/css.home.css">
    <link href="../../resources/public/css/css.font.css" rel="stylesheet">

</head>
<body>
<header>
    <ul id="slide-out" class="sidenav sidenav-fixed grey lighten-4">
        <li>
            <div class="user-view">
                <div class="card center">
                <span class="card-title ">PopMovies</span>
            </div>
            <a href="#name"><span class="black-text name">John Doe</span></a>
            <a href="#email"><span class="black-text email">jdandturk@gmail.com</span></a>
            </div>
        </li>
        <li><a href="#!"><i class="material-icons">dashboard</i>Inicio</a></li>
        <li><a href="#!"><i class="material-icons">person</i>Mi perfil</a></li>
        <li><a href="#!"><i class="material-icons">drag_indicator</i>Bitacora</a></li>
        <li><div class="divider"></div></li>
        <li><a class="subheader">Menu</a></li>
        <li><a href="#!"><i class="material-icons">movies</i>Stock</a></li>
        <li><a href="#!"><i class="material-icons">list</i>Clasificaciones</a></li>
        <li><a href="#!"><i class="material-icons">reorder</i>Generos</a></li>
        <li><a href="#!"><i class="material-icons">shop</i>Ventas</a></li>
        <li><a href="#!"><i class="material-icons">business</i>Proveedores</a></li>
        <li><a href="#!"><i class="material-icons">account_circle</i>Administradores</a></li>
        <li><a href="#!"><i class="material-icons">accessibility</i>Usuarios</a></li>
        <li><a href="#!"><i class="material-icons">bookmark</i>Membresias</a></li>
    </ul>  
</header>

<main class="blue">

    <div class="row blue">
      <div class="col s12 m6">
          <div class="card">
              <div class="card-content">
                 <span class="card-title">Ventas realizadas : 40</span>
                 <div class="divider"></div>
                 <a class="waves-effect waves-light btn-small transparent blue-text" id="ShowShops"><i class="material-icons left">shop</i>ir a ventas</a>
              </div>
          </div>
      </div>
      <div class="col s12 m6">
          <div class="card">
              <div class="card-content">
                <span class="card-title">Productos en Stock: 50</span>
                <div class="divider"></div>
                <a class="waves-effect waves-light btn-small transparent blue-text" id="ShowProducts"><i class="material-icons left">movie</i>ver productos</a>
              </div>
          </div>
      </div>
    </div>

    <div class="row">
      <div class="col s12 m12">
          <div class="card">
              <div class="card-content">
              <span class="card-title">Customers</span>
                <table class="highlight">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Empresa</th>
                            <th>Contacto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Andre</td>
                            <td>Walmart</td>
                            <td>andre@gmail.com</td>
                            </tr>
                            <tr>
                            <td>John</td>
                            <td>PriceSmart</td>
                            <td>John@gmail.com</td>
                            </tr>
                            <tr>
                            <td>Jonathan</td>
                            <td>Samborns</td>
                            <td>Jonat@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
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
</body>
</html>