$(document).ready(function()
{
    CountCustomers();
    CountsShops();
    GetProductsMovies();
})

const APICustomers = '../../global/api/dashboard/customers.php?site=dashboard&action=';
const APIShops = '../../global/api/dashboard/shop.php?site=dashboard&action=';
const APIProducts = '../../global/api/dashboard/movies.php?site=dashboard&action=';
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
            if(result.status){
                var movie = [];
                var count =[];

                for(var i in result.dataset){

                    movie.push(result.dataset[i].name);
                    count.push(result.dataset[i].count);
                
                }
                var chartdata = {
                    labels: movie,
                    datasets : [
                      {
                        label: 'Peliculas',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: count
                      }
                    ]
                  };
            
                  var ctx = $("#myChart");
            
                  var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata
                  });
            }
            else{
            }
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
