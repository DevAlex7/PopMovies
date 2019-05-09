<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/gendersmovie.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $gendermovie = new Gendermovie();
        $binnacle = new Binnacle();
        $result = array('status'=>0, 'exception'=>'');
        if($_GET['site']=='dashboard'){
            switch($_GET['action']){
                case 'createList':
                    if(isset($_POST['GenderSelect'])){
                        if(isset($_POST['MoviesSelect'])){
                            if($gendermovie->gender_id($_POST['GenderSelect'])){
                                if($gendermovie->movie_id($_POST['MoviesSelect'])){
                                    if(!$gendermovie->exist()){
                                        if($binnacle->site('genders')){
                                            $gendermovie->create();
                                            $get=$gendermovie->getNames();
                                            $message = "asignado el genero ".' '.$get['Gender'].' a la pelicula: '.$get['Movie'];
                                            $binnacle->actionperformed($message);
                                            $binnacle->admin_id($_SESSION['idUsername']);
                                            $binnacle->create();                                        
                                            $result['status']=1;
                                        }
                                        else{
                                            $result['exception']='Ha ocurrido un problema, contacte al administrador';
                                        }
                                    }
                                    else{
                                        $result['exception']='Este genero ya esta registrado con esa pelicula';
                                    }
                                }
                                else{
                                    $result['exception']='No se ha encontrado un valor de identificador';
                                }
                            }
                            else{
                                $result['exception']='No se ha encontrado un valor de identificador';
                            }
                        }
                        else{
                            $result['exception']='No se ha seleccionado ninguna pelicula';
                        }
                    }
                    else{
                        $result['exception']='No se ha seleccionado ningun genero';
                    }
                break;
                case 'getGendersinMovie':
                    if($gendermovie->movie_id($_POST['getId'])){
                        if($result['dataset'] = $gendermovie->getGenders_in_MoviesbyId()) {
                            $result['status']=1;
                        }else{
                            $result['exception']='No hay información de generos en esta pelicula';
                        }
                    }   
                    else{
                        $result['exception']='No se ha encontrado resultados';
                    }
                break;
                case 'getList':
                    if($result['dataset']=$gendermovie->getGenders()){
                        $result['status']=1;
                    }   
                    else{
                        $result['exception']='No hay generos en peliculas registradas';
                    }
                break;
                case 'getListbyId':
                  if($gendermovie->id($_POST['id_list'])){
                    if($result['dataset'] = $gendermovie->getListbyId()){
                        $result['status']=1;
                    }   
                    else{
                        $result['exception']='No hay información';
                    }    
                  }   
                  else{
                    $result['exception']='Valor invalido o vacio';
                  }          
                break;
                case 'editRow':
                  if($gendermovie->id($_POST['id_list'])){
                    if($gendermovie->gender_id($_POST['SelectEditGendertoMovie'])){
                        if($gendermovie->movie_id($_POST['SelectEditMovie'])){
                            $gendermovie->edit();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No se ha seleccionado un valor de pelicula';
                        }
                    }
                    else{
                        $result['exception']='No se ha seleccionado un valor de genero';
                    }
                  }
                  else{
                    $result['exception']='Valor invalido o vacio';
                  }
                break;
                case 'deleteRow':
                  if($gendermovie->id($_POST['idDeleteGenderMovie'])){
                        $gendermovie->destroy();
                        $result['status']=1;
                  }
                  else{
                    $result['exception']='Valor invalido o vacio';
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