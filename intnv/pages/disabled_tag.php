<!DOCTYPE>
<html>
<head>


                        <div class="panel-body">
                            <div class="dataTable_wrapper">
								
</head>
<body>
<?php
include("header1.php");
?>


	
	<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Disabled Tags Information</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
			<div id="latestData" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Table showing disabled tags
                        </div>
						<div class="panel-body">
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
									
									$sql = "SELECT * FROM disabled_tags";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
										echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead><tr><th>Tag_No</th><th>Actions</th><th>Description</th><th>controller_name</th><th>time</th></tr></thead>';
										echo "<tbody>";
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<tr><td>".$row["Tag_No"]."</td><td>".$row["Actions"]."</td><td>".$row["description"]."</td><td>".$row["controller_name"]."</td><td>".$row["time"]."</td></tr>";
										}
										echo "</tbody>";
										echo "</table>";
									} else {
										echo "Something error displaying result as zero";
									}
									$conn->close();
									?>
									</div>
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
							</div>
							</div>
							
                            <!-- /.table-responsive -->
                           
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
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
