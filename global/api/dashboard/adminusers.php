<?php 
        require_once('../../helpers/validator.php');    
        require_once('../../models/adminusers.php');
        require_once('../../models/user_trusts.php');
        require_once('../../helpers/Mail.php');
        require_once('../../helpers/spendTime.php');
        require_once('../../helpers/instance.php');

        if(isset($_GET['site']) && isset($_GET['action']) )
        {
            session_start();
            $_SESSION['triesUser'] = '';            
            $userAdmin = new adminusers();
            $spend = new spendTime();
            $validate = new Validator();
            $trust = new user_Trusts();
            $mail = new Mail();
            $result = array('status'=>0,'exception'=>'','site'=>'');

            if($_GET['site']=='dashboard'){
                
                switch($_GET['action']){
                        case 'createAdminUser':
                        if($userAdmin->name($_POST['AdminUserName'])){
                            if($userAdmin->lastname($_POST['AdminUserLastName'])){
                                if($userAdmin->username($_POST['Username'])){
                                    if($userAdmin->email($_POST['AdminUserEmail'])){
                                        if($_POST['Username'] != $_POST['AdminUserPassword'] ){
                                            if($_POST['AdminUserPassword'] == $_POST['AdminUserRepeatPassword']){
                                                if($userAdmin->password($_POST['AdminUserPassword'])){
                                                    if($validate->validateRecaptcha($_POST['tokken'])){
                                                        if($userAdmin->create()){
                                                            $result['status']=1;
                                                        }
                                                        else{
                                                            $result['exception'] = 'Operación fallida';
                                                        }
                                                    }
                                                    else{
                                                        $result['exception']='Recaptcha Invalido';
                                                    }
                                                }
                                                else{
                                                    $result['exception'] = 'Clave menor a 6 caracteres';
                                                }
                                            }
                                            else{
                                                $result['exception'] = 'Las contraseñas son diferentes';
                                            }
                                        }
                                        else{
                                            $result['exception']='La contraseña no puede ser igual que el usuario';
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
                    case 'checkUsers':
                        if($result['dataset']=$userAdmin->checkUsers()){
                            $result['status']=1;
                        }
                        else{
                                $result['exception'] = '../../feed/account/signup.php';
                        }
                    break;
                    case 'login':
                                if($userAdmin->username($_POST['Username'])){
                                    if($userAdmin->checkUsername()){
                                        if($userAdmin->password($_POST['Password'])){
                                            if($userAdmin->checkPassword()){
                                                if($userAdmin->checkSession()){
                                                    if($userAdmin->checkStatus()){
                                                        $_SESSION['idUsername']= $userAdmin->getId();
                                                        $_SESSION['AdminUsername']=$userAdmin->getUsername();
                                                        $_SESSION['AdminName']=$userAdmin->getName();
                                                        $_SESSION['AdminEmail']=$userAdmin->getEmail();
                                                        $_SESSION['AdminLastname']=$userAdmin->getLastname();
                                                        $_SESSION['role']=$userAdmin->getRole();
                                                        $_SESSION['status']=$userAdmin->getStatus();
                                                        $_SESSION['tiempo'] = time();
                                                        $result['status']=1;
                                                        $result['site']='../../feed/account/home.php';
                                                    }
                                                    else{
                                                        $result['exception']='Este usuario esta inactivo o bloqueado';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='Este usuario ya esta logueado';
                                                }
                                            }
                                            else{
                                                $_SESSION['triesUser'] = $_POST['tries'];   

                                                if( $_POST['tries'] < 3 ){
                                                    $result['exception']='Datos incorrectos';       
                                                }
                                                else{
                                                    $result['exception'] = 'Intente más tarde, su usuario ha sida bloqueada';
                                                    $userAdmin->setBlockUser();
                                                    $result['status']=2;
                                                }
                                            }
                                        }
                                        else{
                                            $result['exception']='Campo vacio';
                                        }
                                    }
                                    else{
                                        $result['exception']='Usuario inexistente';
                                    }
                                }else{
                                    $result['exception']='Campo vacio';
                                }
                    break;
                    case 'all':
                    if($result['dataset']=$userAdmin->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay administradores además de usted :)';
                    }
                    break;
                    case 'logOff':
                    if ($userAdmin->LogOff()) {
                        header('location: ../../../feed/account/');
                    } else {
                        header('location: ../../../feed/account/home.php');
                    }
                    break;
                    case 'changePassword':
                        if($userAdmin->password($_POST['actualpass'])){
                            if($userAdmin->id($_SESSION['idUsername'])){
                                if($userAdmin->checkPassword()){
                                    if($_POST['actualpass'] != $_POST['passuser1']){
                                        if($_POST['passuser1'] == $_POST['passuser2'] ){
                                            if(strlen($_POST['passuser1']) >= 8 ){
                                                if($userAdmin->password($_POST['passuser1'])){
                                                    if($userAdmin->changePassword()){
                                                        $result['status']=1;
                                                    }
                                                    else{
                                                        $result['exception']='No se cambió la contraseña';
                                                    }
                                                }
                                                else{
                                                    $result['exception']='La contraseña no cumple con los carácteres solicitados';
                                                }
                                            }
                                            else{
                                                $result['exception']='La longitud de la contraseña es menor a 8 carácteres';
                                            }
                                        }
                                        else{
                                            $result['exception']='Las contraseñas no son iguales';
                                        }
                                    }
                                    else{
                                        $result['exception']='La nueva contraseña no puede ser igual que la actual';
                                    }

                                }
                                else{
                                    $result['exception']='La contraseña ingresada no es la actual.';
                                }
                            }
                            else{
                                $result['exception']='No se ha encontrado información del usuario.';
                            }
                        }
                        else{
                            $result['exception']='La contraseña no cumple con lo requerido.';
                        }   
                    break;
                    case 'sendEmail':  
                    break;
                    case 'listInTrust':
                        if($userAdmin->id($_SESSION['idUsername'])){
                            if($result['dataset']=$userAdmin->existsInTrusts()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay usuarios disponibles';
                            }
                        }
                        else{
                            $result['exception']='Sesión desconocida';
                        }
                    break;
                    case 'listTrusts':
                        if($trust->id_user($_SESSION['idUsername'])){
                            if($result['dataset']=$trust->getTrustUsersbyId()){
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='No hay usuarios de confianza';
                            }
                        }
                        else{   
                            $result['exception']='El usuario no se ha definido';
                        }
                    break;
                    case 'insertTrust':
                        var_dump($_POST);
                        if($trust->id_user($_SESSION['idUsername'])){
                            if($trust->id_user_trust($_POST['idTrust'])){
                                if($trust->save()){
                                    $result['status']=1;
                                    /*$mail->from('popmoviesshop@gmail.com','Popmovies');
                                    $mail->to($_SESSION['AdminEmail'],'Alejandro');
                                    $mail->sendMail();*/
                                }
                                else{
                                    $result['exception']='Fallo al asignar usuario de confianza';
                                }
                            }
                            else{
                                $result['exception']='No se ha seleccionado un usuario';
                            }
                        }
                        else{
                            $result['exception']='No se ha definido el usuario principal';
                        }
                    break;
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
            exit('Recurso denegado');
        }

?>