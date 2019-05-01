<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/clasificationsmovie.php');

    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $clasificationsmovie = new Clasificationsmovie();
        $result = array('status'=>0,'exception'=>'');
        if($_GET['site']=='dashboard'){

            switch($_GET['action']){
                case 'CreateList':
                    
                break;
                default:
                exit('Acción no disponible');
            }
        }
        else{
            exit('Acceso no disponible');
        }
    }
    else{
        exit('Recurso no disponible');
    }

?>