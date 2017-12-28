<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$con = mysql_connect("localhost","root","");
    // Make sure we connected succesfully
    if(! $con)
    {
        die('Connection Failed'.mysql_error());
    }

    // Select the database to use
mysql_select_db("rtls1",$con);
$check=$_SESSION['login_username'];
$session=mysql_query("SELECT username FROM `registration` WHERE username='$check' ");
$row=mysql_fetch_array($session);
$login_session=$row['username'];
if(!isset($login_session))
{
header("Location:index.php");
}
?>