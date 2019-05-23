<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/memberships.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site']) && isset($_GET['action']) )
    {
        session_start();
        $membership = new Membership();
        $binnacle = new Binnacle();
        $message='';
        $result = array('status'=>0,'exception'=>'');
        if($_GET['site']=='dashboard'){
            switch($_GET['action']){
                //List of Memberships
                case 'GetMemberships':
                    if($result['dataset']=$membership->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay membresias registradas';
                    }
                break;
                case 'addMembership':
                    if($membership->namemembership($_POST['NameMembership'])){
                        if($membership->price($_POST['priceMembership'])){
                            if($binnacle->site('memberships')){
                                $message="agregado una nueva membresia: ".' '.$membership->getMembership();
                                $binnacle->actionperformed($message);
                                $binnacle->admin_id($_SESSION['idUsername']);
                                $binnacle->create();
                                $membership->create();
                                $result['status'] = 1;
                            }
                            else{
                                $result['exception']='Ha ocurrido un problema, contacte al administrador';
                            }
                        }
                        else{
                            $result['exception']='Mal formato de precio o campo vacio';
                        }
                    }
                    else{
                        $result['exception']='Nombre incorrecto o campo vacio';
                    }
                break;
                case 'GetMembershipbyId':
                    if($membership->id($_POST['id'])){
                        if($result['dataset']=$membership->find()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='No hay información recopilada';
                        }
                    }
                    else{
                        $result['exception']='Selección invalida';
                    }
                break;
                case 'UpdateMembership':
                    if($membership->id($_POST['idUpdateMembership'])){
                        if($membership->namemembership($_POST['NameUpdateMembership'])){
                            if($membership->price($_POST['UpdatePriceMembership'])){
                                if($binnacle->site('memberships')){
                                   $get=$membership->getbyId();
                                   if( $get['membership']!=$membership->getMembership() && $get['price']!=$membership->getPrice() )
                                   {
                                    $message="modificado toda la membresia de: ".$get['membership'].' a '.$membership->getMembership();
                                   }
                                   else
                                    {
                                        if($get['membership']!=$membership->getMembership()){
                                            $message="modificado la membresia de: ".$get['membership'].' a '.$membership->getMembership();
                                        }
                                        else{
                                            if($get['price']!=$membership->getPrice()){
                                                $message="modificado el precio de la membresia:".' '.$get['membership'].' de '.$get['price'].' a '.$membership->getPrice();
                                            }
                                        }
                                    }
                                    $binnacle->actionperformed($message);
                                    $binnacle->admin_id($_SESSION['idUsername']);
                                    $binnacle->create();
                                    $membership->update();
                                    $result['status'] = 1;
                                }
                                else{
                                    $result['exception']='Ha ocurrido un problema, contacte al administrador';
                                }
                            }
                            else{
                                $result['exception']='Mal formato de precio o campo vacio';
                            }
                        }
                        else{
                            $result['exception']='Nombre incorrecto o campo vacio';
                        }
                    }
                    else{
                        $result['exception']='No hay información para realizar la operación';
                    }
                break;
                case 'DeleteMembership':
                if($membership->id($_POST['idDeleteMembership'])){
                    if($binnacle->site('memberships')){
                        $get=$membership->getbyId();
                        $message="eliminado la membresia: ".$get['membership'];
                        $binnacle->actionperformed($message);
                        $binnacle->admin_id($_SESSION['idUsername']);
                        $binnacle->create();
                        $membership->delete();
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='Ha ocurrido un problema, contacte al administrador';
                    }
                }
                else{
                    $result['exception']='No se ha podido recopilar información';
                }
                break;
                default:
                exit('acción no disponible');
                break;
            }
        }
        else{
            exit('recurso denegado');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }
?>