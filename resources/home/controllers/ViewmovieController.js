$(document).ready(function () {
    //getURLParameters();
    exist();
    console.log("hola");
    
});
const APIViewmovies='../../global/api/home/viewmovie.php?site=ecommerce&action=';

var idMovie;
var nameMovie;
    
    
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
        if(getQueryVariable("movie") && getQueryVariable("name")){
            console.log("existe");
            idMovie=getQueryVariable("movie");
            nameMovie=getQueryVariable("name");
            $.ajax({
                url:APIViewmovies+'verifyMovie',
                type:'POST',
                data:{
                    idMovie,nameMovie
                },
                datatype:'JSON'
            })
            .done(function(response){
                if(isJSONString(response)){
                    const result=JSON.parse(response);
                    if(result.status){
                       
                        M.toast({html:'exite'});
                        console.log("dsa");
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