<?php 

require_once('../../helpers/validator.php');
require_once('../../helpers/instance.php');
require_once('../../models/clients.php');

if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    $client = new Clients();
    $result=array('status'=>0,'exception'=>'','admin'=>'');

    if($_GET['site']=='dashboard'){
        switch($_GET['action']){
            
            case 'GetList':
            if($result['dataset']=$client->all()){
                $result['status']=1;
            }   
            else{
                $result['exception']='No hay clientes registrados';
            }
            break;

            default:
            exit('acción no disponible');
        }
    }
    else{
        exit('acceso no disponible');
    }
    print(json_encode($result));
}
else{
    exit('Acceso no disponible');
}

?>