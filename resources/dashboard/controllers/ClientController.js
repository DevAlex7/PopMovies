$(document).ready(function () {
    ShowClients();
});
const APIClients = '../../global/api/dashboard/clients.php?site=dashboard&action=';
function setClients(rows){
    let content='';
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`
            <tr>
                <td>${row.uname}</td>
                <td>${row.lastname}</td>
                <td>${row.email}</td>
                <td>${row.username}</td>
            <td>
               
            </td>
            </tr>
            `;
        })
    }
    $('#ListClients').html(content);
}
function ShowClients(){
    $.ajax({
        url:APIClients+'GetList',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast({html:result.exception});
            }
            setClients(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}