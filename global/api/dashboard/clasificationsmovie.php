<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/clasificationsmovie.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $clasificationsmovie = new Clasificationsmovie();
        $binnacle=new Binnacle();
        $result = array('status'=>0,'exception'=>'');
        if($_GET['site']=='dashboard'){

            switch($_GET['action']){
                case 'CreateList':
                    if(isset($_POST['ClasificationsSelect'])){
                        if(isset($_POST['MoviesSelect'])){
                            if($clasificationsmovie->clasification_id($_POST['ClasificationsSelect'])){
                                if($clasificationsmovie->movie_id($_POST['MoviesSelect'])){
                                    if(!$clasificationsmovie->exist()){
                                        if($binnacle->site('clasifications')){
                                            $clasificationsmovie->create();
                                            $get = $clasificationsmovie->getNames();
                                            $message ="ha asignado la clasificación:".' '.$get['clasification'].' a la pelicula '.$get['name'];
                                            $binnacle->actionperformed($message);
                                            $binnacle->admin_id($_SESSION['idUsername']);
                                            $binnacle->create();
                                            $result['status']=1;   
                                        }
                                        else{
                                            $result['exception']='Ha ocurrido un problema contacte al administrador';
                                        }
                                    }
                                    else{
                                        $result['exception']='La pelicula ya cuenta con una clasificación';
                                    }
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
                case 'getClasificationinMovie':
                    if($clasificationsmovie->movie_id($_POST['getId'])){
                        if($result['dataset']=$clasificationsmovie->getClasificationsinMovie()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay información de una clasificación en esta pelicula';
                        }
                    }
                    else{
                        $result['exception']='Dato invalido';
                    }
                break;
                case 'getList':
                    if($result['dataset']=$clasificationsmovie->GetClasificationsInMovies()){
                        $result['status']=1;
                    }else{
                        $result['exception']='No hay clasificaciones en peliculas registradas!';
                    }
                break;
                case 'getListbyId':
                    if($clasificationsmovie->id($_POST['id_list'])){
                        if($result['dataset']= $clasificationsmovie->getListbyId()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No se ha encontrado información';
                        }
                    }
                    else{
                        $result['exception']='No se ha encontrado un valor identificador';
                    }
                break;
                case 'editRowClasification':
                    if($clasificationsmovie->id($_POST['Id_List'])){
                        if($clasificationsmovie->clasification_id($_POST['EditSelectClasification'])){
                                    $clasificationsmovie->edit();
                                    $result['status']=1;
                        }
                        else{
                            $result['exception']='No se ha seleccionado una clasificación';
                        }
                    }
                    else{
                        $result['exception']='No se ha encontrado un identificador o valor';
                    }
                break;
                case 'deleteRowClasification':
                
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