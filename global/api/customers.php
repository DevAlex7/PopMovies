<?php 

    require_once('../helpers/validator.php');    
    require_once('../models/customers.php');
    require_once('../helpers/instance.php');
    

    if(isset($_GET['site']) && isset($_GET['action']) )
    {
        session_start();
        $customers = new Customers();
        $result = array('status' => 0, 'exception' => '');

        if($_GET['site'] == 'dashboard')
        {
            switch ($_GET['action']){
            
            case 'GetCustomers':
                if ($result['dataset'] = $customers->all()) {
                    $result['status'] = 1;
                } else {
                    $result['exception'] = 'No hay Customers disponibles';
                }
            break;

            case 'Search':
                if($customers->search($_POST['search'])){
                    if ($result['dataset'] = $customers->findallbynamefields()) {
                        $result['status'] = 1;
                    }
                    else {
						$result['exception'] = 'No hay coincidencias';
					}
                }
                else{
                    $result['exception']='esta vacio';
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
        exit('Recurso denegado');
    }

?>