const chart1 = $("#chart1");
var stat1 = new Chart(chart1,{
    type: "bar",
    data: {
        labels: [1,2,3,4,5],
        datasets: [{
            label: "Revenue",
            backgroundColor: "#4e73df",
            borderColor: "#000000",
            borderWidth: 2,
            data: [4215, 5312, 6251, 7841, 9821, 14984],
        }],
    }
});
const chart2 = $("#chart2");
var stat2 = new Chart(chart2,{
    type: "line",
    data: {
        labels: [1,2,3,4,5],
        datasets: [{
            label: "Line 1",
            backgroundColor: "#0000003f",
            borderColor: "#000000",
            borderWidth: 2,
            data: [4215, 5312, 6251, 7841, 9821, 14984],
        },{
            label: "Line 2",
            backgroundColor: "#ff00ff3fs",
            borderColor: "#ff00ff",
            borderWidth: 2,
            data: [10000, 2000, 8000, 2000, 900, 20000],
        }],
    }
});