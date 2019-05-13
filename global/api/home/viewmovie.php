<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/movies.php');

    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();
        $movie = new Movies();
        $result = array('status'=>'','exception'=>'');
        if($_GET['site']=='ecommerce'){
            switch($_GET['action']){
                case 'verifyMovie':
                    if($movie->id($_POST['idMovie'])){
                        if($movie->name($_POST['nameMovie'])){
                            if($movie->existsite()){
                                $result['status']=1;
                            }else{
                                $result['exception']='main.php';
                            }
                        }
                        else{
                            $result['exception']='main.php';
                        }
                    }
                    else{
                       $result['exception']='main.php';
                    }
                break;
                default:
                exit('acción no disponible');
            }
        }
        else{
            exit('recurso no disponible');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }
?>