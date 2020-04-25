<?php session_start(); 
$fdate=$_SESSION['adminfromdate']; $tdate=$_SESSION['admintodate']; ?>
<!-- <!DOCTYPE html>
<html>
<head>
<style type="text/css">
/*BODY {
    width: 550PX;
}*/

/*#chart-container {
    width: 100%;
    height: auto;
    margin: auto;
}*/
</style>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="Chart.min.js"></script>
<script type="text/javascript" src="canvasjs.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div> -->
    <script>
         $(document).ready(function () {
            chartReportsAdmin();
        });


        function chartReportsAdmin()
        {
            {
                $.post("dataIncome.php",
                function (data)
                {
                    console.log(data);
                    var name = [];
                    var marks = [];
                    let date1 = '<?php echo $fdate?>';
                    let date2 = '<?php echo $tdate?>';
                    let arr1 = date1.split('-');
                    let arr2 = date2.split('-');
                    let year1 = Number(arr1[0]); 
                    let month1 = Number(arr1[1]); 
                    let day1 = Number(arr1[2]); 
                    let year2 = Number(arr2[0]); 
                    let month2 = Number(arr2[1]); 
                    let day2 = Number(arr2[2]); 

                    for (var i in data) {
                        let date = data[i].profitDate;
                        let arr = date.split('-');
                        let infoYear = arr[0];
                        let infoMonth = arr[1];
                        let infoDay = arr[2];
                        
                        if(Number(infoYear) == year2 || Number(infoYear) <= year1){
                            if(Number(infoMonth) == month2){
                                if(Number(infoDay) < day2){
                                        name.push(data[i].profitDate);
                                        marks.push(data[i].Income);
                                    }
                            }
                            else if(Number(infoMonth) >= month1 && Number(infoMonth) <= month2){
                                if(Number(infoMonth) >= month1){
                                    if(Number(infoDay) > day1){
                                        name.push(data[i].profitDate);
                                        marks.push(data[i].Income);
                                    }
                                }
                                if(Number(infoMonth) <= month2){
                                    if(Number(infoDay) < day2){
                                        name.push(data[i].profitDate);
                                        marks.push(data[i].Income);
                                    }
                                }
                            }
                        }
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Income Per Week',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks,
                                indexLabel: {marks}
                            }
                        ]
                    };

                    var graphTarget = $("#chartReportsAdmin");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
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
<!-- 
</body>
</html> -->