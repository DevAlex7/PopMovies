$(document).ready(function () {
    recaptcha();
});
const APIClients='../../global/api/home/users.php?site=ecommerce&action=';
function Open(){
    $('.sidenav').sidenav('open');
}
$('#FormClientRegistrer').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIClients+'Signup',
        type:'POST',
        data:new FormData($('#FormClientRegistrer')[0]),
        datatype:'JSON',
        cache:false,
        processData:false,
        contentType:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Perfil creado correctamente'});
            }
            else{
                M.toast({html:result.exception});
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})
const recaptcha = () => {
    grecaptcha.ready(function() {
        grecaptcha.execute('', {action: 'homepage'}).then(function(token) {
            $('#token').val(token);            
        });
    });
}