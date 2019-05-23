$(document).ready(function () {
    //getURLParameters();
    exist();
    
    GendersinMovies();
    ActorsinMovies();
    $('.tooltipped').tooltip();
    verifyfavorite();
    ShowComments();
});
//Instanciar la api hacia la API de ver peliculas
const APIViewmovies='../../global/api/home/viewmovie.php?site=ecommerce&action=';
//Instanciar la api hacia la API de favoritos
const APIFavorites='../../global/api/home/favorites.php?site=ecommerce&action=';
//Instanciar la api hacia la API de comentarios
const APIComment='../../global/api/home/comments.php?site=ecommerce&action=';
//Instancia la api hacia la API de el carrito
const APICar='../../global/api/home/car.php?site=ecommerce&action=';

//Declaración de dos variables globales,
var idMovie;
var nameMovie;

function EditModalComment(id){
    $.ajax({
        url:APIComment+'getComment',
        type:'POST',
        data:{
            id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#idEditMovie').val(result.dataset.id);
                $('#EditComment').val(result.dataset.comment);
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
$('#FormEditComment').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIComment+'editComment',
        type:'POST',
        data:new FormData($('#FormEditComment')[0]),
        datatype:'JSON',
        cache:false,
        processData:false,
        contentType:false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Comentario actualizado correctamente'});
                $('#MessageUser').modal('close');
                ShowComments();
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
function DeleteComment(id){
    $.ajax({
        url:APIComment+'getComment',
        type:'POST',
        data:{
            id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                $('#idDeleteMovie').val(result.dataset.id);
                // M.toast({html:'Comentario eliminado correctamente'});
                // $('#DeleteMessageUser').modal('close');
                // ShowComments();
            }else{
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

function Open(){
    $('.sidenav').sidenav('open');
}
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
/*function getURLParameters() {
    var parameters = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        parameters[key] = value;
    });
    return parameters;
    
}
*/
function exist(){
        if(getQueryVariable("movie")){
            idMovie=getQueryVariable("movie");
            
            $.ajax({
                url:APIViewmovies+'verifyMovie',
                type:'POST',
                data:{
                    idMovie
                },
                datatype:'JSON'
            })
            .done(function(response){
                if(isJSONString(response)){
                    const result=JSON.parse(response);
                    if(result.status){
                        GetInformation(idMovie);
                    }
                    else{
                        $(location).attr('href',result.exception);
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
        else{
            $(location).attr('href','main.php');
        }
}
function GetInformation(id){
    $.ajax({
        url:APIViewmovies+'getMovie',
        type:'POST',
        data:{
            idMovie
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                var ImageCover = "../../resources/dashboard/img/covers/"+result.dataset.cover;
                $('#idMovie').val(result.dataset.id);
                $('#ImageCover').attr("src", ImageCover);
                $('#MovieTitle').text("Titulo: "+result.dataset.name);
                $('#MovieDescription').text("Descripción: "+result.dataset.sinopsis);
                $('#MovieTime').text("Tiempo de duración: "+result.dataset.time);
                $('#MovieYear').text("Año: "+result.dataset.year);
                $('#MoviePrice').text("Precio de la pelicula: $"+result.dataset.price);
            }else{
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
function setGenders(chips){
    let content='';
    if(chips.length>0){
        chips.forEach(function(chip){
            content+=`
                <div class="chip green accent-3 white-text">
                    <span>${chip.gender}</span>
                </div>
            `;
        })
    }
    $('#GendersPart').append(content);
}
function GendersinMovies(){
    $.ajax({
        url:APIViewmovies+'getGenders',
        type:'POST',
        data:{
            idMovie
        },
        datatype:'JSON'
    })
    .done(function(response){
       if(isJSONString(response)){
        const result = JSON.parse(response);
        if(!result.status){
            M.toast({html:result.exception});       
        } 
        setGenders(result.dataset);
       }
       else{
           console.log(response);
       }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

function setActors(chips){
    let content='';
    if(chips.length>0){
        chips.forEach(function(chip){
            content+=`
                <div class="chip blue white-text">
                    <p class="truncate">${chip.actorname}</p>
                </div>
            `;
        })
    }
    $('#ActorsPart').append(content);
}
function ActorsinMovies(){
    $.ajax({
        url:APIViewmovies+'getActors',
        type:'POST',
        data:{
            idMovie
        },
        datatype:'JSON'
    })
    .done(function(response){
       if(isJSONString(response)){
        const result = JSON.parse(response);
        if(!result.status){
            M.toast({html:result.exception});       
        } 
        setActors(result.dataset);
       }
       else{
           console.log(response);
       }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function verifyfavorite(){
    $.ajax({
        url:APIFavorites+'verify',
        type:'POST',
        data:{
            idMovie
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status==1){
                $('#IconLove').text('favorite');
                $('#IconLove').attr('data-tooltip','Desmarcar como favorito');
                $('.tooltipped').tooltip();
            }
            else if(result.status==2){
                $('#IconLove').text('favorite_border');
                $('#IconLove').attr('data-tooltip','Marcar como favorito');
                $('.tooltipped').tooltip();
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
function setComments(comments, user){
    let content='';
    if(comments.length>0){
        comments.forEach(function(comment){
            if(comment.userId===user){
                content+=`
                <ul class="collection">
                    <li class="collection-item avatar ">
                        <i class="material-icons circle red" id="IconPerson">person</i>
                        <p class="title"> ${comment.username} </p>
                        <div class="cyan darken-2 white-text" id="ChipComment" style="display: inline-block;">
                          <span id="TitleComment">${comment.comment}</span>
                        </div>
                        <a class="secondary-content"> <i class="material-icons modal-trigger" data-target="MessageUser" onClick="EditModalComment(${comment.IdUserComment})">edit</i> <i class="material-icons modal-trigger" data-target="DeleteMessageUser" onClick="DeleteComment(${comment.IdUserComment})">delete</i> </a>
                    </li>
                </ul>
            `;
            }
            else{
                content+=`
                    <ul class="collection">
                        <li class="collection-item avatar ">
                            <i class="material-icons circle red" id="IconPerson">person</i>
                            <p class="title"> ${comment.username} </p>
                            <div class="cyan darken-2 white-text" id="ChipComment" style="display: inline-block;">
                              <span id="TitleComment">${comment.comment}</span>
                            </div>
                        </li>
                    </ul>
                `;
            }
        })
    }
    else{
        content=` 
        <ul class="collection">
            <li class="collection-item avatar ">
                <i class="material-icons circle red" id="IconPerson">person</i>
                <p id="TitleComment">No hay commentarios</p>
            </li>
        </ul>
        `;
    }
    $('#CommentsPart').html(content);
}
function ShowComments(){
    $.ajax({    
        url:APIComment+'GetComments',
        type:'POST',
        data:{
            idMovie
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.dataset){
            }
            setComments(result.dataset, result.user);        
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function favorite(){
    $.ajax({
        url:APIFavorites+'create',
        type:'POST',
        data:{
            idMovie,
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status==1){
                $('#IconLove').text('favorite');
                $('#IconLove').attr('data-tooltip','Desmarcar como favorito');
                $('.tooltipped').tooltip();
            }
            else if(result.status==2){
                $('#IconLove').text('favorite_border');
                $('#IconLove').attr('data-tooltip','Marcar como favorito');
                $('.tooltipped').tooltip();

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
$('#FormCommentUser').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIComment+'Comment',
        type:'POST',
        data:new FormData($('#FormCommentUser')[0]),
        datatype:'JSON',
        cache:false,
        processData:false,
        contentType:false
    })
    .done(function(response){
        if(isJSONString(response))
        {
            const result = JSON.parse(response);
            if(result.status){
                $('#Comment').val('');
                ShowComments();
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
function addtoCar(){

    var countUser = $('#Counter').val();
    $.ajax({
        url:APICar+'createCar',
        type:'POST',
        data:{
            idMovie, countUser        
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status==1){
                M.toast({html:'Se agrego al carrito'});
            }
            else if(result.status==2){
                M.toast({html:'Se agrego a su lista de carrito'});
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

