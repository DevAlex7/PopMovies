<?php 

    require_once('../../helpers/validator.php');
    require_once('../../helpers/instance.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $binnacle = new Binnacle();
        $result=array('status'=>0,'exception'=>'');

        if($_GET['site']=='dashboard'){
            switch($_GET['action']){
                case 'createAction':

                break;
                case 'getListActions':
                    if($result['dataset']=$binnacle->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay acciones en lista';
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