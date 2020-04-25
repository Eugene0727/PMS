<?php /*session_start(); */
$ctr = $_SESSION['ctr'];
$fdate=$_SESSION['superadminfromdate'];
$tdate=$_SESSION['superadmintodate'];
?>
    <script>
        $(document).ready(function () {
            chartDoughnutLocation();
        });


         function chartDoughnutLocation()
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
                    let fdate = '<?php echo $fdate?>';
                    let tdate = '<?php echo $tdate?>';
                    let ctr = 1;
                    let dataLoc = "";
                    let numCtr = 0;
                   /* let nameCtr = 0;*/
                    let fArr = fdate.split('-');
                    let fYear = fArr[0];
                    let fMonth = fArr[1];
                    let fDay = fArr[2];

                    let tArr = tdate.split('-');
                    let tYear = tArr[0];
                    let tMonth = tArr[1];
                    let tDay = tArr[2];


                    for (let i = 0; i < counter; i++) {
                        let date = data[i].dateBecomePartner;
                        let arr = date.split('-');
                        let infoYear = arr[0];
                        let infoMonth = arr[1];
                        let infoDay = arr[2];
                        if(infoYear == fYear || infoYear == tYear){
                            if(data[i].status == 'Active'){
                                if(infoMonth >= fMonth || infoMonth <= tMonth){
                                    if(infoMonth >= fMonth){
                                        if(infoDay >= fDay){
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
                                    }
                                    if(infoMonth <= tMonth){
                                        if(infoDay <= tDay){
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
                                    }
                                }
                            }
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

                    var graphTarget = $("#chartDoughnutLocation");

                    var barGraph = new Chart(graphTarget, {
                        type: 'doughnut',
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
