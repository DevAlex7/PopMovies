<?php 

    require_once('../../helpers/validator.php');
    require_once('../../helpers/instance.php');
    require_once('../../models/adminusers.php');
    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();
        $admin = new adminusers();
        $result=array('status'=>0,'exception'=>'');
        if($_GET['site']=='dashboard'){
            switch($_GET['action']){
                case 'readProfile':
                    if($admin->id($_SESSION['idUsername'])){
                        if($result['dataset']=$admin->allbyId()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay información recopilada';
                        }
                    }
                    else{
                        $result['exception']='Error al recopilar su información, lo sentimos :(';
                    }
                break;
                case 'editProfile':
                if($admin->name($_POST['EditNameUser'])){
                    if($admin->lastname($_POST['EditLastNameUser'])){
                        if($admin->username($_POST['EditUsername'])){
                            if($admin->email($_POST['EditEmailUser'])){
                               if($admin->id($_POST['id_listEdit'])){
                                if($admin->edit()){
                                    $_SESSION['idUsername']= $admin->getId();
                                    $_SESSION['AdminUsername']=$admin->getUsername();
                                    $_SESSION['AdminName']=$admin->getName();
                                    $_SESSION['AdminLastname']=$admin->getLastname();
                                    $result['status']=1;
                                }
                                else{
                                    $result['exception'] = 'Operación fallida';
                                }
                               }
                               else{
                                   $result['exception']='No se ha encontrado un valor';
                               }
                            }
                            else{
                                $result['exception']='Formato incorrecto de correo o campo vacio';
                            }
                        }
                        else{
                            $result['exception']='Usuario incorrecto o campo vacio';
                        }
                    }
                    else{
                        $result['exception']='Apellidos incorrectos o campo vacio';
                    }
                }
                else{
                    $result['exception']= 'Nombre incorrecto o campo vacio';
                }
                break;
                case 'deleteProfile':
                
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