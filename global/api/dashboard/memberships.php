<?php 

    require_once('../../helpers/instance.php');
    require_once('../../helpers/validator.php');
    require_once('../../models/memberships.php');
    require_once('../../models/binnacle.php');

    if(isset($_GET['site']) && isset($_GET['action']) )
    {
        session_start();
        $membership = new Membership();
        $binnacle= new Binnacle();
        $result = array('status'=>0, 'exception'=>'');
        if($_GET['site'] == 'dashboard')
        {
            switch($_GET['action']){
            //Get Memberships
            case 'GetMemberships':
                if ($result['dataset'] = $membership->all()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay customers disponibles';
                }
            break;
            
            //Add Membership
            case 'addMembership':
                if(!empty($membership->membership = $_POST['NameMembership']))
                {
                    if(!empty($membership->price = $_POST['priceMembership'])){
                        //verify if memberships exists
                       if(! $membership->exist())
                       {
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
                        $result['exception']='Membresia existente';
                       }
                    }
                    else
                    {
                        $result['exception']='precio vacio';
                    }
                }
                else
                {
                    $result['exception']='Nombre vacio';
                }
            break;

            //Show Information by Id
            case 'GetMembershipbyId':
                if(empty($_POST['id']))
                {
                    $result['exception'] = 'Membresia incorrecta o identificador invalido';
                }
                else
                {
                    $membership->id = $_POST['id'];
                    if($result['dataset'] = $membership->find())
                    {
                        $result['status'] = 1;
                    }
                    else
                    {
                        $result['exception'] = 'Membresia inexistente';
                    }
                }
            break;

            //Update Membership
            case 'UpdateMembership':

                if(!empty($membership->membership = $_POST['NameUpdateMembership']))
                {
                    if(!empty($membership->price = $_POST['UpdatePriceMembership'])){
                        $membership->id = $_POST['idUpdateMembership'];
                        $membership->update();
                        $result['status']=1;
                    }
                    else
                    {
                        $result['exception']='precio vacio';
                    }
                }
                else
                {
                    $result['exception']='Nombre vacio';
                }
            break;

            case 'DeleteMembership':

            if(!empty($membership->id = $_POST['idDeleteMembership'])){
                $membership->id = $_POST['idDeleteMembership'];
                $membership->delete();
                $result['status']=1;
            }
            else
            {
                $result['exception']='identificador vacio';
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