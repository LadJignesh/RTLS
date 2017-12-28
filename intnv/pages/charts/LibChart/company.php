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

	//query all records from the database
	$query = "Select * from company, rtls where time between '".convertformat($_GET["from"])."' and '".convertformat($_GET["to"])."' and company.rfid_tag_assigned=rtls.rfid_no and company_name = '".$_GET["dur"]."'";


	//execute the query
	$result = $mysqli->query( $query );

	//get number of rows returned
	$num_results = $result->num_rows;

	$arr1=array();
	$arr2=array();
	$arr3=array();

	if( $num_results > 0){

		while( $row = $result->fetch_assoc() )
		{
			extract($row);
					if($duration<15)
					{
						$arr1[]=$duration;
					}
					else if($duration>=15 && $duration<=30)
					{
						$arr2[]=$duration;
					}
					else if($duration>30)
					{
						$arr3[]=$duration;
					}


}

		$dataSet->addPoint(new Point("Less than one hour", sizeOf($arr1)));
		$dataSet->addPoint(new Point(" Between one to four hours", sizeOf($arr2)));
		$dataSet->addPoint(new Point("More than four hours", sizeOf($arr3)));




		//finalize dataset
		$chart->setDataSet($dataSet);

		//set chart title
		$chart->setTitle("Violation Status");

		//render as an image and store under "generated" folder
		$chart->render("generated/1.png");

		//pull the generated chart where it was stored
		echo "<img alt='Pie chart'  src='generated/1.png' style='border: 1px solid gray;'/>";

	}else{
		echo "No data found for your given query";
	}
?>

</body>
</html>
