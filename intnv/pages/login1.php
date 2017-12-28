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

    $sql ="SELECT username, passwd FROM registration WHERE username = '$username' and passwd='$password'";
    $result=mysql_query($sql);
    $row=mysql_fetch_array($result);
    $x=$row[0];
    $count=mysql_num_rows($result);
   
    if($x=='admin')
    {
		$_SESSION['login_username']=admin;
		header("Location:session1.php"); 
    }
    elseif($x!='admin')
    {
        $_SESSION['login_username']=$username;
		header("Location:session2.php");
    }
    else
    {
    	echo "<span style='color:red'>The username or password you entered is incorrect.</span>";
    }
}
?>
