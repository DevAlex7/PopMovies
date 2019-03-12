<?php 

class AdminSideNav{

    public static function SideNav(){
        print('
        <ul id="slide-out" class="sidenav sidenav-fixed grey lighten-4">
            <li>
            <div class="user-view">
            <div class="card center">
            <span class="card-title ">PopMovies</span>
            </div>
            <a href="#name"><span class="black-text name">Alejandro Gonzalez</span></a>
            <a href="#email"><span class="black-text email">alexgve7@gmail.com</span></a>
            </div>
            </li>
            <li><a href="/PopMovies/feed/account/home.php"><i class="material-icons">dashboard</i>Inicio</a></li>
            <li><a href=""><i class="material-icons">person</i>Mi perfil</a></li>
            <li><a href="#!"><i class="material-icons">drag_indicator</i>Bitacora</a></li>
            <li><div class="divider"></div></li>
            <li><a class="subheader">Menu</a></li>
            <li><a href="/PopMovies/feed/account/movies.php"><i class="material-icons">movies</i>Stock</a></li>
            <li><a href=""><i class="material-icons">list</i>Clasificaciones</a></li>
            <li><a href="#!"><i class="material-icons">reorder</i>Generos</a></li>
            <li><a href="#!"><i class="material-icons">shop</i>Ventas</a></li>
            <li><a href="#!"><i class="material-icons">business</i>Proveedores</a></li>
            <li><a href="#!"><i class="material-icons">account_circle</i>Administradores</a></li>
            <li><a href="#!"><i class="material-icons">accessibility</i>Usuarios</a></li>
            <li><a href="/PopMovies/feed/account/memberships.php"><i class="material-icons">bookmark</i>Membresias</a></li>
            <li><a href="/PopMovies/feed/account/actors.php"><i class="material-icons">face</i>Actores</a></li>
        </ul>  
        ');
    }

}


?>