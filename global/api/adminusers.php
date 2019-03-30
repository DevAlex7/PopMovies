<?php 

        require_once('../helpers/validator.php');    
        require_once('../models/adminusers.php');
        require_once('../helpers/instance.php');

        if(isset($_GET['site']) && isset($_GET['action']) )
        {
            session_start();
            $userAdmin = new adminusers();
            $result = array('status'=>0,'exception'=>'');

            if($_GET['site']=='dashboard'){
                
                switch($_GET['action']){

                    case 'createAdminUser':
                        if($userAdmin->name($_POST['AdminUserName'])){
                            if($userAdmin->lastname($_POST['AdminUserLastName'])){
                                if($userAdmin->em){

                                }
                                else{

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