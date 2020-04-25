<!DOCTYPE html>
<html>
<head>
<style type="text/css">
/*BODY {
    width: 550PX;
}*/

/*#chart-container {
    width: 100%;
    height: auto;
}*/
</style>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="Chart.min.js"></script>
<script type="text/javascript" src="canvasjs.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("dataActiveBusiness.php",
                function (data)
                {
                    console.log(data);
                    var name = ['Active', 'Total Number Business Partner'];
                    var marks = [];
                    let num = 0;
                    let counter = 0;

                    for (var i in data) {
                        if(data[i].status == "Active"){
                            num++;
                        }
                        counter++;
                       /* name.push(data[i].profitDate);*/
                        
                    }
                    marks.push(num);
                    marks.push(counter);

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Number of Active Business Partner',
                                backgroundColor: ['#49e2ff','#FFFFFF'],
                                borderColor: '#000000',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks,
                                indexLabel: {marks}
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
                        data: chartdata,
                        options: {
                            cutoutPercentage: 70
                        }
                    });
                });
            }
        }
        </script>

</body>
</html>