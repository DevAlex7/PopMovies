$(document).ready(function () {
    $('.modal').modal();
    listAdmins();
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
        url:apiUsers+'all',
        type:'GET',
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
const thisCard = (id) => {
    
    alert(id);
    if($('#cardUser-'+id).hasClass('blue white-text')){

        $('#cardUser-'+id).removeClass('blue white-text');
        arrayRemove(trustUsers, id);
        console.log(trustUsers);
    }
    else{
        $('#cardUser-'+id).addClass('blue white-text');
        trustUsers.push(id);
    }
    console.log(trustUsers);
}

const setTrusts = (rows) => {
    let content = '';
    if(rows.length > 0){
        rows.map(function(row){
            content+=`
                <tr>
                    <td>${}</td>    
                <tr>
            `;
        })
    }
    $('#result').html(content);
}

const listTrusts = () => {
    $.ajax({
        url:apiUsers+'listTrusts',
        type:'GET',
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
