<?php //login_detail.php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,"root","");
if(!$db_server)die("unable to connect mysql server".mysql_error());
mysql_select_db($db_database)
or
die("unable to select db".mysql_error());
/*
$query="create table login_detail(forename varchar(20)not null,surname varchar(20) not null,username varchar(20) not null unique,password varchar(20) not null)";
$result=mysql_query($query);
if(!$result) die("not run".mysql_error()); */
echo <<<_end
<form action="login_detail.php" method="post">
<table border="1">
<tr><th>first name</th><td><input type="text" name="forename"/></td></tr>
<tr><th>last name</th><td><input type="text" name="surname"/></td></tr>
<tr><th>username</th><td><input type="text" name="username"/></td></tr>
<tr><th>password</th><td><input type="text" name="password"/></td></tr>
<tr><td></td><td><input type="submit" value="add record"></td></tr>
</table>
</form>
_end;
if(isset($_POST['forename'])&&isset($_POST['surname'])&&isset($_POST['username'])&&isset($_POST['password']))
{
$salt1="qm&h";
$salt2="u*yh";
$forename=sanitizeString($_POST['forename']);
$surname=sanitizeString($_post['surname']);
$username=sanitizeString($_post['username']);
$password=sanitizeString($_post['password']);
$token=md5("salt1$passwordsalt2");
add_user($forename,$surname,$username,$token);
}
function add_user($f,$s,$u,$t)
{
	$query="input into login_detail values('$f','$s','$u','$t')";
    $result=mysql_query($query);
	if(!$result) die("input un not run".mysql_error());
}
function sanitizeString($var)
{
	if(get_magic_quotes_gpc())
		$var=stripslashes($var);
	    $var=htmlentities($var);
		$var=strip_tags($var);
		return $var;
}
function sanitizeMYSQL($var)
{
	$var= mysql_real_escape_string($var);
	$var=sanitizeString($var);
	return $var;
}
