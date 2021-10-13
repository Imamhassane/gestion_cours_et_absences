/* // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var duree = [];
var labes = [];
$.ajax({
    type: "get",
    dataType: "json",
    url: "http://localhost:8000/?controllers=responsable&view=get.Datas",
    // url: "http://niassimamhassane.alwaysdata.net/?controllers=responsable&view=getDatas",

    success: function(resp) {
        var json = resp; // create an object with the key of the array

        // console.log(data);
        for (let index = 0; index < json.length; index++) {
            const element = json[index];
            duree.push(element.duree)
            labes.push(element.nom)
        }

    },
    error: function(error) {
        var json = error;
        console.log(json.error);
    }
});

setTimeout(function() {

        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labes,
                datasets: [{
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#FFFF00', '#FF0000', '#154360 '],
                    hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#FFFF00', '#FF0000', '#154360'],
                    hoverBorderColor: "rgba(234, 236, 244, 1)",
                    data: duree,
                }],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#000",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                },
                legend: {
                    display: true,
                    position: 'left'

                },
                cutoutPercentage: 80,
            },
        });
    },
    3000); */