<? php
if(isset($_SERVER['PHP_AUTH_USER'])&&isset($_SERVER['PHP_AUTH_PW']))
{
echo "welcome user:".$_SERVER['PHP_AUTH_USER']."password".$_SERVER['PHP_AUTH_PW'];
}
else
{
	
  header('WWW-Authenticate:Basic realm="Registered Section"');
  header('HTTP/1.0 401 Unauthorized');
  die('plesae enter ');
 }