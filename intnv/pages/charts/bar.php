//<?php

/* Include the `fusioncharts.php` file that contains functions	to embed the charts. */

  // include("fusioncharts.php");
  //header("Content-Type: text/html;"); //gives the output in html format

/* The following 4 code lines contain the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection. */

   //$hostdb = "localhost";  // MySQl host
  // $userdb = "root";  // MySQL username
  // $passdb = "";  // MySQL password
   //$namedb = "rtls1";  // MySQL database name

   // Establish a connection to the database
  // $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
  // echo "connected successfully";

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
  // if ($dbhandle->connect_error) {
  //	exit("There was an error with your connection: ".$dbhandle->connect_error);
  // }
//?>

<html>
   <head>
  	<title>FusionCharts XT - Column 2D Chart - Data from a database</title>
    <link  rel="stylesheet" type="text/css" href="css/style.css" />

  	<!-- You need to include the following JS file to render the chart.
  	When you make your own charts, make sure that the path to this JS file is correct.
  	Else, you will get JavaScript errors. -->

  	<script src="fusioncharts/fusioncharts.js"></script>
  	<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="js/themes/fusioncharts.theme.fint.js"></script>
	<script type="text/javascript">
  </head>

   <body>
  	<?php
  	 include("fusioncharts.php");
	  header("Content-Type: text/html;"); //gives the output in html format


  	 $dbhandle = new mysqli("localhost", "root","" , "rtls1");
   echo "connected successfully";

     	// Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT rfid_no, count FROM datas";

   echo "connected successfully";


     	// Execute the query, or else return the error message.
     	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");

     	if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        echo "rfid_tag_no: " . $row["rfid_no"]."duration " . $row["count"]. "<br>";
		    }
		} else {
		    echo "0 results";
}

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
        	    "chart" => array(
                  "caption" => "Tags",
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
        	echo "Hello";

	// Push the data into the array
        	while($row = mysqli_fetch_array($result)) {
           	array_push($arrData["data"], array(
              	"label" => $row["rfid_tag_no"],
              	"value" => $row["duration"]
              	)
           	);
        	}

        	/*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */


        	$jsonEncodedData = json_encode($arrData);

	/*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/

        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);



        	// Render the chart
        	$columnChart->render();


        	// Close the database connection
        	$dbhandle->close();
     	}

  	?>

  	<div id="chart-1"><!-- Fusion Charts will render here--></div>

   </body>

</html>
