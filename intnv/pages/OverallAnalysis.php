

	  <?php

			include("header.php");

	  ?>
   <!--end of nava bar-->

        <div id="page-wrapper">
            <div class="row">
            	<div class="col-lg-12">
                    <h1 class="page-header">Analyse Boats / Overall </h1>
                    <div class="col-lg-3">
				  <form data-toggle="validator" class="form-horizontal" role="form" name="disable" style="margin-top:20px;" action="/intnv/pages/charts/LibChart/third.php" method="get" id="disable" enctype="multipart/form-data">
									  <div class="form-group">
									  <label for="dur">Intensity of violation</label>
									  <select class="form-control" id="dur" name="dur">
										<option value="na">select</option>
										<option value="1">Caution</option>
										<option value="2">Warning</option>
										<option value="3">Danger</option>
									  </select>
										</div>
									  <div class="form-group">
										<label for="from">From</label>
										  <div class='input-group date' id='fromdt'>
											  <input type='text' class="form-control" id="from" name="from" />
											  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
											  </span>
										  </div><br>
										</div>
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

</body>


</html>
