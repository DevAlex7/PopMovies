<?php 

    require_once('../helpers/instance.php');
    require_once('../helpers/validator.php');
    require_once('../models/memberships.php');

    if(isset($_GET['site']) && isset($_GET['action']) )
    {
        session_start();
        $memberships = new Memberships();
        $result = array('status'=>0, 'exception'=>'');
        if($_GET['site'] == 'dashboard')
        {
            switch($_GET['action']){

                //Get Memberships
                case 'GetMemberships':
                
                    if ($result['dataset'] = $memberships->ShowMemberships()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay customers disponibles';
                    }

                break;
                
                //Add Membership
                case 'addMembership':

                    if(!empty($memberships->membership = $_POST['NameMembership']))
                    {
                        
                        if(!empty($memberships->price = $_POST['priceMembership'])){

                            $memberships->SaveMembership();
                            $result['status']=1;

                        }
                        else
                        {
                            print 'precio vacio :v';
                        }
                    }
                    else
                    {
                        print 'Nombre vacio :v';
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
        exit('recurso denegado');
    }

?>