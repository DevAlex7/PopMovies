$(document).ready(function () {
    ShowCustomers();
    $(".dropdown-trigger").dropdown();
    $('.tooltipped').tooltip();
});

const APICustomers = '../../global/api/customers.php?site=dashboard&action=';;


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
                    <div class="card-action yellow">
                    <a href="#"> <i class="material-icons black-text">info</i> </a>
                    <a href="#"> <i class="material-icons red-text">delete</i> </a>
                    <a href="#"> <i class="material-icons black-text">message</i> </a>
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
function ClearSearchBar(){
    ShowCustomers();
    $("#search").val('');
}
