
<div align="center" id="monitoring"></div>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> </script>
 <script type="text/javascript">   
			 $(document).ready(function(){
    var refreshId = setInterval(function(){ //SYNTAX ERROR HERE
        $('#monitoring').load('monitoring.php?randval='+ Math.random());
    	}, 1000);
	});
	
	</script>
	
	<div align="center" id="monitoring"></div>