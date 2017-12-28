<?php

 /* Include the `includes/fusioncharts.php` file that contains functions to embed the charts.*/

   include("includes/fusioncharts.php");

  /* The following 4 code lines contains the database connection information. Alternatively, you can move these code lines to a separate file and include the file here. You can also modify this code based on your database connection.   */

   $hostdb = "localhost";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "Fusion@123";  // MySQL password
   $namedb = "rtls1";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

  /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if ($dbhandle->connect_error) {
  	exit("There was an error with your connection: ".$dbhandle->connect_error);
   }
?>
<html>
   <head>
  	<title>FusionCharts XT - Column 2D Chart</title>
  	<link  rel="stylesheet" type="text/css" href="css/style.css" />

	  <!--  Include the `fusioncharts.js` file. This file is needed to render the chart. Ensure that the path to this JS file is correct. Otherwise, it may lead to JavaScript errors. -->

  	<script src="fusioncharts/fusioncharts.js"></script>
   </head>
   <body>
  	<?php

     	// Get the country code from the GET parameter
     	$countryCode = $_GET["Country"];

     	// Form the SQL query that returns the top 10 most populous cities in the selected country
     	$cityQuery = "SELECT rfid_no, count FROM rtls";

     	// Prepare the query statement
     	$cityPrepStmt = $dbhandle->prepare($cityQuery);

     	// If there is an error in the statement, exit with an error message
     	if($cityPrepStmt === false) {
        	exit("Error while preparing the query to fetch data from City Table. ".$dbhandle->error);
     	}

     	// Bind the parameters to the query prepared
     	$cityPrepStmt->bind_param("s", $countryCode);

     	// Execute the query
     	$cityPrepStmt->execute();

     	// Get the results from the query executed
     	$cityResult = $cityPrepStmt->get_result();

     	// If the query returns a valid response, prepare the JSON string
     	if ($cityResult) {

        	/* Form the SQL query that will return the country name based on the country code. The result of the above query contains only the country code. The country name is needed to be rendered as a caption for the chart that shows the 10 most populous cities */

        	$countryNameQuery = "SELECT rfid_no,count FROM rtls;

        	// Prepare the query statement
        	$countryPrepStmt = $dbhandle->prepare($countryNameQuery);

        	// If there is an error in the statement, exit with an error message


        	// Execute the query
        	$countryPrepStmt->execute();

        	// Bind the country name to the variable `$countryName`
        	$countryPrepStmt->bind_result($countryName);

        	// Fetch the result from prepared statement
        	$countryPrepStmt->fetch();

        	// The `$arrData` array holds the chart attributes and data
        	$arrData = array(
                "chart" => array(
                    "caption" => "Top 10 Most Populous Cities in ".$countryName,
                    "paletteColors" => "#0075c2",
                    "bgColor" => "#ffffff",
                    "borderAlpha"=> "20",
                    "canvasBorderAlpha"=> "0",
                    "usePlotGradientColor"=> "0",
                    "plotBorderAlpha"=> "10",
                    "showXAxisLine"=> "1",
                    "xAxisLineColor" => "#999999",
                    "showValues"=> "0",
                    "divlineColor" => "#999999",
                    "divLineIsDashed" => "1",
                    "showAlternateHGridColor" => "0"
              	)
           	);

        	$arrData["data"] = array();

	// Push the data into the array
        	while($row = $cityResult->fetch_array()) {
                array_push($arrData["data"], array(
              	"label" => $row["rfid_no"],
              	"value" => $row["count"]
              	)
           	);
        	}

           /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        	$jsonEncodedData = json_encode($arrData);

      	  /*Create an object for the column chart using the FusionCharts PHP class constructor. Syntax for the constructor is `FusionCharts("type of chart", "unique chart id", "width of chart", "height of chart", "div id to render the chart", "data format", "data source")`.*/

        	$columnChart = new FusionCharts("column2D", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);

        	// Render the chart
        	$columnChart->render();

        	// Close the database connection
        	$dbhandle->close();
     	}
  	?>

  	<a href="country.php">Back</a>
  	<div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
</html>