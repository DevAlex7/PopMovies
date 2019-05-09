<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/actorsmovie.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $actormovie = new Actormovie();
        $binnacle = new Binnacle();
        $result = array('status'=>0, 'exception'=>'','actor'=>'');
        if($_GET['site']=='dashboard'){
            
            switch($_GET['action']){

                //Create a new actor in a movie
                case 'createList':
                    if(isset($_POST['ActorsSelect']) && isset($_POST['MoviesSelect'])){
                        if($actormovie->id_actor($_POST['ActorsSelect'])){
                            if($actormovie->id_movie($_POST['MoviesSelect'])){
                                if(!$actormovie->exist()){
                                    if($binnacle->site('actors')){
                                        $actormovie->create();
                                        $get = $actormovie->getNames();
                                        $message="asignado el actor".' '.$get['actor'].' a la pelicula: '.$get['movie'];
                                        $binnacle->actionperformed($message);
                                        $binnacle->admin_id($_SESSION['idUsername']);
                                        $binnacle->create();
                                        $result['status']=1;
                                    }
                                    else{
                                        $result['exception']='Ha ocurrido un error, llame al administrador';
                                    }
                                }
                                else{
                                    $result['exception']='Esta pelicula ya esta registrada con ese actor';
                                }
                            }
                            else{
                                $result['No se ha encontrado un identificador de pelicula'];
                            }
                        }
                        else{
                            $result['No se ha encontrado un identificador de actor'];
                        }
                    }
                    else{
                        $result['exception']='No se ha seleccionado ningun valor';
                    }
                break;
                //Get the actors in a selected movie
                case 'getActorsinMovie':
                    if($actormovie->id_movie($_POST['getId'])){
                        if($result['dataset'] = $actormovie->getActors_in_MoviesbyId()) {
                            $result['status']=1;
                        }else{
                            $result['exception']='No hay información';
                        }
                    }   
                    else{
                        $result['exception']='No se ha encontrado resultados';
                    }
                break;
                //Get all rows 
                case 'getList':
                    if($result['dataset'] = $actormovie->getActors_in_Movies()) {
                        $result['status']=1;
                    }else{
                        $result['exception']='No hay información';
                    }
                break;
                //Get actor and movie id with the id
                case 'getListbyId':
                    if($actormovie->id($_POST['id_list'])){
                        if($result['dataset']= $actormovie->getListbyId()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay información';
                        }
                    }
                    else{
                        $result['exception']='Identificador no encontrado';
                    }
                break;
                case 'editList':
                    if(isset($_POST['SelectEditActortoMovie'])){
                        if(isset($_POST['SelectEditMovie'])){
                            if($actormovie->id($_POST['id_list'])){
                                if($actormovie->id_actor($_POST['SelectEditActortoMovie'])){
                                    if($actormovie->id_movie($_POST['SelectEditMovie'])){
                                        $actormovie->edit();
                                        $result['status']=1;
                                    }   
                                    else{
                                        $result['exception']='Selección de pelicula invalido';    
                                    }                                 
                                }
                                else{
                                    $result['exception']='Selección de actor invalido';
                                }
                            }
                            else{
                                $result['exception']='Identificador no encontrado';
                            }
                        }
                        else{
                            $result['exception']='No ha seleccionado ninguna pelicula';
                        }
                    }
                    else{
                        $result['exception']='No ha seleccionado ningun actor';
                    }
                break;
                case 'deleteRow':
                    if($actormovie->id($_POST['idDeleteActorMovie'])){
                        $actormovie->destroy();
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='Identificador no identificado';
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
        exit('recurso denegado');
    }
?>