$(document).ready(function () {

});
const APIBinnacle ='../../global/api/dashboard/binnacle.php?site=dashboard&action=';

//Admins list actions collection
function setActionstoCollectionforAdmins(rows,admin){

    let content ='';
   
    if(rows.length>0){
        let site='';
        rows.forEach(function(row){
            //Traduce english to Spanish
            switch(row.site){
                case 'actors':
                    site='actores';
                break;
                case 'clasifications':
                    site='clasificaciones';
                break;
                case 'customers':
                    site='proveedores';
                break;
                case 'genders':
                    site='generos';
                break;
                case 'memberships':
                    site='membresias';
                break;
                default:
                console.log("Fallo al declarar sitio");
            }
            content+=`<a href="/PopMovies/feed/account/${row.site}.php" class=" blue-text collection-item"><span data-badge-caption="${site}" class="new badge green"></span>${row.adminUser} ${row.actionperformed}</a>`;
        })        
    }
    else{
        content=`<a href="" class="collection-item"><span class="badge"></span>No hay acciones por Administradores</a>`;
    }
    
    $('#ListBinnacle').html(content);
}
//Clients list actions collections
function setActionstoCollectionforClients(rows){
    let content ='';
    
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`<a href="" class="collection-item"><span class="badge"></span>${row.ClientUser} ${row.actionperformed}</a>`;
        })        
    }
    else{
        content=`<a href="" class="collection-item"><span class="badge"></span>No hay acciones por Clientes</a>`;
    }
    
    $('#ListBinnacle').html(content);
}
//Get actions by Admin
function GetActionsforAdmins(){
    $.ajax({
        url:APIBinnacle+'getListActionsbyAdmins',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
            }
            setActionstoCollectionforAdmins(result.dataset);
        }
        
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
//Get Actions by Clients
function GetActionsforClients(){
    $.ajax({
        url:APIBinnacle+'getListActionsbyClients',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
            }
            setActionstoCollectionforClients(result.dataset);
        }
        
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function GetSite(site){
    console.log(site);
}