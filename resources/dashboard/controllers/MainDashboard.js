$(document).ready(function()
{
    //ViewCustomers();
    CountCustomers();
    CountsShops();
    GetProductsMovies();
})

const APICustomers = '../../global/api/customers.php?site=dashboard&action=';
const APIShops = '../../global/api/shop.php?site=dashboard&action=';
const APIProducts = '../../global/api/movies.php?site=dashboard&action=';
//Mostrar los Customers en Dashboard
function ViewCustomers(){
    $.ajax({
        url: APICustomers+ 'GetCustomers',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function (response){
        
        if(isJSONString(response))
        {
            const result = JSON.parse(response);

            if(result.status){
                let content = '';

                result.dataset.forEach(function(row){
                    content += `

                        <div class="col s12 m4">
                            <div class="card">
                                <div class="card-content">
                                    <span class="card-title">${row.name}</span>    
                                    <p>Contacto: ${row.email}</p>
                                    <p>Empresa: ${row.enterprise}</p>
                                </div>
                            </div>
                        </div>
                    
                    `;
                });
            
                $('#Customers').html(content);
            }
            else
            {
                $('#CustomerTitle').html(result.exception);
            }
        }   
        else{
            console.log(response);
        } 
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

function CountCustomers(){
    $.ajax({
        url: APICustomers + 'GetCountCustomers',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function (response){
       if(isJSONString(response)){
           const result = JSON.parse(response);
           if(result.status){
               console.log(result.dataset['COUNT(*)']);
               let content = '';
               content = `Customers afiliados : ${result.dataset['COUNT(*)']}`
               $('#Customers').text(content);
            }
            else
            {
                console.log(response);
            }
       }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function CountsShops(){
    $.ajax({
        url: APIShops + 'GetShops',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function (response){
       if(isJSONString(response)){
           const result = JSON.parse(response);
           if(result.status){
               console.log(result.dataset['COUNT(*)']);
               let content = '';
               content = `Ventas realizadas : ${result.dataset['COUNT(*)']}`
               $('#Shop').text(content);
            }
            else
            {
                console.log(response);
            }
       }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function GetProductsMovies()
{
    $.ajax({
        url: APIProducts + 'GetMovies',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(result.dataset['COUNT(*)']);
            let content = '';
            content = `Productos disponibles: ${result.dataset['COUNT(*)']}`
            $('#Products').text(content);
        }
        else
        {
            
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
