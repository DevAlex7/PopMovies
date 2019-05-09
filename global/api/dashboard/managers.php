<?php 

    require_once('../../helpers/validator.php');    
    require_once('../../models/adminusers.php');
    require_once('../../helpers/instance.php');
    require_once('../../models/binnacle.php');
    if(isset($_GET['site']) && isset($_GET['action']) )
    {
        session_start();
        $userAdmin = new adminusers();
        $binnacle= new Binnacle();
        $result = array('status'=>0,'exception'=>'','site'=>'');

        if($_GET['site']=='dashboard'){
            
            switch($_GET['action']){

                case 'createAdminUser':
                    if($userAdmin->name($_POST['NameUser'])){
                        if($userAdmin->lastname($_POST['LastNameUser'])){
                            if($userAdmin->username($_POST['Username'])){
                                if($userAdmin->email($_POST['EmailUser'])){
                                    if($_POST['UserPassword'] == $_POST['UserPassword2']){
                                        if($userAdmin->password($_POST['UserPassword'])){
                                            if($binnacle->site('managers')){
                                                if($userAdmin->create()){
                                                    $message="agregado un nuevo administrador:".' '.$userAdmin->getUsername();
                                                    $binnacle->actionperformed($message);
                                                    $binnacle->admin_id($_SESSION['idUsername']);
                                                    $binnacle->create();
                                                    $result['status']=1;
                                                }
                                                else{
                                                    $result['exception'] = 'Operación fallida';
                                                }
                                            }
                                            else{
                                                $result['exception']='Ha ocurrido, contacte con el administrador';
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
                case 'all':
                    if($result['dataset']=$userAdmin->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay administradores además de usted :)';
                    }
                break;
                case 'getbyId':
                  if($userAdmin->id($_POST['id'])){
                    if($result['dataset']=$userAdmin->allbyId()){
                        $result['status']=1;
                    }
                    else{   
                        $result['exception']='No hay información del seleccionado';
                    }
                  }
                  else{
                    $result['exception']='No se ha encontrado valor';
                  }
                break;
                case 'editManager':
                if($userAdmin->name($_POST['EditNameUser'])){
                    if($userAdmin->lastname($_POST['EditLastNameUser'])){
                        if($userAdmin->username($_POST['EditUsername'])){
                            if($userAdmin->email($_POST['EditEmailUser'])){
                               if($userAdmin->id($_POST['id_listEdit'])){
                                if($userAdmin->edit()){
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
                case 'deleteManager':
                    if($userAdmin->id($_POST['id_listDelete']))
                    {
                        $userAdmin->destroy();
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No se ha encontrado un valor';
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