<?php 

    require_once('../../helpers/validator.php');
    require_once('../../helpers/instance.php');
    require_once('../../models/trending.php');
    require_once('../../models/movies.php');

    if( isset($_GET['site']) && isset($_GET['action']))
    {
        session_start();
        $trending = new Trending(); 
        $movie = new Movies();
        $result = array('status'=>0,'exception'=>'');
        if( isset($_GET['site'])=='ecommerce' ){
            switch($_GET['action']){
                case 'getTrendings':
                    if($result['dataset']=$trending->getTrendings()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay peliculas registradas :(';                        
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
        exit('recurso no disponible');
    }
?>