$(document).ready(function(){
    $('.tooltipped').tooltip();
    $('.modal').modal();
    showTableGenders();
  });

const APIGenders = '../../global/api/genders.php?site=dashboard&action=';

//Fill Genders
function FillGenders(rows){

  let content = '';
  if(rows.length>0)
  {
    rows.forEach(function(row)
    {
      content += 
      `
      <tr>
        <td>${row.gender}</td>
        <td>
            <a href="" onclick="InformationbyId(${row.id})" class="red-text tooltipped modal-trigger" data-target="ModalDeleteGender" data-tooltip="Elimar"><i class="material-icons">delete</i></a>
        </td>
      </tr>
      `;
    });
  }
  $('#GendersRead').html(content);
}
function showTableGenders(){
    $.ajax({
      url: APIGenders+'GetGenders',
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
        FillGenders(result.dataset);
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

//Create Gender
$('#form-createGender').submit(function(){

  event.preventDefault();
  $.ajax({
    url:APIGenders + 'createGender',
    type:'POST',
    data:new FormData($('#form-createGender')[0]),
    dataype:'JSON',
    cache:false,
    contentType:false,
    processData:false
  })
  .done(function(response){
    if(isJSONString(response)){
      const result = JSON.parse(response);
      if(result.status){
        $('#form-createGender')[0].reset();
        M.toast({html:'Genero agregado correctamente'});
        showTableGenders();
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

function InformationbyId(id){
    $.ajax({
      url:APIGenders + 'getGender',
      type:'POST',
      data:{
        id:id
      },
      datatype:'JSON'
    })
    .done(function(response){
      if(isJSONString(response)){
        const result = JSON.parse(response);
        if(result.status){
          $('#idGender').val(result.dataset.id);
          $('#ShowNameGender').text("Genero seleccionado: "+result.dataset.gender);
        }
        else{
          console.log(result.exception);
        }
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
$('#DeleteGender').submit(function(){
    event.preventDefault();
    $.ajax({
      url:APIGenders+'destroy',
      type:'POST',
      data: $('#DeleteGender').serialize(),
      dataype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status)
            {
              $('#ModalDeleteGender').modal('close');
              M.toast({html:'Genero eliminado correctamente'});
            }
            else{
              console.log(result.exception);
            }
            showTableGenders();
        }
        else{
          console.log(response);
        }
    })
    .fail(function(jqXHR){
      console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    })
})








