<?php
$_SESSION[login_user]=$username;
$_SESSION['login_username']=$username;
header("Location:index.php");
?>