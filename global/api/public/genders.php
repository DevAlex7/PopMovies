<?php 

require_once('../../helpers/instance.php');
require_once('../../helpers/validator.php');
require_once('../../models/genders.php');

if(isset($_GET['site']) && isset($_GET['action'])){
    session_start();
    $gender= new Gender();
    $result = array('status'=>0, 'exception'=>'');
   if($_GET['site']=='commerce'){
        switch($_GET['action'])
        {
            case 'readGenders':
            if($result['dataset'] = $gender->all()){
                $result['status'] = 1;
            }
            else{
                $result['exception'] = 'No hay generos registrados';
            }
            break;
        }
   }
   else{
    exit('Acceso no disponible');
   }
   print(json_encode($result));
}
else{
exit('Recurso denegado');
}
?>