<?php
include("header.php");
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Registration Form</title>
<script type="text/javascript"
src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js">
</script>

</head>
<body>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Registration Form</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div> 
                <h4>Please fill in the details carefully.No field should be left empty.</h4>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Owner's Details
                        </div>
                        <div class="panel-body">
                          
                             
                                    <form role="form" id="regform" method="post" action="RegForm_Registration.php">

                                    <div class="row">
                                     <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input class="form-control" name="First_Name" required placeholder="Enter your First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Middle Name</label>
                                            <input class="form-control" name="Middle_Name"required placeholder="Enter your Middle Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input class="form-control" name="Last_Name" required placeholder="Enter your Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Address</label>
                                            <textarea class="form-control" name="Address" required rows="3" placeholder="Enter your address"></textarea>
                                        </div>
                                    </div>
                                </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Gender</label>
                                            <label class="radio-inline">
                                                <input type="radio" required name="Gender" id="optionsRadiosInline1" value="Male" checked>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" required name="Gender" id="optionsRadiosInline2" value="Female">Female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" required name="Gender" id="optionsRadiosInline3" value="Other">Other
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Enter your Contact Number</label>
                                            <input class="form-control" name="Contact_No" required>
                                        </div>
                                    </div>
                                </div>
                            
                               
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    

 <!-- /.row -->
 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Boat Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Registration Number</label>
                                            <input class="form-control" name="Reg_No" required placeholder="Enter the Registration Number of your boat">
                                        </div>
                                        <div class="form-group">
                                            <label>Name of Jetty</label>
                                            <input class="form-control" name="Jetty_Name"required placeholder="Enter the name of the Jetty">
                                        </div>
                                        <div class="form-group">
                                            <label>Registration  Date of your Boat</label>
                                            <input class="form-control" name="Reg_Date" required placeholder="yyyy/mm/dd">
                                        </div>
                                        <div class="form-group">
                                            <label>Renewal  Date of your Boat</label>
                                            <input class="form-control" name="Ren_Date" required placeholder="yyyy/mm/dd">
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>


                        <!-- /.row -->
        
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            RFID Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>RFID Tag Number</label>
                                            <input class="form-control" name="Tag_No" required placeholder="Enter the RFID Tag Number of your boat">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                
            <div class="form-group">
                <div class="col-lg-offset-5 col-md-8" >
                     <button type="submit" class="btn btn-primary btn-sm">SUBMIT </button>
                </div>
             </div>
         </form>



                                

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
 <script src="js/bootstrap.min.js"></script>
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
