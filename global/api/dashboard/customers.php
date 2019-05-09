<?php 

    require_once('../../helpers/validator.php');    
    require_once('../../models/customers.php');
    require_once('../../helpers/instance.php');
    require_once('../../models/binnacle.php');
    

    if(isset($_GET['site']) && isset($_GET['action']) )
    {
        session_start();
        $customers = new Customers();
        $binnacle = new Binnacle();
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
                    if ($result['dataset'] = $customers->findall()) {
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

            case 'createCustomer':
                if($customers->name($_POST['NameProvider'])){
                    if($customers->email($_POST['EmailProvider'])){
                        if($customers->enterprise($_POST['EnterpriseProvider'])){
                            $message = "ha registrado a un nuevo proveedor".''.$customers->getEnterprise();
                            $binnacle->actionperformed($message);
                            $binnacle->admin_id($_SESSION['idUsername']);
                            if($binnacle->site('customers')){
                                $binnacle->create();
                                $customers->create();
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='Ha habido un error contacte al administrador';
                            }
                        }
                        else{
                            $result['exception']='Campo vacio de empresa';
                        }
                    }
                    else
                    {
                        $result['exception']='Correo incorrecto o campo vacio';
                    }
                }
                else{
                    $result['exception']='Nombre incorrecto o campo vacio';
                }
            break;  
            case 'showCustomer':

            if($customers->id($_POST['id'])){
                if($result['dataset'] = $customers->find()){
                    
                    $result['status']=1;
                }
                else{
                    $result['exception'] = 'identificador incorrecto';
                }
            }
            else{
                $result['exception'] = 'Esta vacio we :v';
            }
                
            break;
            case 'updateCustomer':
                if($customers->id($_POST['EditidProvider'])){
                    if($customers->name($_POST['EditNameProvider'])){
                        if($customers->email($_POST['EditEmailProvider'])){
                            if($customers->enterprise($_POST['EditEnterpriseProvider'])){
                                $customers->update();
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='Empresa incorrecta o campo vacio';
                            }
                        }
                        else{
                            $result['exception']='Formato erroneo de email o campo vacio';
                        }
                    }
                    else{
                        $result['exception']='Nombre incorrecto o campo vacio';    
                    }
                }
                else{
                    $result['exception']='identificador incorrecto';
                }
            break;
            case 'deleteCustomer':
                if($customers->id($_POST['DeleteCustomerinput'])){
                    
                    $customers->delete();
                    $result['status']=1;
                }
                else{
                    $result['exception']='Error al eliminar';
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