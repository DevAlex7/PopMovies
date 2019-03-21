<?php 

require_once('../helpers/instance.php');
require_once('../helpers/validator.php');
require_once('../models/genders.php');

if(isset($_GET['site']) && isset($_GET['action'])){
 
    session_start();
    $gender= new Gender();
    $result = array('status'=>0, 'exception'=>'');
    
    if($_GET['site']=='dashboard')
    {
        switch($_GET['action'])
        {
            //Get All Genders
            case 'GetGenders':
            if($result['dataset'] = $gender->all()){
                $result['status'] = 1;
            }
            else{
                $result['exception'] = 'No hay generos registrados';
            }
            break;
            
            //Create Actor
            case 'createGender':
            if($gender->name($_POST['GenderName']))
            {   
                //Verify if exist the Gender
                if(! $gender->exist()){
                    //Save the record
                    $gender->create();
                    $result['status'] = 1;
                }
                else{
                    $result['exception'] = 'Genero ya existente';
                }
            }
            else{
                $result['exception'] = 'Campo Vacio';
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