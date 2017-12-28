<?php

include("config.php");

//$fullname=$_GET["fullname"];


$sql="Delete from registration_form where fname='".$_GET["fname"]."' and mname='".$_GET["mname"]."' and lname='".$_GET["lname"]."'";
echo $sql;

if($conn->query($sql)==TRUE){
	header("Location:datatables1.php");
}
else
{
	echo "Some error occured. Contact administrator";
}

?>