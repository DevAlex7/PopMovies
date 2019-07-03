var idCar;
$(document).ready(function () {
    getCar();
   
});
var prices = [];
var counts = [];
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
                console.log(result.exception);
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
var total;
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
                        <a class="btn red"> <i class="material-icons">delete</i> </a>
                    </td>
                </tr>
                `;
            subtotal.push(total);
        })
    }   
    total = subtotal.reduce( (a, b) => a + b, 0);
    $('#TextCardPay').text("Tu total es: $"+total);
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

