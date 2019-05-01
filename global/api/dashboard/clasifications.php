<?php 

    require_once('../../helpers/validator.php');
    require_once('../../models/clasifications.php');
    require_once('../../models/movies.php');
    require_once('../../helpers/instance.php');
 
    
    if(isset($_GET['site']) && isset($_GET['action'])){
        session_start();
        $clasification = new Clasification();
        $movie = new Movies();
        $result = array('status'=>0, 'exception'=>'');
        if($_GET['site']=='dashboard'){
            
            switch($_GET['action']){
                
                //Create Clasification
                case 'createClasification':
                    if($clasification->nameClasification($_POST['NameClasification'])){
                        if($clasification->descriptionClasification($_POST['DescriptionClasification']))
                        {
                            $clasification->create();
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Campo vacio';
                        }
                        
                    }
                    else{
                        $result['exception']='Nombre incorrecto o campo vacio';
                    }
                break;
                case 'getMovies':
                    if($result['dataset']=$movie->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay peliculas en lista';
                    }
                break;
                //Show All Clasifications
                case 'all':
                    if($result['dataset']=$clasification->all()){
                        $result['status']=1;
                    }
                    else{
                        $result['exception']='No hay clasificaciones en lista';
                    }
                break;
                
                //Search clasifications
                case 'searchBy':
                    if($clasification->search($_POST['search'])){
                        if($result['dataset'] = $clasification->findall()){
                            $result['status']=1;
                        }else{
                            $result['exception']='Sin resultados';
                        }
                    }else{
                        $result['exception']='Campo vacio';
                    }
                break;

                //Find by ID
                case 'findbyId':
                    if($clasification->id($_POST['id'])){
                        if($result['dataset']=$clasification->findById()){
                            $result['status']=1;
                        }
                        else{
                            $result['exception']='Algo ha ocurrido mal';
                        }
                    }
                    else{
                        $result['exception']='Identificador no encontrado';
                    }
                break;
                
                //Edit Clasification
                case 'editClasification':
                    if($clasification->id($_POST['idEditClasification'])){
                        if($clasification->nameClasification($_POST['EditNameClasification'])){
                            if($clasification->descriptionClasification($_POST['EditDescriptionClasification'])){
                                $clasification->edit();
                                $result['status']=1;
                            }
                            else{
                                $result['exception']='Descripción vacia';
                            }
                        }
                        else{
                            $result['exception']='Nombre incorrecto o vacio';
                        }
                    }
                    else{
                        $result['exception']='Identificador incorrecto o vacio';
                    }
                break;
                //Delete clasifications
                case 'deleteClasification':
                    if($clasification->id($_POST['idDeleteClasification'])){
                        $clasification->destroy();
                        $result['status']=1;
                    }   
                    else{
                        $result['exception']='identificador incorrecto';
                    } 
                break;

                default:
                exit('accion no disponible');
            }
        }
        else{
            exit('acceso no disponible');
        }
        print(json_encode($result));
    }
    else{
        exit('recurso denegado');
    }
?>