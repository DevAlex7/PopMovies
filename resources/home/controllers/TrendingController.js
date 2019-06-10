$(document).ready(function () {
    CallTrendings();
});
const APITrenging='../../global/api/home/trending.php?site=ecommerce&action=';
function Open(){
    $('.sidenav').sidenav('open');
}
function setTrending(rows){
    let content='';
    if(rows.length>0){
        rows.forEach(function(card){
            content+=`
            <div class="col s12 m4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="../../resources/dashboard/img/covers/${card.cover}" ">
                    </div>
                    <div class="card-content">
                    <span class="card-title activator grey-text text-darken-4">${card.name}<i class="material-icons right">more_vert</i></span>
                        <p><a  href="/PopMovies/feed/home/viewmovie.php?movie=${card.id}" id="trending">Ir a pelicula</a> |  <span> ${card.trendingTotal} Me gusta </span> </p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">${card.sinopsis}<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            </div> 
            `;
        });
    }
    $('#MovieTrendings').html(content);
}
function CallTrendings(){
    $.ajax({
        url:APITrenging+'getTrendings',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if( isJSONString(response) ){
            
            const result = JSON.parse(response);
            if(!result.status){
                M.toast({html:result.exception});
            }
            console.log(response);
            setTrending(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
