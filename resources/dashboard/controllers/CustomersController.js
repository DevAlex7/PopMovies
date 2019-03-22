$(document).ready(function(){
    $('.tooltipped').tooltip();
    $('.modal').modal();
    
})
//API
const APIcustomers = '../../global/api/customers.php?site=dashboard&action=';
//Get all Providers
function FillCards(cards){
    let content = '';
    if(cards.length>0){

        cards.forEach(function(card){
            content =
            `
            
            `;
        })

    }
    
}

//Add Provider
$('#CreateProvider').submit(function(){

    $.ajax({
        url:APIcustomers+'',
        type:'POST'
    })
    .done(function(response){

    })
    .fail(function(jqXHR){

    })

})
