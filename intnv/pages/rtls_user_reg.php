<?php
$con=mysqli_connect("localhost","root","","rtls1");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}


// escape variables for security of enquiry

$f_name = mysqli_real_escape_string($con, $_POST['fname']);
$m_name = mysqli_real_escape_string($con, $_POST['mname']);
$l_name = mysqli_real_escape_string($con, $_POST['lname']);
$user_name = mysqli_real_escape_string($con, $_POST['username']);
$pass_word = mysqli_real_escape_string($con, $_POST['passwd']);
$g_ender = mysqli_real_escape_string($con, $_POST['gender']);
$addr = mysqli_real_escape_string($con, $_POST['address']);
$contac_t = mysqli_real_escape_string($con, $_POST['contact']);
$ctrl_room = mysqli_real_escape_string($con, $_POST['ctrl_room_no']);
$jett_y = mysqli_real_escape_string($con, $_POST['jetty']);
$reg_date = mysqli_real_escape_string($con, $_POST['reg_date']);
$re_date = mysqli_real_escape_string($con, $_POST['ren_date']);
$tag_assign = mysqli_real_escape_string($con, $_POST['tag_ass']);


//echo $fname+$mname+$lname+$username+$ctrlroom+$jetty+$regdate;

$sql_enquiry = "INSERT INTO registration_form (fname,mname,lname,username,passwd,gender,address,contact,ctrl_room_no,jetty,reg_date,ren_date,tag_ass) VALUES ('$f_name','$m_name','$l_name','$user_name','$pass_word','$g_ender','$addr','$contac_t', '$ctrl_room','$jett_y','$reg_date','$re_date','$tag_assign')";
$sql_enquiry1= "INSERT INTO registration(username,passwd) VALUES ('$user_name','$pass_word')";


if (!mysqli_query($con,$sql_enquiry)) {
  die('Error: ' . mysqli_error($con));

}else
{

	echo "thank u";
header("rtlslogin.php");

}
if (!mysqli_query($con,$sql_enquiry1)) {
  die('Error: ' . mysqli_error($con));

}else
{
	echo "thank u";
header("rtlslogin.php");

}
mysqli_close($con);
?>
