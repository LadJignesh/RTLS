<?php
include("header.php");
?>
<div id="page-wrapper">
		            <div class="row">
		            	<div class="col-lg-12" >
		                    <h1 class="page-header">Change Password for <?php echo $_SESSION["login_username"]; ?></h1>
		                    <div class="row">
		                    <br>
		                    <div class="col-lg-4">
		                    <?php
//include("config.php");

//echo $_SESSION["login_username"];


    // Connect to the database
    $con = mysql_connect("localhost","root","");
    // Make sure we connected succesfully
    if(! $con)
    {
        die('Connection Failed'.mysql_error());
    }

    // Select the database to use
    mysql_select_db("rtls1",$con);

    if($_POST["passwd"]==$_POST["confirm_passwd"])
    {

		mysql_query("Update registration_form set passwd = '".$_POST["passwd"]."' where username = '".$_GET["login_name"]."'");

		echo "<span style='color:Red'>Password Updated Successfully</span><br>";
		echo "Click <a href='index.php'>Here</a> to go to your dashboard";




	}
    else
    {
    	echo "<h1>Password Updation Failed</h1>";
    }

?>
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



