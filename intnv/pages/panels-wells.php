<?php
include("header.php");
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">RFID TAG DETAILS</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                <!-- /.col-lg-4 -->
<?php
include("config.php");
					  $sql="Select * from datas";
					  $result = $conn->query($sql);

if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
//echo $row['rfid_no'];
?>
<div class="col-lg-4">

                    <div class="panel panel-primary">

<div class="panel-heading">


<a href="details.php?id=<?php echo $row['rfid_no'];?>" style="color:#FFFFFF"><?php echo $row['rfid_no']?></a>


</div>


<div class="panel-body">


<p>Latest Reading Time: <?php echo $row['time']; ?></p>








</div>


</div>


</div>

<?php
}

						} else {
							//echo "0 results";

							echo "<span style='color:Red'><b>No Tags were found</b></span>";
						}

						$conn->close();	 ?>
                <!-- /.col-lg-4 -->

                <!-- /.col-lg-4 -->
            </div>
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
