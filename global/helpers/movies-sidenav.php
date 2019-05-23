<?php

class MovieNavBar{
    

    public static function NavBar(){
      session_start();
      if(isset($_SESSION['idClient'])){
        $filename=basename($_SERVER['PHP_SELF']);
        if($filename != '../../feed/home/'){
          self::modals();
          print('
              <div class="navbar-fixed">
              <nav class="nav-extended">
                <div class="nav-wrapper">
                  <a href="/PopMovies/feed/home/main.php" class="brand-logo center">PopMovies</a>
                  <a href="" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                  <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a onclick="Open()" data-target="mobile-demo"> <i class="material-icons left">menu</i> Menu</a></li>
                    <li><a href=""> <i class="material-icons left">person</i> Mi perfil</a></li>
                    <li><a href="#ModalCloseSession" class="modal-trigger"> <i class="material-icons left">close</i> Cerrar Sesión</a></li>
                  </ul>
                </div>
              </nav>
            </div>
            
            <!-- SideNav -->
            <ul class="sidenav red" id="mobile-demo">
            <li><a href="/PopMovies/feed/home/main.php" class="white-text"> <i class="material-icons white-text">home</i> Inicio </a></li>
            <li><div class="divider white-text"></div></li>
              <li><a class="white-text"> <i class="material-icons white-text">sentiment_satisfied_alt</i> Generos</a></li>
              <li><a class="white-text"> <i class="material-icons white-text">whatshot</i>Tendencias</a></li>
              <li><a class="white-text"> <i class="material-icons white-text">face</i>Actores</a></li>
              <li><a href="/PopMovies/feed/home/favorites.php" class="white-text"> <i class="material-icons white-text">star</i>Favoritos </a></li>
            </ul>
          ');
        }else{
          header('location:main.php');
        }
      }
      else{
        $filename=basename($_SERVER['PHP_SELF']);
        if($filename!='../../feed/home/' && $filename!='signup.php'){
          header('location:../../feed/home/');
        }
        else{
          print ('
           <div class="navbar-fixed">
                <nav class="teal">
                    <div class="nav-wrapper">
                        <a href="index.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
                    </div>
                </nav>
            </div>
          ');
        }
      }
        
    }
    private function modals(){
      print('
      <div class="modal blue" id="ModalCloseSession">
          <div class="modal-content col s5">
              <div class="card">
                  <div class="card-content center">
                      <span class="card-title">¿Desea cerrar sesión?</span>
                  </div>
                  <div class="card-action center">
                      <button class="btn red" onClick="LoOff()"> <i class="material-icons left">check</i> Aceptar</button>
                      <button class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</button>
                  </div>
              </div>
          </div>
      </div>
      ');
  }
}
?>