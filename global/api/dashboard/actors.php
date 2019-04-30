    <?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/actors.php');
    require_once('../../models/movies.php');

    if(isset($_GET['site']) && isset($_GET['action']))
    {
        session_start();
        $actor = new Actor();
        $movie = new Movies();
        $result = array('status' => 0, 'exception' =>'');
        if($_GET['site']=='dashboard')
        {
            switch($_GET['action'])
            {
                
                //Create Actor
                case 'createActor':

                   if(empty($actor->name = $_POST['NameActor'])){
                        $result['exception'] = 'Nombre incorrecto';
                   }
                   else
                   {
                       //verify if Actor exists
                       if(! $actor->exists()){
                        $actor->create();
                        $result['status'] = 1;
                       }
                       else
                       {
                        $result['exception']  = 'Actor existente';
                       }
                    }
                break;
                
                //Table
                case 'showActors':
                
                    if ($result['dataset'] = $actor->all()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay Actores registradas';
                    }
                break;
                
                //Show Information Actor in Modal
                case 'showActor':
                    
                    if(empty($_POST['id']))
                    {
                        $result['exception'] = 'Actor incorrecto';
                    }
                    else
                    {
                        $actor->id = $_POST['id'];
                        if($result['dataset'] = $actor->find())
                        {
                            $result['status'] = 1;
                        }
                        else
                        {
                            $result['exception'] = 'Actor inexistente';
                        }
                    }
                break;

                //Update Actor
                case 'updateActor':

                    if(empty($_POST['idUpdateActor'])||empty($_POST['UpdateNameActor']))
                    {
                        print 'Campos Vacios';
                    }
                    else
                    {
                        $actor->id = $_POST['idUpdateActor'];
                        $actor->name = $_POST['UpdateNameActor'];
                        $actor->update();
                        $result['status']=1;

                    }
                    break;
                
                    //Delete Actor
                    case 'deleteActor':
                    if(empty($_POST['idDeleteNameActor']) )
                    {
                        print 'Codigo incorrecto';
                    }
                    else
                    {
                        $actor->id = $_POST['idDeleteNameActor'];
                        $actor->delete();
                        $result['status']=1;

                    }
                    break;
                    case 'getMovies':
                    if ($result['dataset'] = $movie->all()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay peliculas registradas';
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