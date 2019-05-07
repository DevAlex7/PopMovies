<?php 

class AdminSideNav{

    private $username;
    private $email;

    public static function SideNav(){

        session_start();
        if(isset($_SESSION['idUsername'])){
            $filename = basename($_SERVER['PHP_SELF']);
            if($filename != '../../feed/account/')
            {
                self::modals();
                print('
                <ul id="slide-out" class="sidenav sidenav-fixed">
                    <li>
                        <div class="user-view">
                            <a href="#name"><span class="black-text name">'. $_SESSION['AdminUsername'].'</span></a>
                            <a href="#email"><span class="black-text email">'. $_SESSION['AdminName'].$_SESSION['AdminLastname'] .'</span></a>
                            <div class="card center">
                                <span class="card-title">PopMovies</span>
                            </div>
                        </div>
                    </li>
                    <li><a href="/PopMovies/feed/account/home.php"><i class="material-icons">dashboard</i>Inicio</a></li>
                    <li><a href=""><i class="material-icons">person</i>Mi perfil</a></li>
                    <li><a href="/PopMovies/feed/account/binnacle.php"><i class="material-icons">drag_indicator</i>Bitacora</a></li>
                    <li><div class="divider"></div></li>
                    <li><a class="subheader white   -text">Menu</a></li>
                    <li><a href="/PopMovies/feed/account/movies.php"><i class="material-icons">movies</i>Stock</a></li>
                    <li><a href="/PopMovies/feed/account/clasifications.php"><i class="material-icons">list</i>Clasificaciones</a></li>
                    <li><a href="/PopMovies/feed/account/genders.php"><i class="material-icons">sentiment_satisfied_alt</i>Generos</a></li>
                    <li><a href="#!"><i class="material-icons">shop</i>Ventas</a></li>
                    <li><a href="/PopMovies/feed/account/customers.php"><i class="material-icons">business</i>Proveedores</a></li>
                    <li><a href=""><i class="material-icons">account_circle</i>Administradores</a></li>
                    <li><a href=""><i class="material-icons">accessibility</i>Clientes</a></li>
                    <li><a href="/PopMovies/feed/account/memberships.php"><i class="material-icons">bookmark</i>Membresias</a></li>
                    <li><a href="/PopMovies/feed/account/actors.php"><i class="material-icons">face</i>Actores</a></li>
                    <li><a href="#ModalCloseSession" class="modal-trigger"><i class="material-icons">exit_to_app</i>Cerrar Sesión</a></li>
                </ul>  
                ');
            }
            else
            {
                header('location:home.php');
            }
        }
        else{
            $filename = basename($_SERVER['PHP_SELF']);
            if($filename!= '../../feed/account/' && $filename != 'signup.php'){
                header('location:../../feed/account/');
            }
            else{
                print ('
                <header>
                <div class="navbar-fixed">
                    <nav class="teal">
                        <div class="nav-wrapper">
                            <a href="index.php" class="brand-logo"><i class="material-icons">dashboard</i></a>
                        </div>
                    </nav>
                </div>
                </header>
                <main class="container">
                <h3 class="center-align">Home</h3>
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
                        <button class="btn red" onClick="LogOff()"> <i class="material-icons left">check</i> Aceptar</button>
                        <button class="btn grey modal-close"> <i class="material-icons left">close</i> Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        ');
    }

}


?>