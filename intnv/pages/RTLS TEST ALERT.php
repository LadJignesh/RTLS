<!DOCTYPE>


<script src="jquery/jquery-1.10.2.min.js"></script>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <link href="bootstrap-dialog/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" />
        <script src="bootstrap-dialog/js/bootstrap-dialog.min.js"></script>



<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"> </script>

<div id="modal-container"></div>
        <script type="text/javascript">
            /**
             * This example demonstrates how to append modal stuff to a div other than body.
             */   
			 $(document).ready(function(){
    var refreshId = setInterval(function(){ //SYNTAX ERROR HERE
        $.load('monitoring.php');
    	}, 1000);
	});
        
            $(function() {
                var types = [ BootstrapDialog.TYPE_DANGER];
                     
        $.each(types, function(index, type){
            BootstrapDialog.show({
                type: type,
                title: 'ERROR: ' + type,
                message: 'Tag stopped Reading?',
                buttons: [{
                    label: '<a href="notifications.php">Go to notifications</a>'
                }]
            });     
        });
                dialog.realize();
                $('#modal-container').append(dialog.getModal());
                dialog.open();
            });
        </script>
