<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/genders.php');
    require_once('../../models/gendersmovie.php');
    require_once('../../models/movies.php');

    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();
        $gender = new Gender();
        $movie=new Movies();
        $gendersmovie = new Gendermovie();
        $result=array('status'=>0,'exception'=>'','gender'=>'','movies'=>'');
        if($_GET['site']=='ecommerce'){
            switch($_GET['action']){
                case 'getGenders':
                if($result['dataset']=$movie->getMoviesbyGender()){
                    if($result['setGender']=$gender->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='no hay información';
                    }
                }
                else{
                    $result['exception']='No hay información';
                }
                break;
                default:
                exit('acción no disponible');
            }
        }
        else{
            exit('acceso denegado');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }

?>