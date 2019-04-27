$(document).ready(function(){
    $('.modal').modal();
    ShowAllMemberships();
});

//API Memberships
const APIMemberships = '../../global/api/dashboard/memberships.php?site=dashboard&action=';

function FillCards(cards){
    let content ='';
    if(cards.length>0){

        cards.forEach(function(card){
            content += `
            <div class="col s12 m4">
                <div class="card z-depth-3">
                    <div class="card-content">
                        <span class="card-title"> <i class="material-icons blue-text" id="IconBookmark">bookmark</i>  ${card.membership}</span>    
                        <span class="card-title"> <i class="material-icons green-text" id="IconMoney">attach_money</i> Precio: ${card.price}</span>
                    </div>
                    <div class="card-action">
                    <a href="" onclick="ShowMembership(${card.id})" class="blue-text tooltipped modal-trigger" data-target="ShowMembership" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="" onclick="ShowMembershipDelete(${card.id})" class="red-text tooltipped modal-trigger" data-target="ShowMembershipDelete" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                    </div>
                </div>
            </div>
        `;
        })
    }
    $('#Memberships').html(content);
}
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

        if(!result.status){
            M.toast({html: 'No hay membresias registradas'})
        }
        FillCards(result.dataset);
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
$('#form-createMembership').submit(function(){
    event.preventDefault();
    $.ajax({
      url: APIMemberships + 'addMembership',
      type: 'POST',
      data: new FormData($('#form-createMembership')[0]),
      datatype: 'json',
      cache: false,
      contentType: false,
      processData: false
    })
    .done(function(response){
        if (isJSONString(response)) {
          const result = JSON.parse(response);
          if (result.status) {
              $('#form-createMembership')[0].reset();
              if (result.status) {
                  M.toast({html: 'Membresia Creada Correctamente!'})
                  $('#addMembership').modal('close');  
                }
                else{
                    M.toast({html: result.exception})    
                }
                ShowAllMemberships();

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

//Update Membership
$('#UpdateMembership').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: APIMemberships + 'UpdateMembership',
        type: 'POST',
        data: new FormData($('#UpdateMembership')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(response);
            if(result.status){
                M.toast({html: 'Membresia Actualizada Correctamente'})
                $('#ShowMembership').modal('close');
            }
            else
            {
                console.log(result.exception);
            }
            ShowAllMemberships();
        }
        else
        {

        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

//Show Membership - Delete
function ShowMembershipDelete(id){
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
                $('#idDeleteMembership').val(result.dataset.id);  
                $('#DeleteNameMembership').text("Nombre membresia: "+result.dataset.membership);

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

//Delete Membership
$('#DeleteMembership').submit(function(){
    event.preventDefault();
    $.ajax({
        url: APIMemberships + 'DeleteMembership',
        type:'POST',
        data: $('#DeleteMembership').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status)
            {
                $('#ShowMembershipDelete').modal('close');
                M.toast({html:'Membresia Eliminada Correctamente'})
            }
            else
            {
                console.log(result.exception);
            }
            ShowAllMemberships();
        }
        else
        {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    })
})

