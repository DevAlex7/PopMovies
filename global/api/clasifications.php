<?php 

    require_once('../helpers/validator.php');
    require_once('../helpers/instance.php');
    require_once('../models/clasifications.php');
    
    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $clasification = new Clasification();
        $result = array('status'=>0, 'exception'=>'');
        if($_GET['site']=='dashboard'){
            
            switch($_GET['action']){
                
                //Create Clasification
                case 'createClasification':
                    if($clasification->nameClasification($_POST['NameClasification'])){
                        if($clasification->descriptionClasification($_POST['DescriptionClasification']))
                        {
                            $clasification->create();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Campo vacio';
                        }
                    }
                    else{
                        $result['exception']='Nombre incorrecto o campo vacio';
                    }
                    
                break;

                default:
                exit('accion no disponible');
            }
        }
        else{
            exit('acceso no disponible');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }
?>