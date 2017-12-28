<?php

include("config.php");

function time_diff($from_time, $to_time){
$stopart=(int)substr($to_time,17);
$mtopart=(int)substr($to_time,14,18);
$htopart=(int)substr($to_time,11,16);
$sfrompart=(int)substr($from_time,17);
$mfrompart=(int)substr($from_time,14,18);
$hfrompart=(int)substr($from_time,11,16);
$clock=($stopart+$mtopart*60+$htopart*3600)-($sfrompart+$mfrompart*60+$hfrompart*3600);
return $clock;
}

$sql="Select * from rtls";
$arr=array();

$result = $conn->query($sql);

if ($result->num_rows >= 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {


							$arr[]=$row["rfid_no"];

						}
						//print_r($arr);
						$size=sizeOf($arr);
						//echo "<br>";
						$arr_new=array();
						for($i=0;$i<sizeOf($arr);$i++)
						{
							//$va=$arr[$i];
							if($arr[$i]!=$arr[$i+1])
							{
								$arr_new[]=$arr[$i];
							}
							else
							{
								$i+1;
							}

						}
						//print_r($arr);
						//print_r($arr_new);
						}else {
							//echo "0 results";


						}
						//$arr_new=array();
						$arr_time=array();
						for($j=0; $j<sizeOf($arr_new);$j++)
						{
							$sql_query="Select * from rtls where rfid_no = ".$arr_new[$j];

							$res = $conn->query($sql_query);
							//echo "<br>";
							echo "Readings of ".$arr_new[$j]."<br>";
							if ($res->num_rows >= 0) {
														// output data of each row
								while($rw = $res->fetch_assoc()) {

									 $arr_time[]=$rw["time"];
									//echo "<br>";

						}
						$arr_dur=array();
						
						print_r($arr_time);
						
						//print_r($arr_new);
						echo "<br>";
						for($k=0;$k<sizeOf($arr_time);$k++)
						{
							$timediff=time_diff($arr_time[$k],$arr_time[$k+1]);
							echo $timediff;
							echo "<br><br>";
							if($timediff>6)
							{
								/*$sql = "INSERT INTO time_analysis (rfid_tag_no, time_to, duration)
								VALUES ('$','$arr_time[$k]','$timediff')";
								
								echo "insert values to database is ".$timediff;

								if ($conn->query($sql) === TRUE) {
								    echo "New record created successfully";
								} else {
								    echo "Error: " . $sql . "<br>" . $conn->error;
								}
								*/
								
								

							}
							else
							{
								echo "continue";
							}


							$k=$k+1;
						}
						$arr_time=array();
						
												}
						else {
													//echo "0 results";


						}
						}
                          
						$conn->close();?>












