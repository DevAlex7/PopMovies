<?php

class UserNavBar{

   

    public static function NavBar(){
        print('
        <div class="navbar-fixed">
        <nav class="nav-extended">
          <div class="nav-wrapper">
            <a href="/PopMovies/feed/home/main.php" class="brand-logo center">PopMovies</a>
            <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
              <li><a onclick="Open()" data-target="mobile-demo"> <i class="material-icons left">menu</i> Menu</a></li>
              <li><a href="badges.html"> <i class="material-icons left">person</i> Mi perfil</a></li>
              <li><a href="collapsible.html"> <i class="material-icons left">close</i> Cerrar Sesión</a></li>
            </ul>
          </div>
        </nav>
      </div>
      
      <!-- SideNav -->
      <ul class="sidenav" id="mobile-demo">
        <li><a href="/PopMovies/feed/home/genders.php">Generos</a></li>
        <li><a href="/PopMovies/feed/home/genders.php">Components</a></li>
        <li><a href="collapsible.html">JavaScript</a></li>
      </ul>
        ');
    }
}
?>