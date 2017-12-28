<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Pie Chart Demo (LibChart)- http://codeofaninja.com/</title>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15" />
</head>
<body>

<?php

function convertformat($dt)
		{

			$a = date('D', strtotime($dt));
			$m = date('M', strtotime($dt));
			//echo $a ;
			//echo " " ;
			//echo $m ;
			//echo " " ;
			//echo substr($dt,0,2);
			//echo " " ;
			//echo substr($dt,11);
			//echo " " ;
			 substr($dt,6,5);
			//echo $returnfrom;
			$returnvalue=$a." ".$m." ".substr($dt,0,2)." ".substr($dt,11)." ".substr($dt,6,5);
			//echo $returnvalue;
			return $returnvalue;
}
	//include the library
	include "libchart/libchart/classes/libchart.php";

	//new pie chart instance
	$chart = new PieChart( 1000, 600 );

	//data set instance
	$dataSet = new XYDataSet();

	//actual data
	//get data from the database

	//include database connection
	include 'db_connect.php';
if(isset($_GET['dur']))
{
	if($_GET['dur']== '1')
	{
	//query all records from the database
	$query = "select company_name, count(duration) as per FROM rtls, company where rtls.rfid_no=company.rfid_tag_assigned and duration < 15 AND time BETWEEN '".convertformat($_GET["from"])."' and '".convertformat($_GET["to"])."' GROUP BY(company_name)";



	//execute the query
	$result = $mysqli->query( $query );

	//get number of rows returned
	$num_results = $result->num_rows;


	if( $num_results > 0){

		while( $row = $result->fetch_assoc() )
		{
			extract($row);


						$dataSet->addPoint(new Point("{$company_name}", $row['per']));



}
		//finalize dataset
		$chart->setDataSet($dataSet);

		//set chart title
		$chart->setTitle("Violation Status");

		//render as an image and store under "generated" folder
		$chart->render("generated/1.png");

		//pull the generated chart where it was stored
		echo "<img alt='Pie chart'  src='generated/1.png' style='border: 1px solid gray;'/>";

	}else{
		echo "No data available for your given query.";
	}
	}
	else if($_GET['dur']=='2')
	{
	$query = "select company_name, count(duration) as per FROM rtls, company where rtls.rfid_no=company.rfid_tag_assigned and duration > 15 AND duration < 30 AND time BETWEEN '".convertformat($_GET["from"])."' and '".convertformat($_GET["to"])."' GROUP BY(company_name)";


		//execute the query
		$result = $mysqli->query( $query );

		//get number of rows returned
		$num_results = $result->num_rows;


		if( $num_results > 0){

			while( $row = $result->fetch_assoc() )
			{
				extract($row);


							$dataSet->addPoint(new Point("{$company_name}", $row['per']));



	}
			//finalize dataset
			$chart->setDataSet($dataSet);

			//set chart title
			$chart->setTitle("Violation Status");

			//render as an image and store under "generated" folder
			$chart->render("generated/1.png");

			//pull the generated chart where it was stored
			echo "<img alt='Pie chart'  src='generated/1.png' style='border: 1px solid gray;'/>";

		}else{
			echo "No data available for your given query.";
	}
	}
	else if ($_GET['dur']=="3")
	{
		$query = "select company_name, count(duration) as per FROM rtls, company where rtls.rfid_no=company.rfid_tag_assigned and duration >30 AND time BETWEEN '".convertformat($_GET["from"])."' and '".convertformat($_GET["to"])."' GROUP BY(company_name)";


	//execute the query
	$result = $mysqli->query( $query );

	//get number of rows returned
	$num_results = $result->num_rows;


	if( $num_results > 0){

		while( $row = $result->fetch_assoc() )
		{
			extract($row);


						$dataSet->addPoint(new Point("{$company_name}", $row['per']));



}
		//finalize dataset
		$chart->setDataSet($dataSet);

		//set chart title
		$chart->setTitle("Violation Status");

		//render as an image and store under "generated" folder
		$chart->render("generated/1.png");

		//pull the generated chart where it was stored
		echo "<img alt='Pie chart'  src='generated/1.png' style='border: 1px solid gray;'/>";

	}else{
		echo "No data available for your given query.";
	}
	}


	}
	else
	{
	   echo "Select The intensity of violation";
	}
?>

</body>
</html>
