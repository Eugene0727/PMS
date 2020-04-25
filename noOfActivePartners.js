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
                    var name = ['Active', 'Total Business Partner'];
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
                                /*label: 'Number of Active Business Partner',*/
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