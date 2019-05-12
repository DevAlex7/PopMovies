$(document).ready(function(){
    $('.modal').modal();
    showTable();
    ListActors('ActorsSelect',null);
    ListMovies('MoviesSelect', null);
    ShowTableActorsinMovies();
});

const APIActors = '../../global/api/dashboard/actors.php?site=dashboard&action=';
const APIactorsmovie='../../global/api/dashboard/actorsmovie.php?site=dashboard&action=';
//Create Actor
$('#form-create').submit(async () =>{
    event.preventDefault();
    const response = await $.ajax({
      url: APIActors + 'createActor',
      type: 'post',
      data: new FormData($('#form-create')[0]),
      datatype: 'json',
      cache: false,
      contentType: false,
      processData: false
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
      });
      if (isJSONString(response)) {
        const result = JSON.parse(response);
        if (result.status) {
            $('#form-create')[0].reset();
            M.toast({html: 'Actor Creado Correctamente!'})
            showTable();
        } else {
            M.toast({html:result.exception});
        }
    } else {
        console.log(response);
    }
    
})

//Show all Actors
function fillTable(rows)
{
    let content = '';
    if(rows.length>0)
    {
        rows.forEach(function(row){
            content += `
                <tr>
                    <td>${row.name}</td>
                    <td>
                        <a href="" onclick="ShowInformation(${row.id})" class="orange-text tooltipped modal-trigger" data-target="updateActor" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                        <a href="" onclick="ShowInformationDelete(${row.id})" class="red-text tooltipped modal-trigger" data-target="deleteActor" data-tooltip="Elimar"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            `;
        });
    }
    $('#ActorsRead').html(content);
}

function showTable()
{
    $.ajax({
        url: APIActors + 'showActors',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (!result.status) {
                M.toast({html: 'No hay actores registrados'})
            } 
            fillTable(result.dataset);
            
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Show Actor
function ShowInformation(id)
{
    $.ajax({
    url: APIActors + 'showActor',
    type: 'post',
    data:{
        id: id
    },
    datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                $('#idUpdateActor').val(result.dataset.id);                
                $('#UpdateNameActor').val(result.dataset.name);
            } else {
                M.toast({html:result.exception});
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Update Actor
$('#ActorFormUpdate').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: APIActors + 'updateActor',
        type: 'POST',
        data: new FormData($('#ActorFormUpdate')[0]),
        datatype: ' JSON',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                    M.toast({html: 'Actor Actualizado Correctamente!'})
                    $('#ActorFormUpdate')[0].reset();
                    showTable();
            } else {
                console.log(result.exception);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

//Show Actor - Delete
function ShowInformationDelete(id)
{
    console.log(id);
        $.ajax({
        url: APIActors + 'showActor',
        type: 'post',
        data:{
            id: id
        },
        datatype: 'json',
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                $('#idDeleteNameActor').val(result.dataset.id);                
                $('#DeleteActor').html("¿Desea Eliminar al Actor: "+result.dataset.name+"?");
                $('#deleteActor').modal('open');
            } else {    
                console.log(result.exception);
            }
            showTable();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Delete Actor
$('#DeleteActorForm').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: APIActors + 'deleteActor',
        type: 'post',
        data: $('#DeleteActorForm').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                $('#deleteActor').modal('close');
                M.toast({html: 'Actor Eliminado Correctamente!'});
                showTable();
            } else {
                console.log(result.exception);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

//Fill Select with Actors
function ListActors(Select, value){
    $.ajax({
        url: APIActors + 'showActors',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione Actor</option>';
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
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
//Fill Select with Movies
function ListMovies(Select, value){
    $.ajax({
        url: APIActors + 'getMovies',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione pelicula</option>';
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
                $('#' + Select).html('<option value="">No hay peliculas en lista</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Create List 
$('#ListMoviesinActors').submit(function()
{
        event.preventDefault();
        $.ajax({
            url: APIactorsmovie + 'createList',
            type: 'POST',
            data: $('#ListMoviesinActors').serialize(),
            datatype: 'JSON'
        })
        .done(function(response){
            if (isJSONString(response)) {
                const result = JSON.parse(response);
                if (result.status) {
                    M.toast({html:'Se agrego correctamente'});
                    ShowTableActorsinMovies();
                } else {
                    M.toast({html:result.exception});
                }
            } else {
                console.log(response);
            }
        })
        .fail(function(jqXHR){
            console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
        });
})

//Table actors in movies 
function FillActorsInMovies(lines){
    let content = '';
    if(lines.length>0)
    {
        lines.forEach(function(line){
            content += `
                <tr>
                    <td>${line.Actorname}</td>
                    <td>${line.Moviename}</td>
                    <td>
                        <a href="" onclick="GetToEditActorinMovie(${line.id})" class="orange-text tooltipped modal-trigger" data-target="ModalEditActorsInMovies" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                        <a href="" onclick="GetToDeleteActorinMovie(${line.id})" class="red-text tooltipped modal-trigger" data-target="DeleteActorsInMovies" data-tooltip="Elimar"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            `;
        });
    }
    $('#ActorsInMovies').html(content);
}
//Show Table Actors in Movies
function ShowTableActorsinMovies(){
    $.ajax({
        url:APIactorsmovie+'getList',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if (!result.status) {
                M.toast({html: 'No hay lista de actores en peliculas'})
            } 
            FillActorsInMovies(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Fill Select Edit Actor to Movie
function SelectActorstoEdit(Select, value){
    $.ajax({
        url: APIActors + 'showActors',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione Actor</option>';
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
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
//Fill Select Edit Movie to List
function SelectMovietoEdit(Select, value){
    $.ajax({
        url: APIActors + 'getMovies',
        type: 'POST',
        data: null,
        datatype: 'JSON'
    })
    .done(function(response){
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            if (result.status) {
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione Actor</option>';
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
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}


//Show to Edit Actor in movie
function GetToEditActorinMovie(id_list){
    $.ajax({
        url:APIactorsmovie+'getListbyId',
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
                $('#id_list').val(result.dataset.id);
                SelectActorstoEdit('SelectEditActortoMovie', result.dataset.Actor);
                SelectMovietoEdit('SelectEditMovie', result.dataset.Movie);
                
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
}
//Edit actor to movie
$('#FormEditActortoMovie').submit(function()
{
    event.preventDefault();
    $.ajax({
        url:APIactorsmovie+'editList',
        type:'POST',
        data:new FormData($('#FormEditActortoMovie')[0]),
        datatype: ' JSON',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Registro actualizado exitosamente!'});
                ShowTableActorsinMovies();
                $('#ModalEditActorsInMovies').modal('close');
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

//Show to Delete Actor in movie
function GetToDeleteActorinMovie(id_list){
    $.ajax({
        url:APIactorsmovie+'getListbyId',
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
               $('#idDeleteActorMovie').val(result.dataset.id);
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
}
//Delete Actor in movie
$('#FormDeleteActorinMovie').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIactorsmovie+'deleteRow',
        type: 'POST',
        data: $('#FormDeleteActorinMovie').serialize(),
        datatype: 'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Eliminado exitosamente!'});
                ShowTableActorsinMovies();
                $('#DeleteActorsInMovies').modal('close');
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

$('#SearchField').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:APIActors+'search',
        type:'POST',
        data:$('#SearchField').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                fillTable(result.dataset);
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
function clearSearchField(){
    $('#searchActors').val('');
    showTable();
}





