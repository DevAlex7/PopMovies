    <?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/actors.php');
    require_once('../../models/movies.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site']) && isset($_GET['action']))
    {
        session_start();
        $actor = new Actor();
        $movie = new Movies();
        $binnacle = new Binnacle();
        $result = array('status' => 0, 'exception' =>'');
        if($_GET['site']=='dashboard')
        {
            switch($_GET['action'])
            {
                
                //Create Actor
                case 'createActor':
                    if($actor->name($_POST['NameActor'])){
                        if($binnacle->site('actors')){
                            $message="agregado al actor:".' '.$actor->getname();
                            $binnacle->actionperformed($message);
                            $binnacle->admin_id($_SESSION['idUsername']);
                            $binnacle->create();
                            $actor->create();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Ha ocurrido un error, contacte con el administrador';
                        }
                    }   
                    else{
                        $result['exception']='Nombre incorrecto';
                    }                
                break;
                
                //Table
                case 'showActors':
                    if($result['dataset']=$actor->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay actores registrados';
                    }
                break;
                
                //Show Information Actor in Modal
                case 'showActor':
                    if($actor->id($_POST['id'])){
                        if($result['dataset']=$actor->find()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay actores registrados';
                        }
                    }
                    else{
                        $result['exception']='No se ha encontrado información del actor seleccionado';
                    }
                break;

                //Update Actor
                case 'updateActor':
                   if($actor->id($_POST['idUpdateActor'])){
                    if($actor->name($_POST['UpdateNameActor'])){
                        if($binnacle->site('actors')){
                            $get=$actor->find();
                            $message="actualizado el nombre del actor:".' '.$get['name'].' a '.$actor->getname();
                            $binnacle->actionperformed($message);
                            $binnacle->admin_id($_SESSION['idUsername']);
                            $actor->update();
                            $binnacle->create();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Ha ocurrido un error, contacte con el administrador';
                        }
                    }   
                    else{
                        $result['exception']='Nombre incorrecto';
                    }          
                   }    
                   else{
                       $result['exception']='No hay información para realizar dicha acción';
                   }
                break;
                
                    //Delete Actor
                case 'deleteActor':
                   
                break;
                case 'getMovies':
                    if ($result['dataset'] = $movie->all()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay peliculas registradas';
                    }
                break;
                case 'search':
                        if($actor->searchbyInput($_POST['searchActors'])) {
                            if($result['dataset'] = $actor->search()){
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
        else
        {
            exit('acceso no disponible');
        }
        print(json_encode($result));
    }
    else
    {
        exit('recurso denegado');
    }
?>