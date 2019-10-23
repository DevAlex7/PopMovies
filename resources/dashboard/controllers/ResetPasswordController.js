$(document).ready(function () {
    selectMethod('methodsDiv',2);
});
const APIAdminusers='../../global/api/dashboard/adminusers.php?site=dashboard&action='
function verify(){
    var userRecover = $('#userRecover').val();
    $.ajax({
        url:APIAdminusers+'recover',
        type:'POST',
        data:{
            userRecover
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                let content = '';
                content=`
                    <p>Se te enviara un codigo de verificación para que puedas recuperar tu contraseña. </p>
                    <a class="btn" id="btnGmail" onClick="hola()">Lo he recibido</a>
                `;
                $('#methodsDiv').html(content);
            }
            else{
                M.toast({
                    html:result.exception
                })
            }
        }
        else{
            console.log(response);
        }
    })
}
const verifyCreated = () =>{
    var information = {
        username : $('#usernameRecover').val(),
        datecreated :  $('#createdDate').val()
    }

    $.ajax({
        url:APIAdminusers+'sendDateCreated',
        type:'POST',
        data:information,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                let content = '';
                content=`
                    <p>Verificaremos la solicitud para ver en nuestros registros los datos proporcionados, pendiente al correo :). </p>
                `;
                $('#methodsDiv').html(content);
            }
            else{
                M.toast({
                    html:result.exception
                })
            }
        }
        else{
            console.log(response);
        }
    })
}