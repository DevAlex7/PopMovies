<?php 

require_once('../../helpers/instance.php');
require_once('../../helpers/validator.php');
require_once('../../models/genders.php');
require_once('../../models/movies.php');
require_once('../../models/binnacle.php');

if(isset($_GET['site']) && isset($_GET['action'])){
 
    session_start();
    $gender= new Gender();
    $movie = new Movies();
    $binnacle = new Binnacle();
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
                    $message = "registrado un nuevo genero:".' '.$gender->getGendername();
                    $binnacle->actionperformed($message);
                    $binnacle->admin_id($_SESSION['idUsername']);
                    if($binnacle->site('genders')){
                        $binnacle->create();
                        $gender->create();
                        $result['status'] = 1;
                    }
                    else{
                        $result['exception']='Ha ocurrido un problema, contacte al administrador';
                    }
                }
                else{
                    $result['exception'] = 'Genero ya existente';
                }
            }
            else{
                $result['exception'] = 'Campo Vacio :v';
            }
            break;
            case 'getGender':
            //Validate is a number the id
                if($gender->id($_POST['id'])){
                    //receive row dataset and find the id
                    if($result['dataset'] = $gender->find()){
                        $result['status']=1;
                    }
                    else{
                    }
                }
                else{
                    $result['exception']='identificador incorrecto';
                }
            break;
            //Update Gender
            case 'edit':
                if($gender->id($_POST['idEditGender'])){
                    if($gender->name($_POST['NameEditGender'])){
                        
                        $gender->edit();
                        $result['status']=1;
                    }
                    else{
                        $result['nombre incorrecto o campo vacio'];
                    }
                }
                else{
                    $result['exception']='identificador incorrecto';
                }
            break;
            //Delete Gender
            case 'destroy':
                if($gender->id($_POST['idGender'])){
                    
                    $gender->delete();
                    $result['status']=1;
                }
                else{
                    $result['exception']='Operacion fallida';
                }
            
            break;
            case 'getMovies':
                if ($result['dataset'] = $movie->all()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay peliculas registradas';
                }
            break;
            case 'search':
                if($gender->searchbyInput($_POST['searchGenders'])){
                    if($result['dataset']=$gender->search()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='Sin resultados';
                    }
                }
                else{
                    $result['exception']='Campo vacio';
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