
        $(document).ready(function () {
            superIncomeYear();
        });


        function superIncomeYear()
        {
            {
                $.post("superDataIncome.php",
                function (data)
                {
                    console.log(data);
                     var Months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                     
                    var incomeSame = [];
                    var incomeNot = [];
                    let ctr = '<?php echo $ctr?>';
                   /* alert(ctr);*/
                    let num = 0;
                    let num2 = 0;
                    let counter = 0;
                    for(let index in data){
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
                        
                        /*num = 0;*/
                           
                    }
                    	
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
                                data: incomeSame,incomeNot
                            }
                        ]
                    };

                    var graphTarget = $("#superIncomeYear");

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