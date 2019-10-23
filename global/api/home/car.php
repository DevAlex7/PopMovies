<?php 

    require_once('../../helpers/validator.php');
    require_once('../../helpers/instance.php');
    require_once('../../models/car.php');
    require_once('../../models/movies.php');
    require_once('../../models/detailcar.php');

    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();

        $car = new Car();
        $lastId= new Database();
        $movie = new Movies();
        $detail = new detailCar();
        $result = array('status'=>0,'exception'=>'','id'=>'');

        if($_GET['site']=='ecommerce'){
            switch($_GET['action']){
                case 'createCar':
                   if(($_POST['countUser']) >=1 ){
                        if($car->client($_SESSION['idClient'])){
                            if($car->existOrder()){
                                if($detail->id_movie($_POST['idMovie'])){
                                    if($detail->count($_POST['countUser'])){
                                        if($movie->id($_POST['idMovie'])){
                                            $get = $movie->allbyId();
                                            if($get['count']>=$_POST['countUser']){
                                                $stock = $get['count'] - $_POST['countUser'];
                                                if($detail->price($get['price'])){
                                                    if($movie->count($stock)){
                                                        $getCar = $car->existOrder();
                                                        if($detail->id_car($getCar['id'])){
                                                            if($detail->existMovieinCart()){
                                                                $count = $detail->getCount();
                                                                $countDetail= $count['count']+$_POST['countUser'];
                                                                if($detail->count($countDetail)){
                                                                    $movie->updateCount();
                                                                    $detail->updateCountbyId();
                                                                    $result['status']=3;
                                                                }
                                                                else{
                                                                    $result['exception']='No se puedo añadir a la lista :(';
                                                                }
                                                            }
                                                            else{
                                                                $movie->updateCount();
                                                                $detail->createDetailOrder();
                                                                $result['status']=2;
                                                            }
                                                        }
                                                        else{
                                                            $result['exception']='error al obtener información';
                                                        }

                                                    }else{
                                                        $result['exception']='Cantidad invalida para stock';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='Dato invalido de precio';
                                                }
                                            }
                                            else{
                                                $result['exception']='Cantidad ingresada no disponible en stock';
                                            }
                                        }
                                        else{
                                            $result['exception']='No hay información de la pelicula';
                                        }   
                                    }
                                    else{
                                        $result['exception']='Dato invalido de cantidad';
                                    }
                                }
                                else{
                                    $result['exception']='No hay información de la pelicula';
                                }
                            }
                            else{
                                //If not exist Order
                                if($detail->id_movie($_POST['idMovie'])){
                                    if($detail->count($_POST['countUser'])){
                                        if($movie->id($_POST['idMovie'])){
                                            $get = $movie->allbyId();
                                            if($get['count']>=$_POST['countUser']){

                                                $price = $_POST['countUser'] * $get['price'];
                                                $stock = $get['count']-$_POST['countUser'];

                                                if($movie->count($stock)){
                                                    if($detail->price($price)){
                                                        $car->createOrder();
                                                        $getCar = $car->existOrder();
                                                        $_SESSION['idcar'] = $getCar['id'];
                                                            if($detail->id_car($getCar['id'])){
                                                                $movie->updateCount();
                                                                $detail->createDetailOrder();
                                                                $result['status']=1;
                                                            }
                                                            else{
                                                                $result['exception']='error al obtener información';
                                                            }
                                                    }
                                                    else{
                                                        $result['exception']='Dato invalido de precio';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='Cantidad invalido';
                                                }
                                            }
                                            else{
                                                $result['exception']='Cantidad ingresada no existente en stock';
                                            }
                                        }else{
                                            $result['exception']='No hay información de la pelicula';
                                        }

                                    }
                                    else{
                                        $result['exception']='Dato invalido de cantidad';
                                    }
                                }
                                else{
                                    $result['exception']='No hay información de la pelicula';
                                }
                            }
                        }
                        else{
                            $result['exception']='No hay información del usuario';
                        }
                   }
                   else{
                       $result['exception']='Cantidad invalida';
                   }
                break;
                case 'getCarId':
                    if($car->client($_SESSION['idClient'])){
                        if($result['dataset']=$car->getIdOrder()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Carro inexistente';
                        }
                    }
                    else{
                        $result['exception']='No hay información del usuario';
                    }
                break;
                case 'viewmyList':
                    if($detail->id_car($_POST['id_car'])){
                        if($result['dataset']=$detail->getListOrder()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay ningun producto en tu lista';
                        }
                    }
                    else{
                        $result['exception']='No hay información de carrito disponible';
                    }
                break;
                case 'deleteItem':
                    if($detail->id($_POST['id'])){
                        if($movie->id($_POST['Movie_id'])){
                            $get = $movie->allbyId();
                            $cart = $detail->allbyId();
                            
                            $newStock = $get['count'] + $cart['count'];
                            
                            if($movie->count($newStock)){
                                $movie->updateCount();
                                $detail->deleteItemList();
                                $result['status']=1;
                            }  
                            else{
                                $result['exception']='Dato invalido';
                            }
                        }
                        else{
                            $result['exception']='No se encontro información de la pelicula';
                        }
                    }
                    else{
                        $result['exception']='No se encontro información del producto';
                    }
                break;
                case 'updateStatus':
                    if($car->id($_POST['idCar'])){
                        if($car->status(1)){
                            $car->updateOrderStatus();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Dato invalido de estado';
                        }
                    }
                    else{
                        $result['exception']='No se encontro información de su orden';
                    }
                break;
                case 'getInformationCart':
                    //Obtener la información de la orden
                break;
                case 'deleteTodayOrder':
                    
                break;
                default:
                exit('acción no disponible');
            }
        }else{
            exit('recurso no disponible');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }

?>