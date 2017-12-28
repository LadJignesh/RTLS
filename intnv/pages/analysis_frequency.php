<!DOCTYPE>
<html>
<head>


                        <div class="panel-body">
                            <div class="dataTable_wrapper">
								<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

</head>
<body>

<?php
//include("indexloading.php");
include("header.php");
?>
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Analyse Counts of Boats</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div id="latestData" >
			<div class ="row">
			<div class="col-lg-2">
			                      <form data-toggle="validator" class="form-horizontal" role="form" name="disable" style="margin-top:20px;" action="analysis_frequency.php" method="post" id="disable" enctype="multipart/form-data">
													  <div class="form-group">
													  <label for="from">From</label>
													  <input type="text" name="from" id="from">
													</div>
													  <div class="form-group">
													  <label for="to">To</label>
													  <input type="text" name="to" id="to">
													</div>
													   <div class="form-group" align="right">
													  <button  id="submit" value="submit" class="btn btn-primary" >Submit</button>
														</div>
								  </form>

					  </div>
			</div>
            <div class="row">
                <div class="col-lg-12">
                        <!-- /.panel-heading -->
							<?php
								//$random=rand(10,20);
								//echo "The random number is".$random;

									$servername = "localhost";
									$username = "root";
									$password = "";
									$dbname = "rtls1";

									// Create connection
									$conn = new mysqli($servername, $username, $password, $dbname);
									// Check connection
									if ($conn->connect_error) {
										die("Connection failed: " . $conn->connect_error);
									}

									if(isset($_POST["from"]) && isset($_POST["to"]))
									{
										$sql = "SELECT * FROM rtls, company where time between '".$_POST["from"]."' AND '".$_POST["to"]."' and rtls.rfid_no=company.rfid_tag_assigned";
					//					echo $sql;
										$result = $conn->query($sql);

										if ($result->num_rows > 0) {
											echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead><tr><th>Company Name / Owner Name</th><th>Boat Registration Number</th><th>RFID TAG NO</th><th>Time of Reading</th><th>Count of violation</th><th>Duration of violation</th></tr></thead>';
											echo "<tbody>";
											// output data of each row
											while($row = $result->fetch_assoc()) {
												echo "<tr><td>".$row["company_name"]."</td><td>".$row["boat_registration_no"]."</td><td>".$row["rfid_no"]."</td><td>".$row["time"]."</td><td>".$row["count"]."</td><td>".$row["duration"]."</td></tr>";
											}
											echo "</tbody>";
											echo "</table>";
										} else {
											echo "Something error displaying result as zero";
										}
									}
									else
									{
										$sql = "SELECT * FROM rtls,company where rtls.rfid_no=company.rfid_tag_assigned";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead><tr><th>Company Name / Owner Name</th><th>Boat Registration Number</th><th>RFID TAG NO</th><th>Time of Reading</th><th>Count of violation</th><th>Duration of violation</th></tr></thead>';
											echo "<tbody>";
											// output data of each row
											while($row = $result->fetch_assoc()) {
												echo "<tr><td>".$row["company_name"]."</td><td>".$row["boat_registration_no"]."</td><td>".$row["rfid_no"]."</td><td>".$row["time"]."</td><td>".$row["count"]."</td><td>".$row["duration"]."</td></tr>";
											}
											echo "</tbody>";
											echo "</table>";
										} else {
											echo "Something error displaying result as zero";
										}
									}
									$conn->close();
									?>
								</div>
								<!-- DataTables JavaScript -->
								<script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
								<script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
								<script src="../bower_components/jquery/dist/jquery.min.js"></script>

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
								<script>
								$(document).ready(function() {
									$('#dataTables-example').DataTable({
											responsive: true
									});
								});
								</script>
                            <!-- /.table-responsive -->
                            <!-- /.table-responsive -->

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
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
    </script>

</body>

</html>
