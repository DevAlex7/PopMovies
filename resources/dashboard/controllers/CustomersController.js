$(document).ready(function(){
    $('.modal').modal();
})
//API
const APIcustomers = '../../global/api/customers.php?site=dashboard&action=';
//Get all Providers

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
