<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/movies.php');
    require_once('../../models/gendersmovie.php');
    require_once('../../models/actorsmovie.php');

    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();
        $movie = new Movies();
        $gendermovies = new Gendermovie();
        $actorsmovie = new Actormovie();
        $result = array('status'=>'','exception'=>'');
        if($_GET['site']=='ecommerce'){
            switch($_GET['action']){
                case 'verifyMovie':
                    if($movie->id($_POST['idMovie'])){
                            if($movie->existsite()){
                                $result['status']=1;
                            }else{
                                $result['exception']='main.php';
                            }
                    }
                    else{
                       $result['exception']='main.php';
                    }
                break;
                case 'getMovie':
                    if($movie->id($_POST['idMovie'])){
                        if($result['dataset']=$movie->findbyId()){
                            $result['status']=1;
                        }else{
                            $result['exception']='No hay información recopilada';    
                        }
                    }else{
                        $result['exception']='No hay información recopilada';
                    }
                break;
                case 'getGenders':
                if($gendermovies->movie_id($_POST['idMovie'])){
                    if($result['dataset']=$gendermovies->getGenders_in_MoviesbyId()){
                        $result['status']=1;          
                    }
                    else{
                        $result['exception']='No hubieron generos encontrados';
                    }
                }
                else{
                    $result['exception']='No hay información recopilada';
                }
                break;
                case 'getActors':
                if($actorsmovie->id_movie($_POST['idMovie'])){
                    if($result['dataset']=$actorsmovie->getActors_in_MoviesbyId()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay reparto en esta pelicula';
                    }
                }
                else{
                    $result['exception']='Fallo al adquirir los datos';
                }
                break;
                default:
                exit('acción no disponible');
            }
        }
        else{
            exit('recurso no disponible');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }
?>