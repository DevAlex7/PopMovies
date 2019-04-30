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