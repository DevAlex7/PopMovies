<?php 
require_once('../../helpers/instance.php');
require_once('../../helpers/validator.php');
require_once('../../models/comments.php');
require_once('../../models/binnacle.php');
require_once('../../models/movies.php');

if(isset($_GET['site'])&&isset($_GET['action'])){
    session_start();
    $talk = new Comment();
    $movie = new Movies();
    $binnacle = new Binnacle();
    $result=array('status'=>0,'exception'=>'','user'=>'');
    if($_GET['site']=='ecommerce'){
        switch($_GET['action']){
            case 'Comment':
                if($talk->id_movie($_POST['idMovie'])){
                    if($talk->id_user($_SESSION['idClient'])){
                       if($talk->talk($_POST['Comment'])){
                           if($movie->id($_POST['idMovie'])){
                                $get = $movie->findbyId();
                                $message = "ha comentado:".' '.$talk->getComment().' en la pelicula: '.$get['name'];    
                                $binnacle->actionperformed($message);
                                $binnacle->user_id($_SESSION['idClient']);   
                                if($binnacle->site('comments')){
                                    $talk->create();
                                    $binnacle->create();
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception']='Ha ocurrido un problema, contacte al administrador';
                                }
                           }else{
                               $result['exception']='No hay información recopilada';
                           }
                       }
                       else{
                           $result['exception']='Error de comentario';
                       }
                    }
                    else{
                        $result['exception']='Fallo la operación, no hay datos del usuario';
                    }
                }
                else{
                    $result['exception']='Fallo la operación, no hay datos de la pelicula';
                }
            break;
            case 'GetComments':
                if($talk->id_movie($_POST['idMovie'])){
                   
                        if($result['dataset']=$talk->Show_Comments_in_Movies_byId()){
                            $result['status']=1;
                            $result['user']=$_SESSION['idClient'];
                        }
                        else{
                            $result['exception']='No hay comentarios en esta pelicula';
                        }
                }else{
                    $result['exception']='Fallo al adquirir los comentarios';
                }
            break;
            case 'getComment':
                if($talk->id($_POST['id'])){
                    if($result['dataset']=$talk->findbyId()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No se encontro el comentario :(';
                    }
                }
                else{
                    $result['exception']='No hay información del comentario :(';
                }
            break;
            case 'editComment':
                if ($talk->id($_POST['idEditMovie'])) {
                    if($talk->talk($_POST['EditComment'])){
                        $talk->edit();
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='Tu comentario debe llevar al menos 5 caracteres';
                    }
                } else {
                    $result['dataset']='No se pudo recopilar información para editar';
                }
                
            break;
            case 'deleteComment':
                
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