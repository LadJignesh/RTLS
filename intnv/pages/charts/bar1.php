<?php
/* Include the `fusioncharts.php` file that contains functions to embed the charts. */

include("fusioncharts.php");


try {

$hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "rtls1";  // MySQL database name

    //Establish a connection to the database
  $DBH = new mysqli($hostdb, $userdb, $passdb, $namedb);
  echo "connected successfully";

}
catch(PDOException $e) {
echo $e->getMessage();
}

 	$script = file_get_contents("fusioncharts.js");
  	$script1=file_get_contents('fusioncharts.charts.js');
	$script2=file_get_contents('fusioncharts.gantt.js');
	//<script type="text/javascript">



echo "hii";
$sql = "select rfid_tag_no, duration FROM time_analysis";
echo "hii";


$result =$DBH->query($sql)or exit("Error code ({$DBH->errno}): {$DBH->error}");
echo "yo";

if ($result) {


// The `$arrData` array holds the chart attributes and data
$arrData = array(
"chart" => array(
"caption" => "Top 10 Most Populous Countries",
"paletteColors" => "#0075c2",
"bgColor" => "#ffffff",
"borderAlpha"=> "20",
"canvasBorderAlpha"=> "0",
"usePlotGradientColor"=> "0",
"plotBorderAlpha"=> "10",
"showXAxisLine"=> "1",
"xAxisLineColor" => "#999999",
"showValues" => "0",
"divlineColor" => "#999999",
"divLineIsDashed" => "1",
"showAlternateHGridColor" => "0"

)
);

$arrData["data"] = array();



while($row = $result->fetch_assoc()) {


array_push($arrData["data"], array(
"label" => $row["rfid_tag_no"],
"value" => $row["duration"]

));
}

$jsonEncodedData = json_encode($arrData);

$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

// Render the chart
$columnChart->render();

// Close the database connection
$DBH->close();

}
?>


