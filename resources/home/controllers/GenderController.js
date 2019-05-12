$(document).ready(function () {
    CallGenders();
});

const APIGenders='../../global/api/dashboard/genders.php?site=commerce&action=';

function Open(){
    $('.sidenav').sidenav('open');
}
function setGenders(cards){
    let content='';
    if(cards.length>0){
        cards.forEach(function(card){
            content+=`
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image">
                            <img src="../../resources/home/img/${card.cover}">
                        </div>
                            <div class="card-content">
                            <span class="card-title center">${card.gender}</span>
                        </div>
                        <div class="card-action">
                            <div class="center">  
                                <a class="btn blue"><i class="material-icons left">face</i> Ver mas ... </a>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        })
    }
    $('#GendersContent').html(content);

}
function CallGenders(){
    $.ajax({
        url:APIGenders+'GetGenders',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                $('#GendersContent').html(`<p> ${result.exception} </p>`);
            }
            setGenders(result.dataset);
        }
        else
        {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}