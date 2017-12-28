<?php include("header.php");?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Notifications</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Alert Notifications
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
						<?php

						date_default_timezone_set("Asia/Kolkata");
						//echo date_default_timezone_get();
						$date = new DateTime();
						//$date->modify('-1 min');
						$today_inc=$date->format('d/m/Y H:i:s');
						//echo $today_inc;
						//echo "<br>";
						//$today = date("d/m/Y H:i:s");
						//$today="Mon Jun 22 18:15:37 2015";
						//echo $today;
						//echo "<br>";
						include("config.php");
						$sql ="SELECT rfid_no, time FROM datas";
						//echo $sql;
						//echo "<br>";
						$result = $conn->query($sql);
						//$array[]=array();
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							//echo  $row["time"]. "<br>";
								if($today_inc==$row["time"]){
									//echo round(abs($today_inc-$row['time']),2);
									//echo "True";
									echo "No tags found to show any error.";
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


									if($clock>=600 && $clock<=3600)
									{
									echo '<div class="alert alert-success">';
									echo "Caution! ".$row['rfid_no']. " tag not reading for 1 hour";
									echo '<a href="details.php?id='.$row['rfid_no'].'"  class="alert-link" style="margin-left:450px;">See details</a>';
									echo '</div>';
										//echo "False";
									}
									else if($clock>=3600 && $clock<=14400 )
									{
									echo '<div class="alert alert-warning">';
									echo "Warning! ".$row['rfid_no']. " tag not reading for time between 1 to 4 hours";
									echo '<a href="details.php?id='.$row['rfid_no'].'"  class="alert-link" style="margin-left:450px;">See details</a>';
									echo '</div>';
										//echo "False";
									}
									else if($clock>=14400)
									{
									echo '<div class="alert alert-danger">';
									echo "Danger! ".$row['rfid_no']. " tag not reading for over 4 hours ";
									echo '<a href="details.php?id='.$row['rfid_no'].'"  class="alert-link" style="margin-left:450px;">See details</a>';
									echo '</div>';
										//echo "False";
									}
									else
									{
									echo "Wait for a while...";
									break;
									}

								}
							}

						} else {
							//echo "0 results";

							echo "<span style='color:Red'><b>There are no data available...</b></span>";
						}
						//print_r($array);
						//echo json_encode($array);
						//echo date("g:i:s A");
						$conn->close();
						?>


                        </div>
                        <!-- .panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

            </div>
            <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Notifications - Use for reference -->
    <script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })

    // popover demo
    $("[data-toggle=popover]")
        .popover()
    </script>

</body>

</html>
