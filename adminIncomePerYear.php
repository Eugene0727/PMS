<?php session_start();
$ctr = $_SESSION['ctr'];
$id = $_GET['id'];
?>
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
             adminIncomePerYear();
        });


         function adminIncomePerYear()
        {
            {
                $.post("dataIncome.php",
                function (data)
                {
                    console.log(data);
                     var Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                     
                    var incomeSame = [];
                    let ctr = '<?php echo $ctr?>';
                    let areaId = '<?php echo $id ?>';
                    let num = 0;
                    let num2 = 0;
                    let counter = 0;
                    for(let index = 0; index < ctr; index++){
                        if(data[index].areaId == areaId){
                            let date = data[index].profitDate;
                            let arr = date.split('-');
                            let index1 = Number(arr[1]); 

                            num2 = isExist(arr);

                        /*alert();*/
                            if($.isNumeric(incomeSame[num2]) == false){
                                incomeSame[num2] = Number(0) + Number(data[index].Income);

                            }
                            else{
                                incomeSame[num2] = Number(incomeSame[num2]) + Number(data[index].Income);
                            }
                        } 
                    }
                      console.log(incomeSame);  
                        /*name.push(data[i].profitDate);*/
                        
                   /* }*/

                    var chartdata = {
                        labels: Months,
                        datasets: [
                            {
                                label: 'Income Per Year',
                               /* fill: false,*/
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                pointBackgroundColor: "#000000",
                                pointBorderColor: '#000000',
                                data: incomeSame
                            }
                        ]
                    };

                    var graphTarget = $("#adminIncomePerYear");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
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
        function isExist(date){
            let dateNo = Number(date[1])-1;
            /*alert(dateNo);*/
            for(let index = 0; index < 12; index++){
                /*alert(noOfMonths[index]);*/
                if(index == dateNo){
                    /*console.log(date[1] + " " + noOfMonths[index]);*/
                    return index;
                }
            }
            return 13;
        }
        </script>

<!-- </body>
</html> -->