$(document).ready(function () {
    
});
const APIClients='../../global/api/home/users.php?site=ecommerce&action=';
$('#LoginForm').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIClients+'login',
        type:'POST',
        data:new FormData($('#LoginForm')[0]),
        datatype:'JSON',
        cache:false,
        processData:false,
        contentType:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result= JSON.parse(response);
            if(result.status){
                $(location).attr('href',result.site);
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