var getId;
$(document).ready(function () {
    getId = $('#MovieId').val();
    getMoviebyId();
});
const APIViewMovies = '../../global/api/movies.php?site=dashboard&action=';

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
                $('#PriceEdit').val(result.dataset.price);
                $('#CountMovieEdit').val(result.dataset.count);
                $('#VideoTrailer').html(result.dataset.trailer);
                content =  `<option value=${result.dataset.IdCustomer}>${result.dataset.EnterpriseCustomer}</option>'`
                SelectCustomers('EditCustomerMovie', result.dataset.IdCustomer);
                $('#EditCustomerMovie').html(content);
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
                console.log("Si llego");
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

