<!DOCTYPE html>
<html>
<head>
<style type="text/css">
/*BODY {
    width: 550PX;
}*/

#chart-container {
    width: 100%;
    height: auto;
}
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
                $.post("superDataIncome.php",
                function (data)
                {
                    console.log(data);
                    var name = [];
                    var marks = [];
                    let date = new Date();
                    let week = date.getDate()+7;
                    let day = date.getDate();
                    let month = date.getMonth()+1;
                    let year = date.getFullYear();

                    for (var i in data) {
                        let date = data[i].profitDate;
                        let arr = date.split('-');
                        let infoYear = arr[0];
                        let infoMonth = arr[1];
                        let infoDay = arr[2];
                        
                        if(Number(infoYear) == year && Number(infoMonth) == month){
                            if(Number(infoDay) >= day && Number(infoDay) < week-1){
                                name.push(data[i].profitDate);
                                marks.push(data[i].Income);
                            }
                        }
                        else if(day == 1){
                           if(Number(infoMonth)+1 == month && (Number(infoDay) == 30 || Number(infoDay) == 31)){
                                name.push(data[i].profitDate);
                                marks.push(data[i].Income);
                           }
                        }
                        else if(month == 3){
                            if(Number(infoMonth)-1 == month && Number(infoDay) == 29){
                                name.push(data[i].profitDate);
                                marks.push(data[i].Income);
                           }
                        }
                       
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks,
                                indexLabel: {marks}
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'horizontalBar',
                        data: chartdata,
                        options: {
                            legend:{
                                display: false,
                            },
                            beginAtZero: true
                        }
                    });
                });
            }
        }
        </script>

</body>
</html>