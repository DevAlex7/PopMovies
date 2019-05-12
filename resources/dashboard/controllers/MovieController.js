var id;
var chips;
$(document).ready(function()
{
   
    /*SelectActors('ActorMovie', null);
    SelectGenders('GendersCombo', null);
    SelectClasifications('ComboClasifications', null);*/
    SelectCustomers('ComboCustomers', null);
    ShowMovieCards();
    
})
const APIMovies = '../../global/api/dashboard/movies.php?site=dashboard&action=';
const APIGendersMovie ='../../global/api/dashboard/gendersmovie.php?site=dashboard&action=';
var content ='';
//ComboBox Genders
function SelectGenders(Select, value){
    $.ajax({
        url: APIMovies + 'getGenders',
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
                    content += '<option value="" disabled selected>Seleccione genero</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.id != value) {
                        content += `<option value="${row.id}">${row.gender}</option>`;
                    } else {
                        content += `<option value="${row.id}" selected>${row.gender}</option>`;
                    }
                });
                $('#' + Select).html(content);
            } else {
                $('#' + Select).html('<option value="">No hay opciones</option>');
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
//ComboBox Actors
function SelectActors(Select, value)
{
    $.ajax({
        url: APIMovies + 'getActors',
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
                    content += '<option value="" disabled selected>Seleccione actor</option>';
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
                $('#' + Select).html('<option value="">No hay opciones</option>');
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
//ComboBox Clasifications
function SelectClasifications(Select, value){
    $.ajax({
        url: APIMovies + 'getClasifications',
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
                    content += '<option value="" disabled selected>Seleccione clasificación</option>';
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
                $('#' + Select).html('<option value="">No hay opciones</option>');
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
//Get all customers in ComboBox
function SelectCustomers(Select, value){
    $.ajax({
        url: APIMovies + 'getCustomers',
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

//Body Card Movie
function FillCardMovie(rows){
    content ='';
    if(rows.length>0){
        rows.forEach(function(row){
        id=row.id;
        content += `
        <div class="col s12 m4">
            <div class="card">
                <div class="card-image">
                    <img src="../../resources/dashboard/img/covers/${row.cover}">
                </div>
                <div class="card-content">
                <span class="card-title">${row.name}</span>
                    <p class="truncate">${row.sinopsis}</p>
                </div>
                <div class="card-action">
                    <a class="btn blue" href="/PopMovies/feed/account/viewmovie.php?category=movies&movie=${row.id}" onClick=SetID(${row.id})>Ver detalles</a>
                </div>
            </div>
        </div>
        `;
        })
       
    }
    $('#AllMovies').html(content);
}
function ShowMovieCards(){
    $.ajax({
        url:APIMovies+'getMovies',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast({html:'No hay generos en lista!', classes:'toasterror'});
            }
            FillCardMovie(result.dataset);
        }  
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

//Create Movie
$('#FormMovieCreate').submit(function (e) { 
    e.preventDefault();
    $.ajax({
        url:APIMovies+'saveMovie',
        type:'POST',
        data: new FormData($('#FormMovieCreate')[0]),
        datatype:'JSON',
        cache:false,
        contentType:false,
        processData:false
    })
    .done(function(response){
        
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Pelicula agregada correctamente', classes:'toastsuccess'});
                ShowMovieCards();
                $('#ModalAddMovie').modal('close');
            }
            else{
                M.toast({html:result.exception})
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