$(document).ready(function () {
    CheckUsers();
});
const APIAdminusers='../../global/api/dashboard/adminusers.php?site=dashboard&action='

function CheckUsers(){
    $.ajax({
        url:APIAdminusers + 'checkUsers',
        type:'POST',
        data:null,
        datatype:'JSON'        
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
            }
            else{
                $(location).attr('href',result.exception);
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

$('#LoginForm').submit(function(){

    event.preventDefault();
    $.ajax({
        url:APIAdminusers+'login',
        type:'POST',
        data:$('#LoginForm').serialize(),
        dataype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const dataset = JSON.parse(response);
            if(dataset.status){
                $(location).attr('href',dataset.site);
            }
            else{
                M.toast({html:dataset.exception})
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(){

    });

});