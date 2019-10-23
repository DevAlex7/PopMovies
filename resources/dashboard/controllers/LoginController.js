var userTries = 0;
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

    var information = {
        Username : $('#Username').val(),
        Password : $('#Password').val(),
        tries : userTries
    }

    event.preventDefault();
    $.ajax({
        url:APIAdminusers+'login',
        type:'POST',
        data: information,
        dataype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const dataset = JSON.parse(response);
            if(dataset.status == 1){
                $(location).attr('href',dataset.site);
            }
            else if(dataset.status == 2){
                M.toast({html:dataset.exception})
            }
            else{
                M.toast({html:dataset.exception})
                parseInt(userTries++);
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(){
    });
});