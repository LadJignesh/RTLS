<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rtls1";

function pattern($diff)
{
$rec=0;
$ans=0;
if($diff==0)
{
 	$rec=0;
}
else
{
	$rec=1/$diff;
}
$ans=$rec*10;
return $ans;
}
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * from rtls where rfid_no=4510025";
$result = $conn->query($sql);
$sql1 = "SELECT * from rtls where rfid_no=4510025 LIMIT 1";
$result1 = $conn->query($sql1);
 while($row1 = $result1->fetch_assoc()) {
       $init=$row1["time"];
	 }

if ($result->num_rows > 0) {
	echo $init;
	echo "<br>";
	$time_diff=array();
	$time_array=array();
    // output data of each row
    while($row = $result->fetch_assoc()) {
      	
		$rec=(int)$row["rfid_no"];
		$timestamp=$row["time"];
		$c=(int)$row["count"];
		$hr_prev=(int)substr($init,11,2);
		$min_prev=(int)substr($init,14,2);
		$sec_prev=(int)substr($init,17,2);
		$times_prev=$hr_prev*3600+$min_prev*60+$sec_prev;
		echo "<br>";
		echo "Prev ";
		echo $times_prev."<br>";
		$hr=(int)substr($timestamp,11,2);
		$min=(int)substr($timestamp,14,2);
		$sec=(int)substr($timestamp,17,2);
		$times=$hr*3600+$min*60+$sec;
		echo "Next ";
		echo $times."<br>";
		$res=$times-$times_prev;
		echo pattern($res);
		$time_diff[]=pattern($res);
		$time_array[]=$timestamp;
		echo "<br>";
		$init=$timestamp;
		
    }
	echo "Y-axis--> ";
	print_r($time_diff);   //y-axis convert to json
	echo "<br>";
	echo "X-axis--> ";
	print_r($time_array);  //x-axis convert to json
	echo "<br>";
} else {
    echo "0 results";
}

$conn->close();
?>