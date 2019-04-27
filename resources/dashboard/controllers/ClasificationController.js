$(document).ready(function(){
    $(".modal").modal();
    showTableClasifications();
});
const APIClasifications = '../../global/api/dashboard/clasifications.php?site=dashboard&action=';

function FillTable(rows){
    let content = '';
    if(rows.length>0){
        rows.forEach(function(row){
            content += `
            <tr>
                <td>${row.clasification}</td>
                <td>${row.description}</td>
                <td>
                    <a href="" onclick="ShowInformation(${row.id})" class="blue-text tooltipped modal-trigger" data-target="ModalEditClasification"><i class="material-icons">mode_edit</i></a>
                    <a href="" onclick="ShowInformationDelete(${row.id})" class="red-text tooltipped modal-trigger" data-target="ModalDeleteClasification"><i class="material-icons">delete</i></a>
                </td>
            </tr>
            `;
        }); 
    }
    $('#ClasificationsList').html(content);
}

//Show list Clasifications
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
                M.toast({html:'No hay clasificaciones en lista!', classes:'toasterror'});
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

//Add Clasification
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
                M.toast({html:'Clasificacion agregada a la lista', classes:'toastsuccess',});
                $('#ClasificationAddForm')[0].reset();
                $("#ModalAddClasification").modal('close');
                showTableClasifications();
            }else{
                M.toast({html:result.exception, classes:'toasterror'});
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

//Clear Search Field
function ClearSearchField(){
    $('#search').val('');
    showTableClasifications();

}
//Search all Clasifications
$('#SearchFieldClasification').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:APIClasifications + 'searchBy',
        type:'POST',
        data:$('#SearchFieldClasification').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                console.log(result.dataset);
                FillTable(result.dataset);
            }
            else{
                M.toast({html:result.exception, classes:'toasterror'});
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

//Show to edit 
function ShowInformation(id){
    $.ajax({
        url: APIClasifications + 'findbyId',
        type:'POST',
        data:{
            id:id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#idEditClasification').val(result.dataset.id);
                $('#EditNameClasification').val(result.dataset.clasification);
                $('#EditDescriptionClasification').val(result.dataset.description);
            }
            else{
                M.toast({html:result.exception, classes:'toasterror'});
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
//Update Clasification
$("#ClasificationEditForm").submit(function(e){
    
    e.preventDefault();
    $.ajax({
        url: APIClasifications + 'editClasification',
        type:'POST',
        data: new FormData($('#ClasificationEditForm')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            M.toast({html:'Clasificación actualizada correctamente!', classes:'toastsuccess '});
            $('#ModalEditClasification').modal('close');
            $('#ClasificationEditForm')[0].reset();
            showTableClasifications();
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})


//Show to delete
function ShowInformationDelete(id){
    $.ajax({
        url:APIClasifications+'findbyId',
        type:'POST',
        data:{
            id:id
        },
        dataype:'JSON'
    })
    .done(function(response){
        const result = JSON.parse(response);
        if(result.status){
            $('#idDeleteClasification').val(result.dataset.id);
            $('#deleteClasificationSpan').text("¿Desea eliminar esta categoria seleccionada?");
            $('#showNameDeleteSpan').text(result.dataset.clasification);
        }
        else{
            M.toast({htlm:result.exception});
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Delete clasification
$('#ClasificationDeleteForm').submit(function(e){

    e.preventDefault();
    $.ajax({
        url:APIClasifications+'deleteClasification',
        type:'POST',
        data:new FormData($('#ClasificationDeleteForm')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status)
            {
                M.toast({html:'Clasificación eliminada correctamente', classes:'toastsuccess'});
                $('#ClasificationDeleteForm')[0].reset();
                $('#ModalDeleteClasification').modal('close');
                showTableClasifications();
            }
            else{
                M.toast({html:result.exception, classes:'toasterror'})
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
