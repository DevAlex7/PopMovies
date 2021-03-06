$(document).ready(function () {
    $('.modal').modal();
    listAdmins();
    listTrusts();
});
var trustUsers = [];
const apiUsers = '../../global/api/dashboard/adminusers.php?site=dashboard&action='; 

$('#formChangePassword').submit(function(){
    event.preventDefault();
    $.ajax({
        url: apiUsers + 'changePassword',
        type:'POST',
        data: $('#formChangePassword').serialize(),
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Se cambió la contraseña exitosamente'});
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

const setList = (rows) => {
    let content = '';
    if(rows.length > 0){
        rows.map(function(row){
            content+=`
                <div class="col s12 m4">
                    <div class="card" id="cardUser-${row.id}" onclick="thisCard(${row.id})">
                        <div class="card-content">
                            <p>${row.name +" "+row.lastname}</p>
                        </div>
                    </div>
                </div>
            `;
        })
    }
    $('#result').html(content);
}
const listAdmins = () => {
    $.ajax({
        url:apiUsers+'listInTrust',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
            }
            setList(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
const setTrusts = (rows) => {
    let content = '';
    if(rows.length > 0){
        rows.map(function(row){
            content+=`
                <tr>
                    <td>${row.name}</td>    
                    <td>${row.lastname}</td>    
                    <td>${row.email}</td>    
                <tr>
            `;
        })
    }
    $('#tableTrust').html(content);
}

const listTrusts = () => {
    $.ajax({
        url:apiUsers+'listTrusts',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
            }
            setTrusts(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

const thisCard = (id) => {
    alert(id);
    if($('#cardUser-'+id).hasClass('blue white-text')){
        $('#cardUser-'+id).removeClass('blue white-text');
    }
    else{
        $('#cardUser-'+id).addClass('blue white-text');
        InsertTrust(id);
        listAdmins();
        listTrusts();
    }
}

const InsertTrust = (idTrust) => {
    alert(idTrust);
    $.ajax({
        url:apiUsers+'insertTrust',
        type:'POST',
        data:{
            idTrust
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({
                    html:'Se ha insertado su contacto de confianza exitosamente'
                })
            }
            else{
                M.toast({
                    html:result.exception
                })
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