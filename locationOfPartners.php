<?php session_start(); 
$ctr = $_SESSION['ctr'];
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
            chartLoc();
        });


        function chartLoc()
        {
            {
                $.post("dataLocation.php",
                function (data)
                {
                    console.log(data);
                    var name = [];
                    var marks = [];
                    let num = 1;
                    let num1 = 1;
                    let num2 = 0;
                    let counter = '<?php echo $ctr?>';
                    let ctr = 1;
                    let dataLoc = "";
                    let numCtr = 0;
                   /* let nameCtr = 0;*/
                    /*alert(counter);*/
                    for (let i = 0; i < counter; i++) {
                        let loc = data[i].location;
                        if(isExist(loc,name)){
                            let num2 = addMark(loc,name);
                            if(num2 != 0){
                                marks[num2] = marks[num2] + 1;
                            
                            }
                        }
                        else{
                            name.push(data[i].location);
                            marks.push(1);
                        }
                        
                    }
                  /*  console.log(name);
                    console.log(marks);
*/
                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'Business Partners Scale Location',
                                backgroundColor: ['#49e2ff','#08E620','#0823E6','#E6082A','#F88B9B','#F8BD8B','#F9F92A','#B50CF5','#FBA104'],
                                borderColor: '#000000',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data: marks,
                                indexLabel: {marks}
                            }
                        ],
                    };

                    var graphTarget = $("#chartLoc");

                    var barGraph = new Chart(graphTarget, {
                        type: 'polarArea',
                        data: chartdata,
                        options: {
                            cutoutPercentage: 70,
                            legend:{
                                position: 'right',
                                labels: {
                                    boxWidth: 10,
                                }
                            }
                        }
                    });
                });
            }
        }
        function isExist(location,name){
            for(let index = 0; index < name.length; index++){
                if(name[index] == location){
                    return true;
                }
            }
            return false;
        }
        function addMark(location,name){
            for(let index = 0; index < name.length; index++){
                if(name[index] == location){
                   /* alert(name[index]);*/
                    return index;
                }
            }
            return 0;
        }

    </script>
<!-- 
</body>
</html> -->