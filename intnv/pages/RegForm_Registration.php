<?php
//connectivity string
$servername="localhost";
$username="root";
$password="";
$con=mysqli_connect($servername,$username,$password,'rtls1');
//error check
if(mysqli_connect_errno())
{
	die("Connection Error");
}
//secured insertion of string under sql injection
$db_fname=mysqli_real_escape_string($con,$_POST['First_Name']);
$db_mname=mysqli_real_escape_string($con,$_POST['Middle_Name']);
$db_lname=mysqli_real_escape_string($con,$_POST['Last_Name']);
$db_gender=mysqli_real_escape_string($con,$_POST['Gender']);
$db_add=mysqli_real_escape_string($con,$_POST['Address']);
$db_cno=mysqli_real_escape_string($con,$_POST['Contact_No']);
$db_regno=mysqli_real_escape_string($con,$_POST['Reg_No']);
$db_jname=mysqli_real_escape_string($con,$_POST['Jetty_Name']);
$db_regdate=mysqli_real_escape_string($con,$_POST['Reg_Date']);
$db_rendate=mysqli_real_escape_string($con,$_POST['Ren_Date']);
$db_tagno=mysqli_real_escape_string($con,$_POST['Tag_No']);

//inserting into database
$insert_query="INSERT INTO registration_form(First_Name,Middle_Name,Last_Name,Gender,Address,Contact_No,Reg_No,Jetty_Name,Reg_Date,Ren_Date,Tag_No) 
VALUES ('$db_fname','$db_mname','$db_lname','$db_gender','$db_add','$db_cno','$db_regno','$db_jname','$db_regdate','$db_rendate','$db_tagno')";

if(!mysqli_query($con,$insert_query)){
	die('Error:'.mysqli_error($con));

}
	echo "Data entered successfully!!!";


?>