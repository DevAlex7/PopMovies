$(document).ready(function(){
    $(".modal").modal();
    showTableClasifications();
    ListClasifications('ClasificationsSelect',null);
    ListMovies('MoviesSelect',null);
    ShowClasificationsInMovies();
});
const APIClasifications = '../../global/api/dashboard/clasifications.php?site=dashboard&action=';
const APIClasificationsMovie = '../../global/api/dashboard/clasificationsmovie.php?site=dashboard&action=';

function ListMovies(Select, value){
    $.ajax({
        url:APIClasifications+'getMovies',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione Pelicula</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id != value) {
                        content += `<option value="${row.id}">${row.name}</option>`;
                    } else {
                        content += `<option value="${row.id}" selected>${row.name}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay actores en lista</option>');
            }
            $('select').formSelect();
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

function ListClasifications(Select, value){
    
    $.ajax({
        url:APIClasifications+'all',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione Clasificación</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id != value) {
                        content += `<option value="${row.id}">${row.clasification}</option>`;
                    } else {
                        content += `<option value="${row.id}" selected>${row.clasification}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay actores en lista</option>');
            }
            $('select').formSelect();
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

}

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
            console.log(result);
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
//Add clasification to Movie
$('#ListClasificationsinMovies').submit(function(){
    event.preventDefault();
    $.ajax({
        url: APIClasificationsMovie + 'CreateList',
            type: 'POST',
            data: $('#ListClasificationsinMovies').serialize(),
            datatype: 'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Clasificación agregada a la pelicula exitosamente!'});
                ShowClasificationsInMovies();
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
//Get List clasifications in Movies
function setClasificationsmoviesTable(rows){
    let content ='';
    if(rows.length>0){
        rows.forEach(function(row){
            content += `
            <tr>
                <td>${row.clasification}</td>
                <td>${row.name}</td>
                <td>
                    <a href="" onclick="ShowEditList(${row.id})" class="blue-text tooltipped modal-trigger" data-target="ModalEditClasificationInMovie"><i class="material-icons">mode_edit</i></a>
                    <a href="" onclick="ShowDeleteList(${row.id})" class="red-text tooltipped modal-trigger" data-target="ModalDeleteClasificationInMovie"><i class="material-icons">delete</i></a>
                </td>
            </tr>
            `;
        }); 
    }
    $('#readClasificationsInMovies').html(content);
}
function ShowClasificationsInMovies(){
    $.ajax({
        url:APIClasificationsMovie+'getList',
        type:'POST',
        data:null,
        dataype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast({html:result.exception});
            }
            setClasificationsmoviesTable(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
//Show in modal to edit
function ShowEditList(id_list){
    $.ajax({
        url:APIClasificationsMovie+'getListbyId',
        type:'POST',
        data:{
            id_list
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#Id_List').val(result.dataset.id);
                ListClasifications('EditSelectClasification',result.dataset.clasification);
                ListMovies('EditSelectMovie',result.dataset.movie);
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
//Edit row List
$('#FormEditClasificationInMovie').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIClasificationsMovie+'editRowClasification',
        type:'POST',
        data:new FormData($('#FormEditClasificationInMovie')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            console.log(1);
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Registro actualizado correctamente!'});
                ShowClasificationsInMovies();
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
function ShowDeleteList(id_list){
    $.ajax({
        url:APIClasificationsMovie+'getListbyId',
        type:'POST',
        data:{
            id_list
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#Notification').text("¿Deseas eliminar este registro?");
                $('#id_listDelete').val(result.dataset.id);
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
$('#FormDeleteClasificationInMovie').submit(function(){
    event.preventDefault();
    $.ajax({
        url: APIClasificationsMovie + 'destroy',
        type:'POST',
        data: new FormData($('#FormDeleteClasificationInMovie')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#ModalDeleteClasificationInMovie').modal('close');
                M.toast({html:'Se ha eliminado correctamente'});
                ShowClasificationsInMovies();
                
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