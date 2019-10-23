$(document).ready(function () {
    $('select').formSelect();
    callBlockUsers();
    callAnswers();
});


const apiUsers = '../../global/api/dashboard/adminusers.php?site=dashboard&action='; 

const setBlocks = (rows) => {
    console.log(rows);
    let content = '';
    if(rows.length > 0){
        rows.forEach(function(row){
            content+=`
            <tr>
                <td>${row.name}</td>
                <td>${row.lastname}</td>
                <td>${row.username}</td>
                <td>${row.email}</td>
                <td>${row.status}</td>
                <td> 
                    <a class="" href="javascript:setActiveUser(${row.idUser})">  <i class="material-icons">history</i> </a>
                </td>
            </tr>
        `;
        })
    }
    $('#readUsers').html(content);
}
const callBlockUsers = () => {
    $.ajax(
        {
            url:apiUsers+'blockUsers',
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast(
                    {
                        html:result.exception
                    }
                )
            }
            setBlocks(result.dataset);
        }
        else{
            console.log(response);
        }

    })
}
const setActiveUser = (id) => {
    $.ajax(
        {
            url:apiUsers+'setActiveUser',
            type:'POST',
            data:{
                idUser : id
            },
            datatype:'JSON'
        }
    )
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast(
                    {
                        html:'El estatus se puso a activo'
                    }
                )
                callBlockUsers();
            }
            else{
                M.toast(
                    {
                        html:result.exception
                    }
                )
            }
            
        }
        else{
            console.log(response);
        }

    })
}
const setAnswers = (rows) => {
    let content = '';
    if(rows.length > 0){
        rows.forEach(function(row){
            content+=`
            <tr>
                <td>${row.username}</td>
                <td>${row.date_answer}</td>
                <td> 
                    <a class="" href="javascript:setActiveUser(${row.idUser})">  <i class="material-icons">history</i> </a>
                </td>
            </tr>
        `;
        })
    }
    $('#readAnswers').html(content);
}
const callAnswers = () => {
    $.ajax(
        {
            url:apiUsers+'getAnswers',
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast(
                    {
                        html:result.exception
                    }
                )
            }
            setAnswers(result.dataset);
            
        }
        else{
            console.log(response);
        }

    })
}