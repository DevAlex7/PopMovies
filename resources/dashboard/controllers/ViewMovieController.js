var getId;
$(document).ready(function () {
    getId = $('#MovieId').val();
    getMoviebyId();
    ActorTags();
});
const APIViewMovies = '../../global/api/dashboard/movies.php?site=dashboard&action=';
const APIactorsmovie ='../../global/api/dashboard/actorsmovie.php?site=dashboard&action=';

//Get all customers in ComboBox
function SelectCustomers(Select, value){
    $.ajax({
        url: APIViewMovies + 'getCustomers',
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
                    content += '<option value="" disabled selected>Seleccione Customer</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id != value) {
                        content += `<option value="${row.id}">${row.enterprise}</option>`;
                    } else {
                        content += `<option value="${row.id}" selected>${row.enterprise}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay customers</option>');
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
function getMoviebyId(){

    $.ajax({
        url:APIViewMovies+'getById',
        type:'POST',
        data:{
            getId
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                let content = '';
                //Get all description for the movie selected
                var ImageCover = "../../resources/dashboard/img/covers/"+result.dataset.cover;
                $('#ImageCover').attr("src", ImageCover);
                $('#TitleMovieEdit').val(result.dataset.name);
                $('#SipnosisEdit').val(result.dataset.sinopsis);
                $('#TimeMovieEdit').val(result.dataset.time);
                $('#ImageCoverEdit').val(result.dataset.cover);
                $('#YearMovieEdit').val(result.dataset.year);
                $('#PriceEdit').val(result.dataset.price);
                $('#CountMovieEdit').val(result.dataset.count);
                $('#VideoTrailer').html(result.dataset.trailer);
                content =  `<option value=${result.dataset.IdCustomer}>${result.dataset.EnterpriseCustomer}</option>'`
                SelectCustomers('EditCustomerMovie', result.dataset.IdCustomer);
                $('#EditCustomerMovie').html(content);
                $('#TrailerMovieEdit').val(result.dataset.trailer);
                $('select').formSelect();

            }
            else{
                //redirect if id is not in the URL
                $(location).attr('href','movies.php');
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
//Edit Movie
$('#EditFormMovie').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:APIViewMovies+'editMovie',
        type:'POST',
        data: new FormData($('#EditFormMovie')[0]),
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        if(isJSONString(response))
        {
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'¡Pelicula actualizada correctamente!'});
                getMoviebyId();
            }
            else{
                console.log(result.exception);
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

//Delete Selected Movie
function DeleteMoviebyId(){
    $.ajax({
        url:APIViewMovies+'deleteMovie',
        type:'POST',
        data:{
            getId
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                    $(location).attr('href','movies.php');
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

//Tags to Actors
function FillActorTags(rows){
    let content = '';
    if(rows.length>0){
        rows.forEach(function(row){
            content += `
            <div class="chip">
                <span>${row.actorname}</span>
            </div> 
            `;
        }); 
    }
    $('#ActorsTags').html(content)
}
//Call actors to tags
function ActorTags(){
    $.ajax({
        url:APIactorsmovie+'getActorsinMovie',
        type:'POST',
        data:{
            getId
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            console.log(response);
            if(!result.status){
                M.toast({html: 'No hay actores registrados'})
            }
            FillActorTags(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
