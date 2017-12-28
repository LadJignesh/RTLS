<?php
$user=@$_SESSION['login_username'];

//user is logged in
if (@$_POST['submit'])
{
//check fields
$oldpassword =(@$_POST['oldpassword']);
$newpassword = (@$_POST['newpassword']);
$repeatnewpassword =(@$_POST['repeatnewpassword']);
//check password against db
//connect to db
$connect = mysql_connect ("localhost","root","") or die();
mysql_select_db("rtls1")or die();
$queryget = mysql_query ("SELECT passwd FROM registration_form WHERE username='$user'")or die ("Query didnt work");
$row = mysql_fetch_assoc($queryget);
$oldpassworddb = $row ['passwd'];
//check passwords
if($oldpassword==$oldpassworddb)
{
//check the new password
if ($newpassword==$repeatnewpassword)
{
//succes
//change password in db
$querychange = mysql_query ("
UPTADE users SET passwd='$newpassword' WHERE username='$user'
");
session_destroy();
die ("Your password has been changed.<a href='index.php'>Return </a>to the main page");
}
else
 die ("New password dont match!");
}
else
 die("Old password doesnt match!");
}

?>