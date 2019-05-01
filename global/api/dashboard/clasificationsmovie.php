<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/clasificationsmovie.php');

    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $clasificationsmovie = new Clasificationsmovie();
        $result = array('status'=>0,'exception'=>'');
        if($_GET['site']=='dashboard'){

            switch($_GET['action']){
                case 'CreateList':
                    if(isset($_POST['ClasificationsSelect'])){
                        if(isset($_POST['MoviesSelect'])){
                            if($clasificationsmovie->clasification_id($_POST['ClasificationsSelect'])){
                                if($clasificationsmovie->movie_id($_POST['MoviesSelect'])){
                                    $clasificationsmovie->create();
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='No se ha encontrado un valor valido';
                                }
                            }
                            else{
                                $result['exception']='No se ha encontrado un valor valido';
                            }
                        }
                        else{
                            $result['exception']='No se ha seleccionado ninguna pelicula';
                        }
                    }
                    else{
                        $result['exception']='No se ha seleccionado ninguna clasificación';
                    }
                break;
                default:
                exit('Acción no disponible');
            }
        }
        else{
            exit('Acceso no disponible');
        }
        print(json_encode($result));
    }
    else{
        exit('Recurso no disponible');
    }

?>