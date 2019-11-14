const chart1 = $("#chart1");
const stat1 = new Chart(chart1, {
    type: "bar",
    data: {
        labels: [],
        datasets: [{
            label: "New User",
            backgroundColor: [],
            borderColor: "#000000",
            borderWidth: 2,
            data: [],
        }],
    }
});

const chart2 = $("#chart2");
const stat2 = new Chart(chart2,{
    type: "pie",
    data: {
        labels: [],
        datasets: [{
            label: "Stat",
            backgroundColor: [],
            borderColor: "#000000",
            borderWidth: 2,
            data: [],
        }],
    }
});

$(document).ready(function () {
    $.ajax({
        type: "POST",
        url: "/assignment/controller/api_call.php",
        data: {
            call: "1"
        },
        success: function (data) {
            var res = JSON.parse(data);
            jQuery.each(res,function (i,val) {
                addData(stat2,i,val);
                addColor(stat2,randomColor());
            });

        },
        error: function (e) {
            console.log(e);
        }
    });
    $.ajax({
        type: "POST",
        url: "/assignment/controller/api_call.php",
        data: {
            call: "2"
        },
        success: function (data) {
            var res = JSON.parse(data);
            jQuery.each(res,function (key,value) {
                var k = convert(key);
                addData(stat1, k, value);
                addColor(stat1, randomColor());
            });
        },
        error: function (e) {
            console.log(e);
        }
    })
});

function addData(chart, label, data) {
    chart.data.labels.push(label);
    chart.data.datasets.forEach((dataset) => {
        dataset.data.push(data);
    });
    chart.update();
}

function removeData(chart) {
    chart.data.labels.pop();
    chart.data.datasets.forEach((dataset) => {
        dataset.data.pop();
    });
    chart.update();
}

function addColor(chart, color) {
    chart.data.datasets.forEach((dataset)=>{
        dataset.backgroundColor.push(color);
    });
    chart.update();
}

function randomColor() {
    var str = "0123456789ABCDEF";
    var res = "#";
    for(var i=0;i<6;i++){
        var rand = Math.floor(Math.random()*str.length);
        res += str[rand];
    }
    return res;
}

function convert(date) {
    var d = date.split(":")[2];
    var m = date.split(":")[1];
    var y = date.split(":")[0];
    return d+"-"+m+"-"+y;
}