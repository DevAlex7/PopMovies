$(document).ready(function () {
    CheckUsers();
});
const APIAdminusers='../../global/api/adminusers.php?site=dashboard&action='

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
    .fail(function(){

    });
}