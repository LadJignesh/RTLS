

	  <?php

			include("header.php");

	  ?>
   <!--end of nava bar-->

   <style type="text/css">
       tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }</style>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabular analysis</h1>
                    <div class="row">
                    <div class="col-lg-12">
                      <form data-toggle="validator" class="form-inline" role="form" name="disable" style="margin-top:20px;" action="analysis_time.php" method="post" id="disable" enctype="multipart/form-data">
										  <div class="form-group">
										  <label for="dur">Duration</label>
										  <select class="form-control" id="dur" name="dur">
											<option value="na">select</option>
											<option value="1">Less than one hour</option>
											<option value="2">Less than four hours</option>
											<option value="3">Greater than four hour</option>
										  </select>
										</div>&nbsp;&nbsp;
										<div class="form-group">
										<label for="from">From</label>
										  <div class='input-group date' id='fromdt'>
											  <input type='text' class="form-control" id="from" name="from" />
											  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
											  </span>
										  </div><br>
										</div>


										&nbsp;&nbsp;
										  <div class="form-group">
									<label for="to">To</label>
									  <div class='input-group date' id='todt'>
														  <input type='text' class="form-control" id="to" name="to" />
														  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
														  </span>
													  </div><br>



									  </div>





										   <div class="form-group" align="right">
										  <button  id="submit" value="submit" class="btn btn-primary" >Submit</button>
											</div>
					  </form>

					</div>
					<div class="col-lg-2"><br><br><br><br>
					  </div>
					  </div>
					  <div class="col-lg-11">
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

							include("config.php");
							if(isset($_POST["dur"]) && isset($_POST["from"]) && isset($_POST["to"]))
							{
								$from=convertformat($_POST["from"]);
								$to=convertformat($_POST["to"]);

								if($_POST["dur"]=="1")
								{
									$sql ="SELECT * FROM rtls,company where duration < 15 and company.rfid_tag_assigned=rtls.rfid_no and time BETWEEN '".$from."' and '".$to."'";
									$result = $conn->query($sql);
									if ($result->num_rows > 0) {
										echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">';
											echo '<thead>';
											echo '<tr>';
											echo '<th>Company Name / Owner Name</th>';
											echo '<th>Boat Registration Number</th>';
											echo '<th>RFID TAG NO</th>';
											echo '<th>TIME</th>';
											echo '<th>COUNT</th>';
											echo '<th>DURATION</th>';
											echo '</tr>';
											echo '</thead>';
                                                                                        echo '<tfoot>';
											echo '<tr>';
											echo '<th>Company Name / Owner Name</th>';
											echo '<th>Boat Registration Number</th>';
											echo '<th>RFID TAG NO</th>';
											echo '<th>TIME</th>';
											echo '<th>COUNT</th>';
											echo '<th>DURATION</th>';
											echo '</tr>';
											echo '</tfoot>';
											echo '<tbody>';
										while($row = $result->fetch_assoc()) {
											echo '<tr>';
											echo '<td>'.$row["company_name"].'</td>';
											echo '<td>'.$row["boat_registration_no"].'</td>';
											echo '<td>'.$row["rfid_no"].'</td>';
											echo '<td>'.$row["time"].'</td>';
											echo '<td>'.$row["count"].'</td>';
											echo '<td>'.$row["duration"].'</td>';
											echo '</tr>';
										}
										echo '</tbody>';
											echo '</table>';
									} else {
										//echo "0 results";
										echo "<span style='color:Red'><b>There are no data available...</b></span>";
									}
								}
								else if($_POST["dur"]=="2")
								{
									$sql = "SELECT * FROM rtls,company where duration > 15 and duration < 30 and rtls.rfid_no=company.rfid_tag_assigned and time BETWEEN '".$from."' and '".$to."'";
											$result = $conn->query($sql);
											if ($result->num_rows > 0) {
													echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">';
														echo '<thead>';
														echo '<tr>';
														echo '<th>Company Name / Owners Name</th>';
														echo '<th>Boat Registration Number</th>';
														echo '<th>RFID TAG NO</th>';
														echo '<th>TIME</th>';
														echo '<th>COUNT</th>';
														echo '<th>DURATION</th>';
														echo '</tr>';
														echo '</thead>';
                                                                                                                echo '<tfoot>';
                                                                                                                echo '<tr>';
                                                                                                                echo '<th>Company Name / Owner Name</th>';
                                                                                                                echo '<th>Boat Registration Number</th>';
                                                                                                                echo '<th>RFID TAG NO</th>';
                                                                                                                echo '<th>TIME</th>';
                                                                                                                echo '<th>COUNT</th>';
                                                                                                                echo '<th>DURATION</th>';
                                                                                                                echo '</tr>';
                                                                                                                echo '</tfoot>';
														echo '<tbody>';
													while($row = $result->fetch_assoc()) {
														echo '<tr>';
														echo '<td>'.$row["company_name"].'</td>';
														echo '<td>'.$row["boat_registration_no"].'</td>';
														echo '<td>'.$row["rfid_no"].'</td>';
														echo '<td>'.$row["time"].'</td>';
														echo '<td>'.$row["count"].'</td>';
														echo '<td>'.$row["duration"].'</td>';
														echo '</tr>';
													}
													echo '</tbody>';
														echo '</table>';
													}
													else {
														//echo "0 results";

														echo "<span style='color:Red'><b>There are no data available...</b></span>";
														}
													}
														else if($_POST["dur"]=="na")
														{
															$sql ="SELECT * FROM rtls,company where company.rfid_tag_assigned=rtls.rfid_no and time BETWEEN '".$from."' and '".$to."'";
																							$result = $conn->query($sql);
																							if ($result->num_rows > 0) {
																							echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">';
																									echo '<thead>';
																									echo '<tr>';
																									echo '<th>Company Name / Owners Name</th>';
																									echo '<th>Boat Registration Number</th>';
																									echo '<th>RFID TAG NO</th>';
																									echo '<th>TIME</th>';
																									echo '<th>COUNT</th>';
																									echo '<th>DURATION</th>';
                                                                                                                                                                                                        echo '</tr>';
																									echo '</thead>';
                                                                                                                                                                                                        echo '<tfoot>';
                                                                                                                                                                                                        echo '<tr>';
                                                                                                                                                                                                        echo '<th>Company Name / Owner Name</th>';
                                                                                                                                                                                                        echo '<th>Boat Registration Number</th>';
                                                                                                                                                                                                        echo '<th>RFID TAG NO</th>';
                                                                                                                                                                                                        echo '<th>TIME</th>';
                                                                                                                                                                                                        echo '<th>COUNT</th>';
                                                                                                                                                                                                        echo '<th>DURATION</th>';
                                                                                                                                                                                                        echo '</tr>';
                                                                                                                                                                                                        echo '</tfoot>';
																									echo '<tbody>';
																								while($row = $result->fetch_assoc()) {
																									
																									echo '<tr>';
																									echo '<td>'.$row["company_name"].'</td>';
																									echo '<td>'.$row["boat_registration_no"].'</td>';
																									echo '<td>'.$row["rfid_no"].'</td>';
																									echo '<td>'.$row["time"].'</td>';
																									echo '<td>'.$row["count"].'</td>';
																									echo '<td>'.$row["duration"].'</td>';
																									echo '</tr>';
																								}
																								echo '</tbody>';
																									echo '</table>';
																							} else {
																								//echo "0 results";

																								echo "<span style='color:Red'><b>There are no data available...</b></span>";
}
														}
														else
														{
														$sql ="SELECT * FROM rtls,company where duration > 30 and rtls.rfid_no=company.rfid_tag_assigned and time BETWEEN '".$from."' and '".$to."'";

																				$result = $conn->query($sql);

																				if ($result->num_rows > 0) {
																					echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">';
																						echo '<thead>';
																						echo '<tr>';
																						echo '<th>Company Name / Owners Name</th>';
																						echo '<th>Boat Registration Number</th>';
																						echo '<th>RFID TAG NO</th>';
																						echo '<th>TIME</th>';
																						echo '<th>COUNT</th>';
																						echo '<th>DURATION</th>';
																						echo '</tr>';
																						echo '</thead>';
                                                                                                                                                                                echo '<tfoot>';
                                                                                                                                                                                echo '<tr>';
                                                                                                                                                                                echo '<th>Company Name / Owner Name</th>';
                                                                                                                                                                                echo '<th>Boat Registration Number</th>';
                                                                                                                                                                                echo '<th>RFID TAG NO</th>';
                                                                                                                                                                                echo '<th>TIME</th>';
                                                                                                                                                                                echo '<th>COUNT</th>';
                                                                                                                                                                                echo '<th>DURATION</th>';
                                                                                                                                                                                echo '</tr>';
                                                                                                                                                                                echo '</tfoot>';
																						echo '<tbody>';
																					while($row = $result->fetch_assoc()) {
																						echo '<tr>';
																						echo '<td>'.$row["company_name"].'</td>';
																						echo '<td>'.$row["boat_registration_no"].'</td>';
																						echo '<td>'.$row["rfid_no"].'</td>';
																						echo '<td>'.$row["time"].'</td>';
																						echo '<td>'.$row["count"].'</td>';
																						echo '<td>'.$row["duration"].'</td>';
																						echo '</tr>';


																																				}
																																				echo '</tbody>';

																																					echo '</table>';
																																					}
																					 else {
																						//echo "0 results";

																						echo "<span style='color:Red'><b>There are no data available...</b></span>";
																					}
								}

							}
							else
							{
							   echo "Select the required field";
}

														$conn->close();
						?>
					  </div>
					  								<!-- Bootstrap Core JavaScript -->
					  								<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
													<script src="../bower_components/jquery/dist/jquery.min.js"></script>
					  								<!-- Metis Menu Plugin JavaScript -->
					  								<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

					  								<!-- DataTables JavaScript -->
					  								<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
					  								<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

					  								<!-- Custom Theme JavaScript -->
					  								<script src="../dist/js/sb-admin-2.js"></script>

					  								<!-- Page-Level Demo Scripts - Tables - Use for reference -->
					  								<script>
					  								$(document).ready(function() {
					  									$('#dataTables-example').DataTable({
					  											responsive: true
					  									});
					  								});
                                                                                                        $(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#dataTables-example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#dataTables-example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
} );
								</script>
								<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
								<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
								<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
								<script src="build/js/bootstrap-datetimepicker.min.js"></script>

								<script type="text/javascript">
								$(function () {
								$('#fromdt').datetimepicker({
								format : "DD-MM-YYYY HH:mm:ss"
								});
								});
								</script>

								<script type="text/javascript">
									  $(function () {
										  $('#todt').datetimepicker({
											format : "DD-MM-YYYY HH:mm:ss"
										  });
									  });
        								</script>

                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->



									<!-- Bootstrap Core JavaScript -->
									<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

									<!-- Metis Menu Plugin JavaScript -->
									<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

									<!-- DataTables JavaScript -->
									<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
									<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

									<!-- Custom Theme JavaScript -->
									<script src="../dist/js/sb-admin-2.js"></script>

									<!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>


</html>
