<?php 
$to_time = strtotime("2008-12-13 10:42:00");
$from_time = strtotime("2008-12-13 10:21:00");
echo round(abs($to_time - $from_time) / 60,2). " minute";
echo "<br>";
date_default_timezone_set("Asia/Kolkata");
						//echo date_default_timezone_get();
						$date = new DateTime();
						//$date->modify('-1 min');
						$today_inc=$date->format('d/m/Y H:i:s');
						//$today_inc=strtotime($today_inc);
						
						//$today = date("d/m/Y H:i:s");
						//$today="Mon Jun 22 18:15:37 2015";
						//echo $today;
						//echo "<br>";
include("config.php");
$sql ="SELECT rfid_no, time FROM rtls";
$result = $conn->query($sql);
						
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								


								if($today_inc==$row["time"]){
									echo round(abs(strtotime($today_inc)-strtotime($row['time'])),2);
									//echo "True";
									echo "No tags found to show any error.";
									break;
								}
								else{
									$from_time=$row["time"];
									echo $from_time;
									echo gettype($from_time);
									$to_time=$today_inc;
									echo gettype($to_time);
									echo $to_time."<br>";
									$stopart=(int)substr($to_time,17)."<br>";
									$mtopart=(int)substr($to_time,14,18)."<br>";
									$htopart=(int)substr($to_time,11,16)."<br>";
									echo "<br>";
									$sfrompart=(int)substr($from_time,17)."<br>";
									$mfrompart=(int)substr($from_time,14,18)."<br>";
									$hfrompart=(int)substr($from_time,11,16)."<br>";
									$clock=($stopart+$mtopart*60+$htopart*3600)-($sfrompart+$mfrompart*60+$hfrompart*3600);
									echo $clock;
									break;
								}
							}
						   
						} else {
							//echo "0 results";
							
							echo "<span style='color:Red'><b>There are no tags found</b></span>";
						}
						//print_r($array);
						//echo json_encode($array);
						//echo date("g:i:s A");
						$conn->close();?>