var get;
$(document).ready(function () {
    get = $('#Text').text();
    getNamebyId();
});
const APIViewMovies = '../../global/api/movies.php?site=dashboard&action=';

function getNamebyId(){

    $.ajax({
        url:APIViewMovies+'getById',
        type:'POST',
        data:{
            get
        },
        datatype:'JSON'
    })
    .done(function(response){
        console.log(response);
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });

}


