$(document).ready(function()
{
    GetProductsMovies();
    getCountMoviesbyProvider();
})

const APICustomers = '../../global/api/dashboard/customers.php?site=dashboard&action=';
const APIShops = '../../global/api/dashboard/shop.php?site=dashboard&action=';
const APIProducts = '../../global/api/dashboard/movies.php?site=dashboard&action=';

function GetProductsMovies()
{
    $.ajax({
        url: APIProducts + 'GetMovies',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                
                var movie = [];
                var count =[];

                for(var i in result.dataset){

                    movie.push(result.dataset[i].name);
                    count.push(result.dataset[i].count);
                
                }
                var chartdata = {
                    labels: movie,
                    datasets : [
                        {
                            backgroundColor: 'white',
                            borderColor:'white',
                            pointBorderColor: "black",
                            hoverBackgroundColor: 'red',
                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: count
                        },
                    ]
                  };
            
                var ctx = $("#myChart");
                  
                var barGraph = new Chart(ctx, {
                        type: 'line',
                        data: chartdata,
                        options: {
                            legend: {
                                labels: {
                                        generateLabels: function(chart) {
                                            labels = Chart.defaults.global.defaultFontColor = 'white';
                                        return labels
                                        }
                                },
                                display: false,
                            },
                            scales:{
                                yAxes: [{
                                    ticks: {
                                        fontColor: "white",
                                        fontStyle: "bold",
                                        beginAtZero: true,
                                        padding: 20
                                    },
                                    gridLines: {
                                        drawTicks: false,
                                        display: false
                                    }
                                }],
                                xAxes: [{
                                    gridLines: {
                                        zeroLineColor: "transparent"
                                    },
                                    ticks: {
                                        padding: 20,
                                        fontColor: "white",
                                        fontStyle: "bold"
                                    }
                                }]
                            },
                            gridLines: {
                                display: true,
                                color: "white",
                            },
                            tooltips: {
                                callbacks: {
                                    label: tooltipItem => `${tooltipItem.yLabel}: ${tooltipItem.xLabel}`, 
                                    title: () => null,
                                }
                            },
                        },
                    },
                );
            }
            else{
            }
        }
        else
        {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
function getCountMoviesbyProvider(){
    $.ajax(
        {
            url:APIProducts+'getCountMoviesbyProveeder',
            type:'POST',
            data:null,
            datatype:'JSON'
        }
    )
    .done(function(response)
        {
            if(isJSONString(response)){
                const result = JSON.parse(response);
                if(result.status){
                    
                    var coloR = [];

                    for(var x in result.dataset){
                        coloR.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));
                    }

                    var data = {
                        count : [],
                        enterprise : []
                    };
                
                    for (var i in result.dataset) {
                        data.count.push(result.dataset[i].countM);
                        data.enterprise.push(result.dataset[i].enterprise);
                    }

                
                    var ctx1 = $("#doughnut-chartcanvas-1");
                    
                    var data1 = {
                        labels:data.enterprise,
                        datasets : [
                            {
                                label : ["hoa","hey","sd"],
                                data : data.count,
                                backgroundColor: coloR,
                                
                                borderColor : [
                                    'white',
                                ],
                                borderWidth : [1, 1, 1, 1, 1]
                            }
                        ],
                        
                    };
                
                    var options = {
                        legend : {
                            display : true,
                            position : "bottom",
                        },
                        labels: {
                            boxWidth: 80,
                            fontColor: 'black'
                        },
                    };
                
                    var chart1 = new Chart( ctx1, {
                        type : "doughnut",
                        data : data1,
                        options : options
                    });
                     
                }
                else{
                    M.toast({html:result.exception});
                }
            }   
            else{
                console.log(response);
            }
        }
    )
    .fail(function(jqXHR){

    })
}
