

	  <?php
	  		//include("indexloading.php");
			include("header1.php");

	  ?>
   <!--end of nava bar-->

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">RTLS USER REGISTRATION FORM</h1>
					<form name="myForm" action="rtls_user_reg.php" onSubmit="return validateForm(this)"  method="POST" id="myForm">
  <div class="form-group">
    <label for="First Name">First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="First Name">
  </div>
  <div class="form-group">
    <label for="Middle Name">Middle Name</label>
    <input type="text" class="form-control" name="mname" placeholder="Middle name">
  </div>
  <div class="form-group">
    <label for="Last Name">Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Last name">
  </div>
  <div class="form-group">
    <label for="Username">Userame</label>
    <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
 	<div class="form-group">
    <label for="Password">Password</label>
    <input type="password" class="form-control" name="passwd" placeholder="Password">
  </div>
  <div class="form-group">
      <label for="gender">Gender:&nbsp;&nbsp;&nbsp;</label>
      <input type="radio" name="gender" value="male"><label>Male</label>&nbsp;&nbsp;&nbsp;
      <input type="radio" name="gender" value="female"><label>Female</label>
  </div>
  <div class="form-group">
      <label for="address">Address:</label>
      <textarea class="form-control" row="5"  name="address"></textarea>
  </div>
  <div class="form-group">
      <label for="contact">Contact</label>
      <input type="number" class="form-control" name="contact">
  </div>
  <div class="form-group">
    <label for="Control_room_no">Control Room No.</label>
    <input type="text" class="form-control" name="ctrl_room_no" placeholder="Control Room No.">
  </div>
  <div class="form-group">
    <label for="jetty">Jetty Assigned</label>
    <input type="text" class="form-control" name="jetty" placeholder="Jetty Assigned">
  </div>
  <div class="form-group">
    <label for="Registration Date">Registration Date</label>
    <input type="date"  class="form-control" name="reg_date">
  </div>
   <div class="form-group">
      <label for="ren_date">Renewal Date</label>
      <input type="date"  class="form-control" name="ren_date">
  </div>
  <div class="form-group">
        <label for="tag_ass">Tag Assigned</label>
        <input type="text"  class="form-control" name="tag_ass">
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
