<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/clients.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site'])&&isset($_GET['action'])){
        session_start();
        $client = new Clients();
        $binnacle = new Binnacle();
        $validate = new Validator;
        $result=array('status'=>0,'exception'=>'','site'=>'');

        if(isset($_GET['site'])=='ecommerce'){
            switch($_GET['action']){
                case 'Signup':
                    if($client->uname($_POST['NameUser'])){
                        if($client->lastname($_POST['LastnameUser'])){
                            if($client->email($_POST['EmailUser'])){
                                if($client->username($_POST['Username'])){
                                    if($_POST['Username'] != $_POST['PasswordUser']){
                                        if( $_POST['PasswordUser'] == $_POST['Passwordtwo'] ){
                                            if($client->upassword($_POST['PasswordUser'])){
                                                $client->membership(null);
                                                $client->create();
                                                $result['status']=1;
                                            }else{
                                                $result['exception']='Su contraseña debe adquirir al menos 8 caracteres';
                                            }
                                        }
                                        else{
                                            $result['exception']='Las contraseñas ingresadas son diferentes';
                                        }
                                    }
                                    else{
                                        $result['exception']='La contraseña no puede ser igual que el usuario';
                                    }   
                                }
                                else{
                                    $result['exception']='Usuario debe de llevar 7 caracteres como minimo';
                                }
                            }
                            else{
                                $result['exception']='Formato incorrecto de correo';
                            }
                        }
                        else{
                            $result['exception']='Dato de apellido incorrecto o campo vacio';
                        }
                    }
                    else{
                        $result['exception']='Dato de nombre incorrecto o campo vacio';
                    }
                break;
                case 'login':
                    if($client->username($_POST['Username'])){
                        if($client->checkUsername()){
                            if($client->upassword($_POST['PasswordUser'])){
                                if($client->checkPassword()){
                                    if($validate->validateRecaptcha($_POST['token'])){
                                        $_SESSION['idClient']= $client->getId();
                                        $_SESSION['ClientUsername']=$client->getUsername();
                                        $_SESSION['ClientName']=$client->getName();
                                        $_SESSION['ClientLastName']=$client->getLastname();
                                        $result['status']=1;
                                        $result['site']='../../feed/home/main.php';
                                    }
                                    else{
                                        $result['exception']='No eres humano';
                                    }
                                }
                                else{
                                    $result['exception']='Contraseña o usuario incorrecto';
                                }
                            }
                            else{
                                $result['exception']='Campo Contraseña vacio o no tiene 8 caracteres';
                            }
                        }
                        else{
                            $result['exception']='Usuario Inexistente';
                        }
                    }
                    else{
                        $result['exception']='Campo Vacio o no tiene 8 caracteres';
                    }
                break;
                case 'logOff':
                   if($client->logOff()){
                        header('location: ../../../feed/home/');
                   }
                   else{
                        header('location: ../../../feed/home/main.php');
                       
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
        exit('acceso no disponible');
    }

?>