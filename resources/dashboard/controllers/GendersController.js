$(document).ready(function(){
    $('.tooltipped').tooltip();
    $('.modal').modal();
    showTableGenders();
    ListMovies('MoviesSelect',null);
    ListGenders('GenderSelect',null)
    ShowGendersInMovies();
  });

const APIGenders = '../../global/api/dashboard/genders.php?site=dashboard&action=';
const APIGendersMovies = '../../global/api/dashboard/gendersmovie.php?site=dashboard&action=';

//Fill Select with Movies
function ListMovies(Select, value){
  $.ajax({
      url: APIGenders + 'getMovies',
      type: 'POST',
      data: null,
      datatype: 'JSON'
  })
  .done(function(response){
      if (isJSONString(response)) {
          const result = JSON.parse(response);
          if (result.status) {
              let content = '';
              if (!value) {
                  content += '<option value="" disabled selected>Seleccione pelicula </option>';
              }
              result.dataset.forEach(function(row){
                  if (row.id != value) {
                      content += `<option value="${row.id}">${row.name}</option>`;
                  } else {
                      content += `<option value="${row.id}" selected>${row.name}</option>`;
                  }
              });
              $('#' + Select).html(content);
          } else {
              $('#' + Select).html('<option value="">No hay Generos en lista</option>');
          }
          $('select').formSelect();
      } else {
          console.log(response);
      }
  })
  .fail(function(jqXHR){
      console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
  });
}

//Fill Select with Genders
function ListGenders(Select, value){
  $.ajax({
      url: APIGenders + 'GetGenders',
      type: 'POST',
      data: null,
      datatype: 'JSON'
  })
  .done(function(response){
      if (isJSONString(response)) {
          const result = JSON.parse(response);
          if (result.status) {
              let content = '';
              if (!value) {
                  content += '<option value="" disabled selected>Seleccione genero</option>';
              }
              result.dataset.forEach(function(row){
                  if (row.id != value) {
                      content += `<option value="${row.id}">${row.gender}</option>`;
                  } else {
                      content += `<option value="${row.id}" selected>${row.gender}</option>`;
                  }
              });
              $('#' + Select).html(content);
          } else {
              $('#' + Select).html('<option value="">No hay peliculas en lista</option>');
          }
          $('select').formSelect();
      } else {
          console.log(response);
      }
  })
  .fail(function(jqXHR){
      console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
  });
}

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
            <a href="" onclick="InformationbyIdEdit(${row.id})" class="red-text tooltipped modal-trigger" data-target="EditModalGender" data-tooltip="Editar"><i class="material-icons orange-text">edit</i></a>
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

//Show all information
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
          $('#DeleteImage').val(result.dataset.cover);
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
function InformationbyIdEdit(id){
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
        $('#idEditGender').val(result.dataset.id);
        $('#NameEditGender').val(result.dataset.gender);
        $('#ImageEditGender').val(result.dataset.cover);
        $('#Image').val(result.dataset.cover);
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

//Update Gender
$('#FormEditGender').submit(function(e){

  e.preventDefault();
  $.ajax({
    url:APIGenders+'edit',
    type:'POST',
    data: new FormData($('#FormEditGender')[0]),
    dataype:'JSON',
    cache:false,
    contentType:false,
    processData:false
  })
  .done(function(response){
    if(isJSONString(response)){
      const result = JSON.parse(response);
      if(result.status){
        $('#EditModalGender').modal('close');
         $('#FormEditGender')[0].reset();
        if (result.status == 1) {
            M.toast({html:'Genero Actualizado correctamente', classes:'toastsuccess'});
        } else if(result.status == 2) {
            M.toast({html:'Genero modificado. ' + result.exception});
        } else {
            M.toast({html:'Genero modificado. ' + result.exception});
        }
        showTableGenders();
      }
      else{
        M.toast({html:result.exception, classes:'toasterror'})
      }
    }else{
      console.log(response);
    }
  })
  .fail(function(jqXHR){

  })

})

//Delete Gender
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

//Create List of Genders in Movies
$('#ListMoviesinGenders').submit(function()
{
      event.preventDefault();
      $.ajax({
          url: APIGendersMovies + 'createList',
          type: 'POST',
          data: $('#ListMoviesinGenders').serialize(),
          datatype: 'JSON'
      })
      .done(function(response){
          if (isJSONString(response)) {
              const result = JSON.parse(response);
              console.log(response);
              if (result.status) {
                  M.toast({html:'Se agrego correctamente'});
                  ShowGendersInMovies();
              } else {
                  M.toast({html:result.exception});
              }
          } else {
              console.log(response);
          }
      })
      .fail(function(jqXHR){
          console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
      });
})

//Search
$('#SearchField').submit(function(e){
    e.preventDefault();
    $.ajax({
      url:APIGenders+'search',
      type:'POST',
      data:$('#SearchField').serialize(),
      datatype:'JSON'
    })
    .done(function(response){
      if(isJSONString(response)){
        const result = JSON.parse(response);
        if(result.status){
          FillGenders(result.dataset);
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
})
//Clear search bar 
function clearSearchField(){
    $('#searchGenders').val('');
    showTableGenders();
}

function setGendertoMovie(rows){
  let content = '';
  if(rows.length>0)
  {
    rows.forEach(function(row)
    {
      content += 
      `
      <tr>
        <td>${row.gender}</td>
        <td>${row.name}</td>
        <td>
            <a href="" onclick="ShowEditGendersInMoviesbyId(${row.id})" class="red-text tooltipped modal-trigger" data-target="ModalEditListGenderInMovie" data-tooltip="Editar"><i class="material-icons orange-text">edit</i></a>
            <a href="" onclick="ShowDeleteGendersInMoviesbyId(${row.id})" class="red-text tooltipped modal-trigger" data-target="ModalDeleteListGenderInMovie" data-tooltip="Elimar"><i class="material-icons">delete</i></a>
        </td>
      </tr>
      `;
    });
  }
  $('#TableGendersInMovies').html(content);
}

function ShowGendersInMovies(){
  $.ajax({
    url:APIGendersMovies+'getList',
    type:'POST',
    data:null,
    datatype:'JSON'
  })
  .done(function(response){
    if(isJSONString(response)){
      const result = JSON.parse(response);
      if(!result.status){
        M.toast({html:result.exception});
      } 
      setGendertoMovie(result.dataset);
    }
    else{
      console.log(response);
    }
  })
  .fail(function(jqXHR){
    console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
  });
}


//Show Genders in Movies in Modals
function ShowEditGendersInMoviesbyId(id_list){
    $.ajax({
      url:APIGendersMovies+'getListbyId',
      type:'POST',
      data:{
        id_list
      },
      datatype:'JSON'
    })
    .done(function(response){
      if(isJSONString(response)){
        const result = JSON.parse(response);
        if(result.status){
          $('#id_list').val(result.dataset.id);
          ListGenders('SelectEditGendertoMovie',result.dataset.gender);
          ListMovies('SelectEditMovie',result.dataset.movie);
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
//Edit row gender with movie by Id
$('#FormEditGendertoMovie').submit(function(){
  event.preventDefault();
  $.ajax({
    url:APIGendersMovies+'editRow',
    type:'POST',
    data:new FormData($('#FormEditGendertoMovie')[0]),
    datatype: ' JSON',
    cache: false,
    contentType: false,
    processData: false

  })
  .done(function(response){
    if(isJSONString(response)){
      const result =JSON.parse(response);
      if(result.status){
        $('#ModalEditListGenderInMovie').modal('close');
        M.toast({html:'¡Registro actualizado satisfactoriamente'});
        ShowGendersInMovies();
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

//Show Delete gender in movie
function ShowDeleteGendersInMoviesbyId(id_list){
  $.ajax({
    url:APIGendersMovies+'getListbyId',
    type:'POST',
    data:{
      id_list
    },
    datatype:'JSON'
  })
  .done(function(response){
    if(isJSONString(response)){
      const result = JSON.parse(response);
      if(result.status){
        $('#idDeleteGenderMovie').val(result.dataset.id);
        
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

//Delete List
$('#FormDeleteGenderinMovie').submit(function(){
  event.preventDefault();
  $.ajax({
    url:APIGendersMovies+'deleteRow',
    type:'POST',
    data:new FormData($('#FormDeleteGenderinMovie')[0]),
    datatype: ' JSON',
    cache: false,
    contentType: false,
    processData: false
  })
  .done(function(response){
    if(isJSONString(response)){
      const result =JSON.parse(response);
      if(result.status){
        $('#ModalDeleteListGenderInMovie').modal('close');
        M.toast({html:'¡Registro eliminado satisfactoriamente'});
        ShowGendersInMovies();
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


