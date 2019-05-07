$(document).ready(function () {
    GetActions();
});
const APIBinnacle ='../../global/api/dashboard/binnacle.php?site=dashboard&action=';

function setActionstoCollection(rows){
    let content ='';
    
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`<a href="#!" class="collection-item">${row.actionperformed}</a> `;
        })        
    }
    
    $('#ListBinnacle').html(content);
}

function GetActions(){
    $.ajax({
        url:APIBinnacle+'getListActions',
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
            setActionstoCollection(result.dataset);
        }
        
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}