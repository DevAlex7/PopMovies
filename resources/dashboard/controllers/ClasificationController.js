$(document).ready(function(){
    $(".modal").modal();
    showTableClasifications();
});
const APIClasifications = '../../global/api/clasifications.php?site=dashboard&action=';

function FillTable(rows){
    let content = '';
    if(rows.length>0){
        rows.forEach(function(row){
            content += `
            <tr>
                <td>${row.clasification}</td>
                <td>${row.description}</td>
                <td>
                    <a href="" onclick="ShowInformation(${row.id})" class="blue-text tooltipped modal-trigger" data-target="updateActor" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                    <a href="" onclick="ShowInformationDelete(${row.id})" class="red-text tooltipped modal-trigger" data-target="deleteActor" data-tooltip="Elimar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
            `;
        }); 
    }
    $('#ClasificationsList').html(content);
}

function showTableClasifications(){
    $.ajax({
        url: APIClasifications + 'all',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast({html:'No hay clasificaciones en lista!'});
            }
            FillTable(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

$('#ClasificationAddForm').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:APIClasifications+'createClasification',
        type:'POST',
        data: new FormData($('#ClasificationAddForm')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Clasificacion agregada a la lista'});
                $('#ClasificationAddForm')[0].reset();
                $("#ModalAddClasification").modal('close');
                showTableClasifications();
            }else{
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
});
function ClearSearchField(){
    $('#search').val('');
    showTableClasifications();

}
$('#SearchFieldClasification').submit(function(){
    alert("Hola");
})