$(document).ready(function () {
    ShowAdministrators();
});
const APIAdministrators='../../global/api/dashboard/adminusers.php?site=dashboard&action=';

function setAdministrators(rows){
    
    let content='';
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`
                <tr>
                    <td>${row.name}</td>
                    <td>${row.lastname}</td>
                    <td>${row.username}</td>
                    <td>${row.email}</td>
                    <td>
                        <a href="" onclick="ShowInformation(${row.id})" class="orange-text tooltipped modal-trigger" data-target="updateActor" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                        <a href="" onclick="ShowInformationDelete(${row.id})" class="red-text tooltipped modal-trigger" data-target="deleteActor" data-tooltip="Elimar"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            `;
        })
    }
    $('#ListAdministrators').html(content);
}   
function ShowAdministrators(){
    $.ajax({
        url:APIAdministrators+'all',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result= JSON.parse(response);
            if(!result.status){
                M.toast({html:result.exception});
            }
            setAdministrators(result.dataset);
            
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

}