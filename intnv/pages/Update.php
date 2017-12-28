



	  <?php
	  		//include("indexloading.php");
			include("header1.php");

	  ?>
   <!--end of nava bar-->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">UPDATE USER INFORMATION</h1>
                    <?php
					include("config.php");
					$sql="Select * from registration_form where fname='".$_GET["fname"]."' and mname='".$_GET["mname"]."' and lname='".$_GET["lname"]."'";
					echo $sql;


					$result=$conn->query($sql);

					if($result->num_rows>0){
					$_SESSION["firstname"]=$_GET["fname"];
					$_SESSION["middlename"]=$_GET["mname"];
					$_SESSION["lastname"]=$_GET["lname"];
					while($row=$result->fetch_assoc()){
					$address= $row["address"];
					$contact= $row["contact"];
					$ctrl_room_no= $row["ctrl_room_no"];
					$jetty= $row["jetty"];
					$ren_date= $row["ren_date"];

?>
					<form name="myForm" action="rtls_user_update.php" onSubmit="return validateForm(this)"  method="GET" id="myForm">

  <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
  </div>
  <div class="form-group">
      <label for="contact">Contact</label>
      <input type="number" class="form-control" name="contact" value="<?php echo $row['contact'];?>">
  </div>
  <div class="form-group">
    <label for="Control_room_no">Control Room No.</label>
    <input type="text" class="form-control" name="ctrl_room_no" value="<?php echo $row['ctrl_room_no'];?>v">
  </div>
  <div class="form-group">
    <label for="jetty">Jetty Assigned</label>
    <input type="text" class="form-control" name="jetty" value="<?php echo $row['jetty'];?>">
  </div>

   <div class="form-group">
      <label for="ren_date">Update Date</label>
      <input type="date"  class="form-control" name="ren_date" value="<?php echo $row['ren_date'];?>">
  </div>


  <div class="form-group">
  <button type="submit" value="Submit" class="btn btn-default">Submit</button>
  </div>
</form>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>


</html>
<?php
}}
else{
echo "Some error occured. Contact Administrator";
}


