$(document).ready(function () {
    ReadGenders();
});
const APIGenders = '../../../global/api/public/publicgenders.php?site=commerce&action=';
function FillOptions(rows){
    let content = '';
    if(rows.length >=  0){
        rows.forEach(function(row){
            content += `<li><a href="viewgender.php"><i class="material-icons">done</i>${row.gender}</a></li>`;
        })
    }
    $('div#generos').html(content)
    
}

function ReadGenders(){
    //Peticion Ajax
    $.ajax({
        url: APIGenders+'readGenders',
        type:'POST',
        data:null,
        datatype:'JSON'
      })
      .done(function(response){
        if(isJSONString(response)){
          const result = JSON.parse(response);
          
          if(!result.status){
            console.log(response);
            M.toast({html:'No hay generos registrados'});
          }
          FillOptions(result.dataset);
        }
        else
        {
          console.log(APIGenders+'readGenders');
        }
      })
      .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
  
      })
}