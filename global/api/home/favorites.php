<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/favorites.php');
    
    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();
        $favorite = new Favorites();
        $result=array('status'=>0,'exception'=>'');
        if($_GET['site']=='ecommerce'){
            switch($_GET['action']){
                case 'verify':
                    if($favorite->movie_id($_POST['idMovie'])){
                        if($favorite->user_id($_SESSION['idClient'])){
                            if($favorite->exist()){
                                $result['status']=1;
                            }
                            else{
                                $result['status']=2;
                            }
                        }
                        else{
                            $result['exception']='Usuario no identificado';
                        }
                    }
                    else{
                        $result['exception']='Pelicula no identificada';
                    }
                break;
                case 'create':
                    if($favorite->movie_id($_POST['idMovie'])){
                        if($favorite->user_id($_SESSION['idClient'])){
                            if(!$favorite->exist()){
                                $favorite->create();
                                $result['status']=1;
                            }
                            else{
                                $favorite->delete();
                                $result['status']=2;
                            }
                        }
                        else{
                            $result['exception']='Usuario no identificado';
                        }
                    }
                    else{
                        $result['exception']='Pelicula no identificada';
                    }
                break;
                case 'getFavoritebyUser':
                    if($favorite->user_id($_SESSION['idClient'])){  
                        if($result['dataset']=$favorite->showFavoritesinUser()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay favoritos por el momento';
                        }
                    }else{
                        $result['exception']='No se han encontrado resultados :( de usuario';
                    }
                break;
                case 'getCount':
                    if($favorite->user_id($_SESSION['idClient'])){
                        if($result['dataset']=$favorite->NumberofFavoritesbyUser()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No tienes peliculas favoritas';
                        }
                    }
                    else{
                        $result['exception']='No hay información del usuario :(';
                    }
                break;
                default:
                exit('acción no disponible');
            }
        }
        else{
            exit('acceso denegado');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }
?>