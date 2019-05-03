$(document).ready(function () {
    ReadGenders();
});
const APIGenders = '../../../global/api/public/genders.php?site=commerce&acion=';
function  FillOptions(rows){
    let content = '';
    if(rows.lenght>0){
        rows.forEach(function(row){
            content += `<li><a href="viewgender.php"><i class="material-icons">settings</i>${row.gender}</a></li>`;
        })
    }
    $('#gen').html(content);
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
            M.toast({html:'No hay generos registrados'});
          }
          FillOptions(result.dataset);
        }
        else
        {
          console.log(response);
        }
      })
      .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
  
      })
}