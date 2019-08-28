$(document).ready(function () {
recaptcha();    
});

const APIUsers = '../../global/api/dashboard/adminusers.php?site=dashboard&action=';
const recaptcha = () => {
    grecaptcha.ready(function() {
        grecaptcha.execute('6LcSs7QUAAAAAPrJs_FR0v9KAsUJkxBWv0_P9C98', {action: 'homepage'}).then(function(token) {
            $('#tokken').val(token);            
        });
    });
}
$('#CreateUserForm').submit(function(e){

    e.preventDefault();

    $.ajax({
        url:APIUsers+'createAdminUser',
        type:'POST',
        data:new FormData($('#CreateUserForm')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response))
        {
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Usuario agregado correctamente'});
                $(location).attr('href','../../feed/account/');
            }
            else{
                M.toast({html:result.exception})
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
