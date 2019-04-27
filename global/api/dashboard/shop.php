<?php 

    require_once('../models/shop.php');
    require_once('../helpers/instance.php');

    if(isset($_GET['site']) && isset($_GET['action']) )
    {
        session_start();
        $shop = new Shop();
        $result = array('status' => 0, 'exception' => '');

        if($_GET['site'] == 'dashboard')
        {
            switch ($_GET['action']){

                case 'GetShops':
                    if ($result['dataset'] = $shop->GetShops()) {
                        $result['status'] = 1;
                    } else {
                        $result['exception'] = 'No hay compras';
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