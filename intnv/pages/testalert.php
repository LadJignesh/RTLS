<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
                    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="refresh" content="30">
<style type="text/css">
body {
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:13px;
}
</style>
  <script src="jquery.js"></script>

<link rel="stylesheet" href="style.css" type="text/css">
<div align="center" id="timeval"><?php
date_default_timezone_set("Asia/Kolkata");
//echo date_default_timezone_get();
$date = new DateTime();
//$date->modify('-1 min');
$today_inc=$date->format('d/m/Y H:i:s');
echo $today_inc;
echo "<br>";
$today = date("d/m/Y H:i:s");
//$today="Mon Jun 22 18:15:37 2015";
echo $today;
echo "<br>";
include("config.php");
$sql ="SELECT time FROM rtls ";
echo $sql;
echo "<br>";
$result = $conn->query($sql);
//$array[]=array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		echo  $row["time"]. "<br>";
		if($today_inc==$row["time"]){
			//echo "True";
			break;
		}
		else{
			$from_time=$row["time"];
			$to_time=$today_inc;
			$stopart=(int)substr($to_time,17);
			$mtopart=(int)substr($to_time,14,18);
			$htopart=(int)substr($to_time,11,16);
			$sfrompart=(int)substr($from_time,17);
			$mfrompart=(int)substr($from_time,14,18);
			$hfrompart=(int)substr($from_time,11,16);
			$clock=($stopart+$mtopart*60+$htopart*3600)-($sfrompart+$mfrompart*60+$hfrompart*3600);
			echo $clock;
			if($clock>=15)
			{
			include('RTLS TEST ALERT.php');
			//echo "RTLS ALERT";
			break;
			}
			else
			{
				break;
			}
			//echo "False";

		}

	}

} else {
    //echo "0 results";

	//echo "False";
}
//print_r($array);
//echo json_encode($array);
//echo date("g:i:s A");
$conn->close();
?>


</div></strong>
</body>
</html>
