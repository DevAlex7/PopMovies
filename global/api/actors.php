<?php 

    require_once('../helpers/instance.php');
    require_once('../helpers/validator.php');
    require_once('../models/actors.php');

    if(isset($_GET['site']) && isset($_GET['action']))
    {
        session_start();
        $actors = new Actor();
        $result = array('status' => 0, 'exception' =>'');
        if($_GET['site']=='dashboard')
        {
            switch($_GET['action'])
            {
                
                //Create Actor
                case 'createActor':

                   if(empty($actors->name = $_POST['NameActor'])){
                        $result['exception'] = 'Nombre incorrecto';
                   }
                   else
                   {
                        $actors->SaveActor();
                        $result['status']=1;
                   }
                break;
                
                //Table
                case 'showActors':
                
                    if ($result['dataset'] = $actors->GetActors()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay Actores registradas';
                    }
                break;
                
                //Show Information Actor in Modal
                case 'showActor':
                    
                    if(empty($_POST['id']))
                    {$result['exception'] = 'Actor incorrecto';
                       
                    }
                    else
                    {
                        $actors->id = $_POST['id'];
                        if($result['dataset'] = $actors->ShowInformation())
                        {
                            $result['status'] = 1;
                        }
                        else
                        {
                            $result['exception'] = 'Actor inexistente';
                        }
                    }
                break;

                //Update Actor
                case 'updateActor':

                    if(empty($_POST['idUpdateActor'])||empty($_POST['UpdateNameActor']))
                    {
                        print 'Campos Vacios';
                    }
                    else
                    {
                        $actors->id = $_POST['idUpdateActor'];
                        $actors->name = $_POST['UpdateNameActor'];
                        $actors->UpdateActor();
                        $result['status']=1;

                    }
                    break;
                     //Update Actor
                case 'deleteActor':

                if( empty($_POST['idDeleteNameActor']) )
                {
                    print 'Codigo incorrecto';
                }
                else
                {
                    $actors->id = $_POST['idDeleteNameActor'];
                    $actors->DeleteActor();
                    $result['status']=1;

                }
                break;
                default:
                    exit('accion no disponible');
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
        exit('recurso denegado');
    }



?>