<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>plus2net.com : Pie chart using data from MySQL table</title>
</head>
<body >
<?Php
require "includes/dbconnection.php";// Database connection

if($stmt = $con->query("SELECT profitDate,Income FROM tblProfit")){

/*  echo "No of records : ".$stmt->num_rows."<br>";*/
$php_data_array = Array(); // create PHP array
 /* echo "<table>
<tr> <th>Month</th><th>Sale</th><th>Profit</th></tr>";*/
while ($row = $stmt->fetch_row()) {
  /* echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";*/
   $php_data_array[] = $row; // Adding to array
   }
// echo "</table>";
}else{
echo $connection->error;
}
//print_r( $php_data_array);
// You can display the json_encode output here. 
/*echo json_encode($php_data_array); */

// Transfor PHP array to JavaScript two dimensional array 
echo "<script>
        var my_2d = ".json_encode($php_data_array)."
</script>";
?>


<div id="chart_div"></div>
<br><br>
<a href=https://www.plus2net.com/php_tutorial/chart-column-database.php>Column Chart from MySQL database</a>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {packages: ['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);
	  
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Date');
        data.addColumn('number', 'Income');
        for(i = 0; i < my_2d.length; i++)
    data.addRow([my_2d[i][0], parseInt(my_2d[i][1])]);
       var options = {
          title: 'plus2net.com Sale Profit',
          hAxis: {title: 'Date',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.charts.Bar(document.getElementById('chart_div'));
        chart.draw(data, options);
       }
	///////////////////////////////
////////////////////////////////////	
</script>
</body></html>







