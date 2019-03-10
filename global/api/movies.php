<?php 

    require_once('../models/movies.php');
    require_once('../helpers/instance.php');

    if( isset($_GET['site']) && $_GET['action'] ){
        
        session_start();
        $movie = new Movies();
        $result = array('status'=>0, 'exception'=>'');

        if($_GET['site']=='dashboard'){

            switch($_GET['action']){

                case 'GetMovies':
                    if($result['dataset'] = $movie->GetMovies()){
                        $result['status']= 1;
                    }
                    else
                    {
                        $result['exception'] = 'No hay Peliculas Disponibles';
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