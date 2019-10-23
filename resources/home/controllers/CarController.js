var idCar;
$(document).ready(function () {
    getCar();
    
});

var prices = [];
var counts = [];
var total;
function Open(){
    $('.sidenav').sidenav('open');
}

const ApiCar = '../../global/api/home/car.php?site=ecommerce&action=';

function getCar(){
    $.ajax({
        url:ApiCar+'getCarId',
        type:'POST',
        data:null,
        datatype:'JSON'

    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                idCar = result.dataset.id;
                getList(idCar);
            }
            else{
                M.toast({html:"No hay una lista de orden existente"});
            }
        }   
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    })
}

var subtotal=[];
function setList(rows){
    let content='';
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`
                <tr>
                    <td>${row.name}</td>
                    <td>${row.count}</td>
                    <td>${row.price}</td>
                    <td>${total = row.count * row.price}</td>
                    <td>${row.date}</td>
                    <td>
                        <a onClick="deleteItem(${row.id},${row.movieId})" class="btn red"> <i class="material-icons">delete</i> </a>
                    </td>
                </tr>
                `;
            subtotal.push(total);
        })
        total = subtotal.reduce( (a, b) => a + b, 0);
        $('#TextCardPay').text("Tu total es: $"+total);
    }   
    else{
        $('#TextCardPay').text('');
    }
   
    $('#readList').html(content);
}
function getList(id_car){
    $.ajax({
        url:ApiCar+'viewmyList',
        type:'POST',
        data:{
            id_car
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!result.status){
                M.toast({html:result.exception});
            }
            setList(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    })
}
const deleteItem = (id, Movie_id) => {
    $.ajax({
        url:ApiCar+'deleteItem',
        type:'POST',
        data:{
            id,Movie_id
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Eliminado correctamente'});
                getList(idCar);
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
    })
    
}
function updateStatus (idCar){

    $.ajax({
        url:ApiCar+'updateStatus',
        type:'POST',
        data:{
            idCar
        },
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                M.toast({html:'Orden pagada'});
                $('#ConfirmBuy').modal('close');
                getList(idCar);
            }
            else{
                M.toast({html:'Fallo de pago de orden'});
            }
        }else{

        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    })
}

function confirmPay(){
    if(total == 0){
        $('#btnPay').addClass('disabled');
    }
    else{
        $('#btnPay').removeClass('disabled');
        $.ajax({
            url:ApiCar+'getCarId',
            type:'POST',
            data:null,
            datatype:'JSON'
        })
        .done(function(response){
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                      updateStatus(result.dataset.id);
                      location.href = 'shop_detail.php';
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
            console.log("fallo");
        })
    }
}

