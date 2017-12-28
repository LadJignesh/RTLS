<?php

include("config.php");

session_start();
$fname=$_SESSION["firstname"];
$mname=$_SESSION["middlename"];
$lname=$_SESSION["lastname"];

$sql="Update registration_form set address='".$_GET['address']."', contact='".$_GET['contact']."', ctrl_room_no='".$_GET['ctrl_room_no']."', jetty='".$_GET['jetty']."' where fname='".$fname."' and mname='".$mname."' and lname='".$lname."'";
echo $sql;

if($conn->query($sql)==TRUE){
header("Location:datatables1.php");
}
else
{
echo "Error occured. Contact administrator".$conn->error;
}