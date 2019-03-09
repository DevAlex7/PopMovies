$(document).ready(function()
{
    ViewCustomers();
})

const apiCatalogo = '../../global/api/customers.php?site=dashboard&action=';

function ViewCustomers(){
    $.ajax({
        url: apiCatalogo + 'GetCustomers',
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
                $('#CustomerTitle').text('Customers');
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