<?php //authenticate.php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,"root","");
if(!$db_server)die("unable to connect mysql server".mysql_error());
mysql_select_db($db_database)
or
die("unable to select db".mysql_error());

if(isset($_SERVER['PHP_AUTH_USER'])&&isset($_SERVER['PHP_AUTH_PW']))
{
$un_temp=sanitizeString($_SERVER['PHP_AUTH_USER']);
$pw_temp=sanitizeString($_SERVER['PHP_AUTH_PW']);
$query="select *from login_detail where username='$un_temp'";
$result=mysql_query($query);
 if(!$result)die("database access".mysql_error());
 else
 if(mysql_num_rows($result))
    {
      $row=mysql_fetch_row($result);
      $salt1="qm&h";
      $salt2="u*yh";
      $token=md5("$salt1$pw_temp$salt2");
         if($token==$row[3])
            echo'$row[0]$row[1]:';
         else
            die("invlaid".mysql_error());
    }
 else
   die("invalid");
}
else
 {
  header('WWW-Authenticate:basic realm="registered section"');
  header('HP/1.0 401 Unauthorized');
  die('plesae enter ');
 }
function sanitizeString($var)
{
	if(get_magic_quotes_gpc())
		$var=stripslashes($var);
	    $var=htmlentities($var);
		$var=strip_tags($var);
		return $var;
}