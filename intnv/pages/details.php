


        <!--nav bar-->
	  <?php
			include("header.php");

			$_SESSION['id']=$_GET['id'];

	  ?>
   <!--end of nava bar-->

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Details of Tag No. <?php echo $_SESSION['id']?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
					<div class="panel panel-primary">
					 <div class="panel-heading">Owner Details:</div>
					 <div class="panel-body">
                      <?php
					  include("config.php");
					  $sql="Select * from registration_form where tag_ass=".$_GET['id'];
//					  echo $sql;
					  $result = $conn->query($sql);
						//$array[]=array();
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {

								echo "<table class='table'>";
								echo  "<tr><th>First Name:</th><td> ".$row['fname']."</td></tr>";
								echo  "<tr><th>Middle Name:</th><td> ".$row['mname']."</td></tr>";
								echo  "<tr><th>Last Name:</th><td> ".$row['lname']."</td></tr>";
								//echo  "<tr><th>Gender:</th><td> ".$row['Gender']."</td></tr>";
								//echo  "<tr><th>Address:</th><td> ".$row['Address']."</td></tr>";
								//echo  "<tr><th>Contact Number:</th><td> ".$row['Contact_No']."</td></tr>";
								echo  "<tr><th>Control Room:</th><td> ".$row['ctrl_room_no']."</td></tr>";
								echo  "<tr><th>Jetty Name:</th><td> ".$row['jetty']."</td></tr>";
								echo  "<tr><th>Registration Date:</th><td> ".$row['reg_date']."</td></tr>";
								echo  "<tr><th>Renewal Date:</th><td> ".$row['ren_date']."</td></tr>";
								echo  "<tr><th>Tag assigned:</th><td> ".$row['tag_ass']."</td></tr>";
								echo "</table>";
								$_SESSION['name']=$row['fname'];
								}

						} else {
							//echo "0 results";

							echo "<span style='color:Red'><b>Owners details not present</b></span>";
						}
						//print_r($array);
						//echo json_encode($array);
						//echo date("g:i:s A");
						$conn->close();
					  ?>
					</div>
                    </div>

                    <!-- /.col-lg-12 -->
                </div>


                    <div class="col-lg-12">
					<div class="panel panel-primary">
					 <div class="panel-heading">Tag Details:</div>
					 <div class="panel-body">
                      <?php
					  include("config.php");
					  $sql="Select * from rtls where rfid_no=".$_GET['id'];
//					  echo $sql;
					  $result = $conn->query($sql);
						//$array[]=array();
						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								echo "<table class='table'>";
								echo  "<tr><th>Tag No:</th><td> ".$row['rfid_no']."</td></tr>";
								echo  "<tr><th>Time of Reading:</th><td> ".$row['time']."</td></tr>";
								echo  "<tr><th>Counts:</th><td> ".$row['count']."</td></tr>";
								echo "</table>";
								}

						} else {
							//echo "0 results";

							echo "<span style='color:Red'><b>Tag disabled and not present in database</b></span>";
						}
						//print_r($array);
						//echo json_encode($array);
						//echo date("g:i:s A");
						$conn->close();
					  ?>
					</div>
                    </div>
					</div>
					<div class="col-lg-12">
					<div class="panel panel-primary">
					 <div class="panel-heading">Tag Behaviour:</div>
					 <div class="panel-body" align="center">
					<button class="btn btn-primary"><a href="bower_components/morrisjs/examples/single_data.php?id=<?php echo $_GET['id']?>" style="color:white;">Show Tag Behaviour</a></button>
					</div>


                    </div>
				</div>
				<div class="col-lg-12">
					<!--<div class="panel panel-primary">-->
					 <!--<div class="panel-heading">Disable Tag:</div>-->
					 <div class="panel panel-primary">
					 <div class="panel-heading">Actions to be performed on Tags:</div>
					 <div class="panel-body" style="padding-left:100px;padding-right:100px;" align="center">
					  <script src="js/validator.js" type="text/javascript"></script>
					  <form data-toggle="validator" class="form-horizontal" role="form" name="disable" style="margin-top:20px;" action="description.php?name=<?php echo $_SESSION['login_username'];?>" method="post" id="disable" enctype="multipart/form-data">
					  <div class="form-group">
					  <label for="act">Actions</label>
					  <select class="form-control" id="act" name="act">
						<option value="na">select</option>
						<option value="Tag Not Found">Tag Not Found</option>
						<option value="Tag Destroyed">Tag Destroyed</option>
						<option value="Tag Out Of Range">Tag Out Of Range</option>
					  </select>
					</div>
					  <div class="form-group">
					  <label for="description">Description:</label>
					  <textarea class="form-control" name="description" class="form-control" rows="5" id="description" data-error="Please specify the reason for disabling tag" required></textarea>
					  <span class="help-block with-errors"></span>
					  </div>
					   <div class="form-group" align="right">
					  <button  id="submit" value="submit" class="btn btn-primary" >Disable Tag</button>
						</div>
					</div>
					  </form>
					</div>
					</div>
                    <!--</div>-->
					</div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
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

</body>

</html>
