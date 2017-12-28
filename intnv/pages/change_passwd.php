	  <?php
	  		//include("indexloading.php");
			include("header.php");
	  ?>
   <!--end of nava bar-->

        <div id="page-wrapper">
            <div class="row">
            	<div class="col-lg-12" >
                    <h1 class="page-header">Change Password for <?php echo $_SESSION["login_username"]; ?></h1>
                    <div class="row">
                    <br><br>
                    <div class="col-lg-4">
					<form data-toggle="validator" class="form-horizontal" role="form" name="disable" style="margin-top:20px;" action="process_password.php?login_name=<?php echo $_SESSION['login_username'];?>" method="post" id="disable" enctype="multipart/form-data">
					  <div class="form-group">
					  <label for="passwd">Password</label>

					  <input type="text" name="passwd" id="passwd"></div>

					  <div class="form-group">
					  <label for="confirm_passwd">Confirm Password</label>

					  <input type="text" name="confirm_passwd" id="confirm_passwd">

					</div>

					   <div class="form-group">
					  <button  id="submit" value="submit" class="btn btn-primary" >Submit</button>
						</div>
				  </form>

                    </div>
                    </div>
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
