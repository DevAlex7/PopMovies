<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/actorsmovie.php');
    
    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $actormovie = new Actormovie();
        $result = array('status'=>0, 'exception'=>'');
        if($_GET['site']=='dashboard'){
            
            switch($_GET['action']){

                //Create a new actor in a movie
                case 'createList':
                    if(isset($_POST['ActorsSelect']) && isset($_POST['MoviesSelect'])){
                        if($actormovie->id_actor($_POST['ActorsSelect'])){
                            if($actormovie->id_movie($_POST['MoviesSelect'])){
                                $actormovie->save();
                                $result['status']=1;
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
                    if($actormovie->id($_POST['id'])){
                        if($result['dataset']= $actormovie->getListbyId()){

                        }
                        else{
                            $result['No se ha encontrado ']='';
                        }
                    }
                    else{
                        $result['exception']='Identificador no encontrado';
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