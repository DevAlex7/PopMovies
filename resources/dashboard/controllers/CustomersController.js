$(document).ready(function () {
    ShowCustomers();
    $(".dropdown-trigger").dropdown();
    $('.tooltipped').tooltip();
    $(".modal").modal();
});

const APICustomers = '../../global/api/customers.php?site=dashboard&action=';

function FillCardsCustomers(cards){

    let content = '';
    if(cards.length>0){

        cards.forEach(function(card){
            content += `
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-content black-text">
                    <span class="card-title">${card.name}</span>
                    <p>${card.email}</p>
                    <p>${card.enterprise}</p>
                    </div>
                    <div class="card-action" id="Actions">
                    <a href="#EditCustomerModal" class="modal-trigger" onClick="ViewCustomer(${card.id})"> <i class="material-icons" id="InfoIcon">info</i> </a>
                    <a href="#ModalDeleteCustomer" class="modal-trigger" onClick="DeleteCustomer(${card.id})"> <i class="material-icons" id="DeleteIcon">delete</i> </a>
                    </div>
                </div>
            </div>
        `;
        })
    }
    $('#CustomersList').html(content);
}

function ShowCustomers(){
    $.ajax({
        url: APICustomers+ 'GetCustomers',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function (response){
        
        if(isJSONString(response))
        {
            const result = JSON.parse(response);
    
            if(!result.status){
                M.toast({html: 'No hay Customers registrados'})
            }
            FillCardsCustomers(result.dataset);
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

$("#SearchField").submit(function (e) { 
    e.preventDefault();

    $.ajax({
        url: APICustomers + 'Search',
        type: 'POST',
        data: $('#SearchField').serialize(),
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                FillCardsCustomers(result.dataset);
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

});

//Clear SearchBar
function ClearSearchBar(){
    ShowCustomers();
    $("#search").val('');
}
//Create Customer
$("#AddCustomerForm").submit(function(e){

    e.preventDefault();

    $.ajax({
        url:APICustomers+'createCustomer',
        type:'POST',
        data: new FormData($('#AddCustomerForm')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#AddCustomerForm')[0].reset();
                M.toast({html:'Proveedor agregado satisfactoriamente'});
                $("#ModalCreateCustomer").modal('close');
                ShowCustomers();
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            M.toast({html:response});
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
});

//Show information -Edit Customer
function ViewCustomer(id){
    
    $.ajax({
        url:APICustomers + 'showCustomer',
        type:'POST',
        data:{
            id:id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#EditidProvider').val(result.dataset.id);
                $('#EditNameProvider').val(result.dataset.name);
                $('#EditEmailProvider').val(result.dataset.email);
                $('#EditEnterpriseProvider').val(result.dataset.enterprise);
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    })
}

//Edit Customer 
$('#EditCustomer').submit(function(){
    
    event.preventDefault();
    $.ajax({
        url: APICustomers + 'updateCustomer ',
        type:'POST',
        data: new FormData($('#EditCustomer')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Customer actualizado correctamente'});
                $('#EditCustomerModal').modal('close');
                ShowCustomers();
            } 
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

})
//Show information -Delete
function DeleteCustomer(id){
    $.ajax({
        url:APICustomers + 'showCustomer',
        type:'POST',
        data:{
            id:id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
               $('#DeleteCustomerinput').val(result.dataset.id);
            }
            else{
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    })
}

//Delete Customer
$('#DeleteCustomerForm').submit(function(){
    console.log("Hola");
    event.preventDefault();
    $.ajax({
        url:APICustomers+'deleteCustomer',
        type:'POST',
        data:$('#DeleteCustomerForm').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            console.log(response);
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Customer eliminado correctamente'});
                $("#ModalDeleteCustomer").modal('close');
                ShowCustomers();
            }   
            else{
                M.toast({html:result.exception});
            }
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


