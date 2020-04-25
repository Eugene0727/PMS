$(document).ready(function () {
            chartLoc();
            let ctr = "<?php sesssion_start(); $ctr = $_SESSION['ctr']; echo $ctr ?>";
             alert(ctr);
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
                    let counter = '<?php echo $ctr; ?>';
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
                                backgroundColor: ['#49e2ff','#08E620','#0823E6','#E6082A'],
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