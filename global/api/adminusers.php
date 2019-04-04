<?php 
        require_once('../helpers/validator.php');    
        require_once('../models/adminusers.php');
        require_once('../helpers/instance.php');

        if(isset($_GET['site']) && isset($_GET['action']) )
        {
            session_start();
            $userAdmin = new adminusers();
            $result = array('status'=>0,'exception'=>'','site'=>'');

            if($_GET['site']=='dashboard'){
                
                switch($_GET['action']){

                    case 'createAdminUser':
                        if($userAdmin->name($_POST['AdminUserName'])){
                            if($userAdmin->lastname($_POST['AdminUserLastName'])){
                                if($userAdmin->username($_POST['Username'])){
                                    if($userAdmin->email($_POST['AdminUserEmail'])){
                                        if($_POST['AdminUserPassword'] == $_POST['AdminUserRepeatPassword']){
                                            if($userAdmin->password($_POST['AdminUserPassword'])){
                                                if($userAdmin->create()){
                                                    $result['status']=1;
                                                }
                                                else{
                                                    $result['exception'] = 'Operación fallida';
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
                                        $_SESSION['idUsername']= $userAdmin->getId();
                                        $_SESSION['AdminUsername']=$userAdmin->getUsername();
                                        $result['status']=1;
                                        $result['site']='../../feed/account/home.php';
                                    }
                                    else{
                                        $result['exception']='Contraseña o usuario incorrecto';
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