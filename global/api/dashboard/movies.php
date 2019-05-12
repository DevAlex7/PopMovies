<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/actors.php');
    require_once('../../models/movies.php');
    require_once('../../models/genders.php');
    require_once('../../models/clasifications.php');
    require_once('../../models/customers.php');
    require_once('../../models/gendersmovie.php');

    

    if( isset($_GET['site']) && $_GET['action'] ){
        
        session_start();
        $movie = new Movies();
        $actor = new Actor();
        $gender = new Gender();
        $clasification = new Clasification();
        $customer = new Customers();
        $gendermovie = new Gendermovie();
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
                case 'getActors':
                    if($result['dataset'] = $actor->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay actores registrados';
                    }
                break;
                case 'getGenders':
                    if($result['dataset']=$gender->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay Generos registrados';
                    }
                break;
                case 'getClasifications':
                    if($result['dataset']=$clasification->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay clasificaciones registradas';
                    }
                break;
                case 'getCustomers':
                if($result['dataset']=$customer->all()){
                    $result['status']=1;
                }
                else{
                    $result['exception']='No hay customers en lista';
                }
                break;
                case 'saveMovie':
                    if($movie->name($_POST['CreateMovieName'])){
                        if($movie->sipnosis($_POST['CreateSipnosisMovie'])){
                            if($movie->time($_POST['CreateTimeMovie'])){
                                if(is_uploaded_file($_FILES['FileMovieCover']['tmp_name'])){
                                    if($movie->cover($_FILES['FileMovieCover'], null)){
                                            if($movie->saveFile($_FILES['FileMovieCover'], $movie->getRoot(), $movie->getImage())){
                                                if($movie->price($_POST['CreatePriceMoney'])){
                                                    if($movie->count($_POST['CreateStockMovie'])){
                                                        if($movie->year($_POST['YearMovie'])){
                                                            if($movie->trailer($_POST['TrailerMovie'])){
                                                                if($movie->customer($_POST['ComboCustomers'])){
                                                                    
                                                                    $movie->create();
                                                                    $result['status']=1;
                                                                }
                                                                else{
                                                                    $result['exception']='Campo vacio';
                                                                }
                                                            }
                                                            else{
                                                                $result['exception']='Formato incorrecto de video o campo vacio';
                                                            }
                                                        }
                                                        else{
                                                            $result['exception']='Formato incorrecto de año o campo vacio';
                                                        }
                                                    }
                                                    else{
                                                        $result['exception']='Formato incorrecto de ingreso o campo vacio';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='Formato incorrecto de precio o campo vacio';
                                                }
                                            }
                                            else{
                                                $result['status'] = 2;
                                                $result['exception'] = 'No se guardó el archivo';
                                            }
                                    }
                                    else{
                                        $result['exception'] = $movie->getImageError();
                                    }
                                }
                                else{
                                    $result['exception'] = 'Seleccione una imagen';
                                }
                            }
                            else{
                                $result['exception']='Formato de hora incorrecta';
                            }
                        }
                        else{
                            $result['exception']='Campo vacio';
                        }

                    }
                    else{
                        $result['exception']='Nombre incorrecto o vacio';
                    }
                break;
                case 'getMovies':
                    if($result['dataset']=$movie->all()){
                        $result['status']=1;
                        
                    }
                    else{
                        $result['exception']='No hay peliculas en lista';
                    }                
                break;
                case 'getById':
                if($movie->id($_POST['getId'])){
                    if($result['dataset']=$movie->findbyId()){
                        $result['status']=1;
                    }else{
                        $result['exception']='No hay resultados';
                    }
                }
                else{
                    $result['exception']='Identificador incorrecto';
                }
                break;
                case 'editMovie':
                if($movie->name($_POST['TitleMovieEdit'])){
                    if($movie->sipnosis($_POST['SipnosisEdit'])){
                        if($movie->time($_POST['TimeMovieEdit'])){
                            if(is_uploaded_file($_FILES['FileMovieCover']['tmp_name'])){
                                if($movie->cover($_FILES['FileMovieCover'], null)){
                                        if($movie->saveFile($_FILES['FileMovieCover'], $movie->getRoot(), $movie->getImage())){
                                            if($movie->price($_POST['PriceEdit'])){
                                                if($movie->count($_POST['CountMovieEdit'])){
                                                    if($movie->year($_POST['YearMovieEdit'])){
                                                        if($movie->trailer($_POST['TrailerMovieEdit'])){
                                                            if($movie->customer($_POST['EditCustomerMovie'])){
                                                                if($movie->id($_POST['MovieId'])){
                                                                    $movie->edit();
                                                                    $result['status']=1;
                                                                }
                                                                else{
                                                                    $result['exception']='Identificador no encontrado';
                                                                }
                                                            }
                                                            else{
                                                                $result['exception']='Campo vacio';
                                                            }
                                                        }
                                                        else{
                                                            $result['exception']='Formato incorrecto de video o campo vacio';
                                                        }
                                                    }
                                                    else{
                                                        $result['exception']='Formato incorrecto de año o campo vacio';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='Formato incorrecto de ingreso o campo vacio';
                                                }
                                            }
                                            else{
                                                $result['exception']='Formato incorrecto de precio o campo vacio';
                                            }
                                        }
                                        else{
                                            $result['status'] = 2;
                                            $result['exception'] = 'No se guardó el archivo';
                                        }
                                }
                                else{
                                    $result['exception'] = $producto->getImageError();
                                }
                            }
                            else{
                                $result['exception'] = 'Seleccione una imagen';
                            }
                        }
                        else{
                            $result['exception']='Formato de hora incorrecta';
                        }
                    }
                    else{
                        $result['exception']='Campo vacio';
                    }

                }
                else{
                    $result['exception']='Nombre incorrecto o vacio';
                }
                break;
                case 'deleteMovie':
                    if($movie->id($_POST['getId']) ){
                      if($movie->destroy()){
                        if($movie->deleteFile($movie->getRoot(), $_POST['getImage'])){
                            $result['status'] = 1;
                        }
                        else{
                            $result['status'] = 2;
                            $result['exception'] = 'No se borró el archivo';
                        }
                      }
                      else{
                       $result['exception']='Operación fallida';
                      }
                    }
                    else{
                        $result['exception']='No hay un identificador';
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