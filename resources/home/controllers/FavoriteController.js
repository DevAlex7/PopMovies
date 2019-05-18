$(document).ready(function () {
    GetInformation();
    ListofFavorites();
    $('.dropdown-trigger').dropdown();
});

function Open(){
    $('.sidenav').sidenav('open');
}
const APIFavorites='../../global/api/home/favorites.php?site=ecommerce&action=';
function GetInformation(){
    $.ajax({
        url:APIFavorites+'getCount',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
               if(result.dataset.NumberMovies==1){
                $('#PTotalMovies').text(result.dataset.NumberMovies+' pelicula');
               }
               else{
                $('#PTotalMovies').text(result.dataset.NumberMovies+' peliculas');
               }
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
function Hola(){
    $('#ConfirmDelete').modal('open');
}
function setFavorites(favorites){
    let content='';
    if(favorites.length>0){
        favorites.forEach(function(favorite){
            content+=`
                <ul class="collection transparent" id="collection">
                    <div class="card z-depth-3">    
                        <li class="collection-item avatar">
                            <img src="../../resources/dashboard/img/covers/${favorite.cover}" id="PicMovie" class="circle">
                            <h6 id="titlemovie">${favorite.name}</h6>
                            <p>${favorite.sinopsis}</p>
                            <a href="/PopMovies/feed/home/viewmovie.php?movie=${favorite.IdMovie}" class="secondary-content">
                                <i  class="material-icons grey-text">call_made</i>
                            </a>
                            
                        </li>
                    </div>
                </ul>
            `;
        })
    }
    else{
        content=`
        <ul class="collection">
            <li class="collection-item avatar">
                <p>No hay peliculas favoritas :(</p>
            </li>
        </ul>`
    }
    $('#FavoritesPart').html(content);
}
function ListofFavorites(){
    $.ajax({
        url:APIFavorites+'getFavoritebyUser',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                setFavorites(result.dataset);
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error '+jqXHR.status+' '+jqXHR.statusText);
    });
}