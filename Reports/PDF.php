<?php 
require_once('../../Librariesreports/fpdf.php');
require_once('../../global/helpers/validator.php');
require_once('../../global/models/actorsmovie.php');
require_once('../../global/models/movies.php');
require_once('../../global/models/trending.php');
require_once('../../global/models/binnacle.php');
require_once('../../global/models/detailcar.php');
require_once('../../global/helpers/instance.php');
session_start();
class PDF extends FPDF{
    
    
    public function LeerProductos(){
        $movies = new Movies();
        $data = $movies->all();
        return $data;
    }
    public function LeerComprasaProveedor(){
        $movies = new Movies();
        $data = $movies->getMoviesbyProveeder();
        return $data;
    }
    public function LeerFavoritos(){
        $trending = new Trending();
        $data = $trending->getTrendings();
        return $data;
    }
    public function LeerVentas(){
        $detail = new detailCar();
        $data = $detail->reportSails();
        return $data;
    }
    public function LeerBitacora(){
        $binnacle = new Binnacle();
        $data = $binnacle->actionsInAdmins();
        return $data;
    }
    public function obtenerListadeCompra(){
        $detail = new detailCar();
        $detail->id_car($_SESSION['idcar']);
        $data = $detail->getListOrderBought();
        $total = $detail->getTotalCar();
        return $data;
    }
    public function obtenerTotalCarrito(){
        $detail = new detailCar();
        $detail->id_car($_SESSION['idcar']);
        $data = $detail->getTotalCar();
        return $data;
    }

}
?>