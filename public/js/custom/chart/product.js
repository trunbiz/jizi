

window.onload = function () {
    $.ajax({
        url:getDataProduct, // var getDataProduct in file chart/product.blade.php
        success: function(data){
            console.log(data.data_sell);
            var product = data.product;
            var length = data.product.length;
            var datacol = $(product).map(function() {return this.c_name;}).get(); 
            var dataset = $(product).map(function() {return this.soluong;}).get(); 
            renderChar(datacol,dataset,length,'Loại Sản Phẩm','Cate');

            var order = data.order; 
            var length = data.order.length;
            var datacol = $(order).map(function() {return this.pro_name;}).get(); 
            var dataset = $(order).map(function() {return this.soluong;}).get(); 
            renderChar(datacol,dataset,length,'Bán Trong Tháng','Product-Sold-Month');

            var top10 = data.top10; 
            var length = data.top10.length;
            var datacol = $(top10).map(function() {return this.pro_name;}).get(); 
            var dataset = $(top10).map(function() {return this.soluong;}).get(); 
            renderChar(datacol,dataset,length,'Top 10','Top_10_Sales');

            var data_sell = data.data_sell;
            var dataMoney = $(data_sell).map(function() {return this.b_total;}).get(); 
            var dataLabel = $(data_sell).map(function() {return this.create_at;}).get(); 
            LineChart(dataLabel,dataMoney,'total_money');
            
        },
        error: function(error){
            console.log(error);
        }
    });
}

function renderChar(datacol,dataset,length,label,idChart) {
    var color = [];
    for (let index = 0; index < length; index++) {
        var o = Math.round, r = Math.random, s = 255;
        color[index] = 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 0.5 + ')';
    }
    var border = [];
    for (let index = 0; index < length; index++) {
        var o = Math.round, r = Math.random, s = 255;
        border[index] = 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + 1 + ')';
    }
    const ctx = document.getElementById(idChart).getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',   
        data: {
            labels:datacol,
            datasets: [{
                label: label,
                data: dataset,
                backgroundColor: color,
                borderColor: border,
                borderWidth: 2
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });        
}

function LineChart(labels,data,id_element){
    const speedCanvas = document.getElementById(id_element);
    // Chart.defaults.font.family = "Teko";
    // Chart.defaults.font.size = 22;
    // Chart.defaults.color = "black";

    let speedData = {
    labels: labels,
    datasets: [{
        label: "Car Speed (mph)",
        data: data
    }]
    };

    let lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData
    });
}