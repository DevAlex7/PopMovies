$(document).ready(function () {
    $('.modal').modal();
    ShowMovies();
});
var idgender;
const APIMovies='../../global/api/home/main.php?site=ecommerce&action=';
function Open(){
    $('.sidenav').sidenav('open');
}

function setMoviesMain(rows, genders)
{
    
    let content='';
    if(rows.length>0){
        genders.map( item => {
            content+=`
                <div class="card black">
                    <div class="card-content">
                        <div class="center">
                         <span class="card-title white-text"><h5>${item.gender}</h5></span>   
                        </div>
                        <div class="row" id="gender-${item.id}"></div>
                    </div>
                </div>
            `;
        })
        $('#ContentCards').html(content);

        let contentMovies = ''
        genders.map( item => {
            rows.map ( itemRow => {
                item.gender == itemRow.gender && 
                (
                contentMovies += 
                `
                <div class="col s12 m4">      
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/dashboard/img/covers/${itemRow.cover}">
                        </div>
                        <div class="card-content">
                            <span class="card-title">${itemRow.name}</span>
                            <p class="truncate">${itemRow.sinopsis}</p>
                        </div>
                        <div class="card-action">
                            <a href="/PopMovies/feed/home/viewmovie.php?movie=${itemRow.id}&name=${itemRow.name}" class="btn">Ver</a>
                        </div>
                    </div>
                  </div>
                `
                )
            })
            $(`#gender-${item.id}`).append(contentMovies);
            contentMovies = ''
        })
    }

    
}
function ShowMovies(){
    $.ajax({
        url:APIMovies+'getGenders',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                setMoviesMain(result.dataset, result.setGender);
            }else{
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