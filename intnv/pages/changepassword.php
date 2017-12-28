<?php

session_start();

if (!(isset($_SESSION['login_username']) || $_SESSION['login_username'] == '')) {
    header("location:login1.php");
}

$dbcon = mysqli_connect('localhost', 'root', '', 'rtls1') or die(mysqli_error($dbcon));

$password1 = mysqli_real_escape_string($dbcon, $_POST['newPasswd']);
$password2 = mysqli_real_escape_string($dbcon, $_POST['confirmPasswd']);
$username = mysqli_real_escape_string($dbcon, $_SESSION['login_username']);

if ($password1!=$password2) { echo "Your passwords do not match.";}

else if (mysqli_query($dbcon, "UPDATE registration SET passwd='$password1' WHERE username='$username'"))
    {echo "You have successfully changed your password.";}

else { mysqli_error($dbcon); }

mysqli_close($dbcon);

?>