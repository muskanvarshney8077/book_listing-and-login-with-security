<?php //continue.php
session_start();
if(isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
	$password=$_SESSION['password'];
	$forname=$_SESSION['forename'];
	$surname=$_SESSION['surname'];
	echo "welcome";
}
else
	echo "<a href=authenticate2.php>";
?>
	