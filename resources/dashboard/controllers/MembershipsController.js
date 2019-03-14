$(document).ready(function(){
    $('.modal').modal();
    ShowAllMemberships();
});

//API Memberships
const APIMemberships = '../../global/api/memberships.php?site=dashboard&action=';

//Show All Memberships
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
                        <div class="card z-depth-3">
                            <div class="card-content">
                                <span class="card-title">Información</span>
                                <div class="divider"></div>
                                <span class="card-title"> <i class="material-icons blue-text" id="IconBookmark">bookmark</i>  ${row.membership}</span>    
                                <span class="card-title"> <i class="material-icons green-text" id="IconMoney">attach_money</i> Precio: ${row.price}</span>
                            </div>
                            <div class="card-action">
                            <a href="" onclick="ShowMembership(${row.id})" class="blue-text tooltipped modal-trigger" data-target="ShowMembership" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                            <a href="" onclick="ShowInformation(${row.id})" class="red-text tooltipped modal-trigger" data-target="DeleteMembership" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
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

//Add a Memberships
$('#form-create').submit(function(){
    event.preventDefault();
    $.ajax({
        url: APIMemberships + 'addMembership',
      type: 'POST',
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
             
              if (result.status) {
                  M.toast({html: 'Membresia Creada Correctamente!'})
                  ShowAllMemberships()
                }
                else{
                    M.toast({html: result.exception})    
                } 
          } else {
                M.toast({html: result.exception})
          }
      } else {
          console.log(response);
      }
  
    })
    .fail(function(jqXHR){
      console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

})

//Show Membership - Edit
function ShowMembership(id){
    console.log(id);
    $.ajax({
        url: APIMemberships + 'GetMembershipbyId',
        type: 'POST',
        data:{
            id: id
        },
        datatype: 'json',
    })
    .done(function(response){
        console.log(response);
        if (isJSONString(response)) {

            const result = JSON.parse(response);
            if (result.status) {
                console.log(result.dataset);
                $('#idUpdateMembership').val(result.dataset.id);  
                $('#NameUpdateMembership').val(result.dataset.membership);
                $('#UpdatePriceMembership').val(result.dataset.price);

            } else {
                console.log(result.exception);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

