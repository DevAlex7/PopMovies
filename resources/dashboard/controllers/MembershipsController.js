$(document).ready(function(){
    $('.modal').modal();
    ShowAllMemberships();
});

const APIMemberships = '../../global/api/memberships.php?site=dashboard&action=';

function ShowAllMemberships()
{
  $.ajax({
    url: APIMemberships+ 'GetMemberships',
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
                                <span class="card-title">${row.membership}</span>    
                                <p>Precio: ${row.price}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
        
            $('#Memberships').html(content);
        }
        else
        {
            console.log(result.exception);
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

$('#form-create').submit(function(){
    event.preventDefault();
    $.ajax({
        url: APIMemberships + 'addMembership',
      type: 'post',
      data: new FormData($('#form-create')[0]),
      datatype: 'json',
      cache: false,
      contentType: false,
      processData: false
    })
    .done(function(response){
        if (isJSONString(response)) {
          const result = JSON.parse(response);
          if (result.status) {
              $('#form-create')[0].reset();
             
              if (result.status == 1) {
                  M.toast({html: 'Membresia Creada Correctamente!'})
                  ShowAllMemberships()
                } 
          } else {
              alert(result.exception);
          }
      } else {
          console.log(response);
      }
  
    })
    .fail(function(jqXHR){
      console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

})

