<HTML>
<HEAD>
<TITLE>Crunchify - Refresh Div without Reloading Page</TITLE>
 
<!--<style type="text/css">
body {
    background-image:
        url('http://cdn3.crunchify.com/wp-content/uploads/2013/03/Crunchify.bg_.300.png');
}
</style>-->
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
    var table = $('#example').DataTable();
 
    $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );
} );
</script>
<script>
    $(document).ready(function(){
        setInterval(function() {
           $("#latestData").load("datatables3.php");
        }, 2000);
    });

</script>
</HEAD>
<BODY>
    <br>
    <br>
    <div id="latestData" align="center"></div>
 
   							
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
									
									$sql = "SELECT * FROM rtls";
									$result = $conn->query($sql);
									
									if ($result->num_rows > 0) {
										echo '<table id="dataTables-example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%"><thead><tr>					                                               tag no.</th><th>time</th><th>count</th></tr></thead>';
										//echo "<tbody>";
										// output data of each row
										while($row = $result->fetch_assoc()) {
											echo "<tr><td>".$row["rfid_no"]."</td><td>".$row["time"]."</td><td>".$row["count"]."</td></tr>";
										}
										echo "</tbody>";
										echo "</table>";
									} else {
										echo "Something error displaying result as zero";
									}
									$conn->close();
									?>
</BODY>
</HTML>