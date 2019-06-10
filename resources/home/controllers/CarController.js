$(document).ready(function () {
    callTodayorder();
    $('.modal').modal();
});
const APICar='../../global/api/home/car.php?site=ecommerce&action=';
var idCar;
var idMovie;

function Open(){
    $('.sidenav').sidenav('open');
}

function setToday(rows){
    let content = '';
    if(rows.length>0){
        rows.forEach(function(row){
            content+=`
                    <thead>
                        <tr>
                            <th>Pelicula</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                            <th>Total</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>${row.name}</td>
                            <td>${row.count}</td>
                            <td>${row.date}</td>
                            <td>${row.total}</td>
                        </tr>
                    </tbody>
            `;
        })
    }
    $('#Information').html(content);
}
function callTodayorder(){
    $.ajax({
        url:APICar+'viewmyListToday',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(!response.status){
                M.toast({html:result.exception});
            }
            $('#Title').text("Tu carrito de ahora");
            setToday(result.dataset);
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
