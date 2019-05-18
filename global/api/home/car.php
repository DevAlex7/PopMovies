<?php 

    require_once('../../helpers/validator.php');
    require_once('../../helpers/instance.php');
    require_once('../../models/car.php');
    require_once('../../models/movies.php');

    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();
        $car = new Car();
        $lastId= new Database();
        $movie = new Movies();
        $result = array('status'=>0,'exception'=>'','id'=>'');

        if($_GET['site']=='ecommerce'){
            switch($_GET['action']){
                case 'createCar':
                if($car->id_user($_SESSION['idClient'])){
                    if($car->id_movie($_POST['idMovie'])){
                        if($movie->id($_POST['idMovie'])){
                            if($car->exist()){
                                if($_POST['countUser']==(int)0 || $_POST['countUser'] < 1){
                                    $result['exception']='Cantidad no disponible';
                                }
                                else{
                                    $getCar = $car->getListbyId();
                                    $get = $movie->allbyId();
                                    
                                    if($_POST['countUser'] <= $get['count']){
                                        $countUser= $getCar['count'] + $_POST['countUser'];
                                        if($car->count($countUser)){
                                            //Calculate the total price
                                            $total = $get['price'] * $countUser;
                                            //Calculate the total stock
                                            $totalStock=$get['count'] - $_POST['countUser'];

                                            if($movie->count($totalStock)){
                                                if($car->total($total)){
                                                    //Update stock of movie
                                                    $movie->updateCount();
                                                    //Update the count list in the car with the same movie
                                                    $car->updateList();  
                                                    $result['status']=2;     
                                                }else{
                                                    $result['exception']='Falló al realizar la compra';
                                                }
                                            }
                                            else{
                                                $result['exception']='Dato invalido numerico';
                                            }
                                        }
                                        else{
                                            $result['exception']='Cantidad invalida';
                                        }
                                    }else{
                                        $result['exception']='No hay stock disponible para esa pelicula';
                                    }
                                }
                            }
                            else{
                                if($_POST['countUser']==(int)0 || $_POST['countUser'] < 1){
                                    $result['exception']='Cantidad no disponible';
                                }
                                else{
                                    $get = $movie->allbyId();
                                    if( $_POST['countUser'] <= $get['count'] ){
                                        if($car->count($_POST['countUser'])){
                                            
                                            //Total price
                                            $total=$get['price']*$_POST['countUser'];
                                            //Total stock
                                            $totalStock = $get['count']-$_POST['countUser'];
                                            
                                            if($movie->count($totalStock)){
                                                if($car->total($total)){
                                                    $movie->updateCount();
                                                    $car->create();  
                                                    $result['status']=1;     
                                                }else{
                                                    $result['exception']='Falló la compra';
                                                }
                                            }
                                            else{
                                                $result['exception']='Fallo la operación de la compra';
                                            }
                                        }
                                        else{
                                            $result['exception']='Dato invalido numerico';
                                        }
                                    }
                                    else{
                                        $result['exception']='No hay stock de esta pelicula para esa cantidad';
                                    }
                                }
                            }
                        }
                        else{
                            $result['exception']='No hay información de la pelicula para la compra';
                        }
                    }   
                    else{
                        $result['exception']='Dato de pelicula invalido';
                    }
                }
                else{
                    $result['exception']='Dato de usuario invalido';
                }
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