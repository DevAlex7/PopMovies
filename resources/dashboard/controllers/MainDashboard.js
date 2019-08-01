$(document).ready(function()
{
    //Metodo para llamar la cantidad de stock
    GetProductsMovies();
    //Metodo para llamar las compras de peliculas por proveedor
    getCountMoviesbyProvider();
    //Metodo para llamar a los favoritos
    GetFavorites();
    //Metodo para llamar las peliculas vendidas
    mostSails();
    //Metodo para llamar las peliculas vendidas por dia
    SailsinDates();

})
//Variable arreglo para guardar los colores
var coloR = [];

//APIS
const APICustomers = '../../global/api/dashboard/customers.php?site=dashboard&action=';
const APIShops = '../../global/api/dashboard/shop.php?site=dashboard&action=';
const APIProducts = '../../global/api/dashboard/movies.php?site=dashboard&action=';

//Metodo 1
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
                //arreglo para guardar las peliculas
                var movie = [];
                //arreglo para guardar las cantidades
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
            
                var idDeCanvas = $("#myChart");
                  
                var barGraph = new Chart(idDeCanvas , {
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
//Grafico 2 - Compras a proveedores
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
                    

                    for(var x in result.dataset){
                        coloR.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));
                    }
                    console.log(coloR);

                    var data = {
                        count : [],
                        enterprise : []
                    };

                    console.log(result.dataset);
                    for (var i in result.dataset) {
                        data.count.push(result.dataset[i].countM);
                        data.enterprise.push(result.dataset[i].enterprise);
                    }

                
                    var ctx1 = $("#doughnut-chartcanvas-1");
                    
                    var data1 = {
                        labels:data.enterprise,
                        datasets : [
                            {
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
function GetFavorites(){
    $.ajax({
        url:APIProducts+'TopFavorites',
        type:'POST',
        data:null,
        datatype:'JSON'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                var movie = [];
                var top =[];

                for(var i in result.dataset){

                    movie.push(result.dataset[i].name);
                    top.push(result.dataset[i].trendingTotal);
                
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
                            data: top
                        },
                    ]
                };
            
                var ctx = $("#chartTop");
                  
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
                                        padding: 20,
                                        stepSize: 1
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
                                        padding: 10,
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
                M.toast({html:result.exception});
            }
        }
        else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){

    })

}
function mostSails() {
    $.ajax({
        url: APIProducts + 'mostSails',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                var coloR2 = [];
                var count = [];
                var nameMovie =[];

                for(i in result.dataset){
                    count.push(result.dataset[i].cantidad);
                    nameMovie.push(result.dataset[i].name);
                }

                for(i in result.dataset){
                    coloR2.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));
                }


                var ctx = $("#MostSailChart");

                //bar chart data
                var data = {
                  labels: nameMovie,
                  datasets: [
                    {
                      data: count,
                      backgroundColor: coloR2,
                      borderColor: [
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)"
                      ],
                      borderWidth: 1
                    },
                  ]
                };
              
                //options
                var options = {
                  responsive: true,
                  title: {
                    display: true,
                    position: "top",
                    fontSize: 18,
                    fontColor: "#111"
                  },
                  legend: {
                    display: false,
                  },
                  scales: {
                    yAxes: [{
                      ticks: {
                        min: 0,
                        stepSize: 1
                      }
                    }]
                  }
                };
              
                //create Chart class object
                var chart = new Chart(ctx, {
                  type: "bar",
                  data: data,
                  options: options
                });
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

    })
}

function SailsinDates() {
    $.ajax({
        url: APIProducts + 'sailsPerDate',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                var coloR3 = [];
                var count = [];
                var dateSail =[];

                for(i in result.dataset){
                    count.push(result.dataset[i].ventas);
                    dateSail.push(result.dataset[i].date);
                }

                for(i in result.dataset){
                    coloR3.push('#'+(Math.random()*0xFFFFFF<<0).toString(16));
                }

                var ctx = $("#SailsDates");

                //bar chart data
                var data = {
                  labels: dateSail,
                  datasets: [
                    {
                      data: count,
                      backgroundColor: coloR3,
                      borderColor: [
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)",
                        "rgba(10,20,30,1)"
                      ],
                      borderWidth: 1
                    },
                  ]
                };
              
                //options
                var options = {
                  responsive: true,
                  title: {
                    display: true,
                    position: "top",
                    fontSize: 18,
                    fontColor: "#111"
                  },
                  legend: {
                    display: false,
                  },
                  scales: {
                    yAxes: [{
                      ticks: {
                        min: 0,
                        stepSize: 0
                      }
                    }]
                  }
                };
              
                //create Chart class object
                var chart = new Chart(ctx, {
                  type: "bar",
                  data: data,
                  options: options
                });
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

    })
}
