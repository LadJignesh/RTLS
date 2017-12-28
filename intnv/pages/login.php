<?php
session_start();
{
    // Grab User submitted information
    $username = "";
    $password="";

    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password=$_POST['password'];
    }

    // Connect to the database
    $con = mysql_connect("localhost","root","");
    // Make sure we connected succesfully
    if(! $con)
    {
        die('Connection Failed'.mysql_error());
    }

    // Select the database to use
    mysql_select_db("rtls1",$con);

    $result = mysql_query("SELECT username, passwd FROM registration_form WHERE username = '$username' and passwd='$password'");

    $count=mysql_num_rows($result);

    if($count!="")
    {
		$_SESSION['login_username']=$username;
		if($username=="admin" && $password=="admin")
		{
		header("Location:index1.php");
		}
		else
		{
			header("Location:index.php");
		}
    }
    else
    {
    	echo "<span style='color:red'>The username or password you entered is incorrect.</span>";
    }
}
?>
