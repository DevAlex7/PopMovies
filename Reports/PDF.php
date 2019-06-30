<?php 
require_once('../../fpdf.php');
require_once('../../global/helpers/validator.php');
require_once('../../global/models/actorsmovie.php');
require_once('../../global/helpers/instance.php');

class PDF extends FPDF{

    public function LeerActores(){
        $actors = new Actormovie();
        $data = $actors->getActors_in_Movies();
        return $data;
    }
}
?>