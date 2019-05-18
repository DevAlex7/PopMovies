$(document).ready(function () {
    ShowAdministrators();
});
const APIAdministrators='../../global/api/dashboard/managers.php?site=dashboard&action=';

function setAdministrators(rows){
    let content='';
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`
                <tr>
                    <td>${row.name}</td>
                    <td>${row.lastname}</td>
                    <td>${row.username}</td>
                    <td>${row.email}</td>
                    <td>
                        <a href="" onclick="getId(${row.id})" class="orange-text tooltipped modal-trigger" data-target="ModalEditAdmin" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>
                        <a href="" onclick="getIdDelete(${row.id})" class="red-text tooltipped modal-trigger" data-target="ModalDeleteAdmin" data-tooltip="Elimar"><i class="material-icons">delete</i></a>
                    </td>
                </tr>
            `;
        })
    }
    $('#ListAdministrators').html(content);
}   
function ShowAdministrators(){
    $.ajax({
        url:APIAdministrators+'all',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result= JSON.parse(response);
            if(!result.status){
                M.toast({html:result.exception});
            }
            setAdministrators(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
$('#FormCreateAdminUser').submit(function(){
    event.preventDefault();
      $.ajax({
          url:APIAdministrators+'createAdminUser',
          type: 'POST',
          data: new FormData($('#FormCreateAdminUser')[0]),
          datatype: ' JSON',
          cache: false,
          contentType: false,
          processData: false
      })
      .done(function(response){
          if(isJSONString(response)){
              const result = JSON.parse(response);
              if(result.status){
                  M.toast({html:'Se creo correctamente'});
                  ShowAdministrators();
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

//To edit
function getId(id){
    $.ajax({
        url:APIAdministrators+'getbyId',
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
           $('#id_listEdit').val(result.dataset.id);
            $('#EditNameUser').val(result.dataset.name);
           $('#EditLastNameUser').val(result.dataset.lastname);
           $('#EditUsername').val(result.dataset.username);
           $('#EditEmailUser').val(result.dataset.email);
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
//Edit
$('#FormEditAdminUser').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIAdministrators+'editManager',
        type:'POST',
        data: new FormData($('#FormEditAdminUser')[0]),
        datatype: ' JSON',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Administrador actualizado correctamente'});
                ShowAdministrators();                
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
//To delete
function getIdDelete(id){
    $.ajax({
        url:APIAdministrators+'getbyId',
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
           $('#notificacion').text("¿Deseas eliminar este registro?");
            $('#id_listDelete').val(result.dataset.id);
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

$('#FormDeleteAdminUser').submit(function(){
    event.preventDefault();
    $.ajax({
        url:APIAdministrators+'deleteManager',
        type:'POST',
        data: new FormData($('#FormDeleteAdminUser')[0]),
        datatype: ' JSON',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Administrador eliminado correctamente'});
                ShowAdministrators();                
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