<?php
session_start();
$rfid=$_SESSION['id'];
$name=$_GET['name'];
include("config.php");
$des='';
$act='';
if (isset($_POST['description'])){
$des=$_POST['description'];
$act=$_POST['act'];
}
$sql="INSERT INTO Disabled_tags(Tag_no,description, Actions, controller_name) VALUES ('$rfid','$des','$act','$name')";
if ($conn->query($sql) === TRUE) 
	{
		header("Location:delete.php");
	} 
	else 
	{	
		include("header.php");
		echo "Error occured while processing. Please wait or try again..";
	}
	
	mysqli_close($conn);
?>