$(document).ready(function () {
    readProfile();
});
var id;
const APIAdministrators='../../global/api/dashboard/profile.php?site=dashboard&action=';

function readProfile(){
    $.ajax({
        url:APIAdministrators+'readProfile',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status){
                id=result.dataset.id;
                $('#NameUser').text(result.dataset.name+' '+result.dataset.lastname);
                $('#Username').text(result.dataset.username);
                $('#UsernameEmail').text(result.dataset.email);
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
}

function EditbyId(){
    $.ajax({
        url:APIAdministrators+'readProfile',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status){
                id=result.dataset.id;
                $('#id_listEdit').val(result.dataset.id);
                $('#EditNameUser').val(result.dataset.name);
                $('#EditLastNameUser').val(result.dataset.lastname);
                $('#EditUsername').val(result.dataset.username);
                $('#EditEmailUser').val(result.dataset.email);
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
}
$('#FormEditAdminUser').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIAdministrators+'editProfile',
        type:'POST',
        data: new FormData($('#FormEditAdminUser')[0]),
        datatype: ' JSON',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status){
             
              $(location).attr('href','profile.php');
              location.reload(); 
              M.toast({html:'Su perfil ha sido actualizado satisfactoriamente'});
              readProfile();
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
function DeletebyId(){
    $.ajax({
        url:APIAdministrators+'deleteProfile',
        type:'POST',
        data:{
            id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result=JSON.parse(response);
            if(result.status){
                $(location).attr('href','index.php');
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
}