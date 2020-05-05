<?php //query.php
require_once 'login.php';
$db_server=mysql_connect($db_hostname,"root","");
if(!$db_server)die("unable to connect mysql server".mysql_error());
mysql_select_db($db_database)
or
die("unable to select db".mysql_error());
$query="select *from classics";
$result=mysql_query($query);
if(!$result)die("unable to ccess".mysql_error());
$rows=mysql_num_rows($result);
echo $rows;
/*for($j=0;$j<$rows;++$j)
{
	echo 'author:'.mysql_result($result,$j,'author').'</br>';
	echo 'title:'.mysql_result($result,$j,'title').'</br>';
	echo 'category:'.mysql_result($result,$j,'category').'</br>';
	echo 'yer:'.mysql_result($result,$j,'yer').'</br>';
	echo 'ISBN:'.mysql_result($result,$j,'ISBN').'</br>';
	echo'</br>';
}*/
for($j=0;$j<$rows;$j++)
{
$row=mysql_fetch_row($result);
echo $row;
echo 'author:'.$row[0].'</br>';	
echo 'title:'.$row[1].'</br>';	
echo 'category:'.$row[2].'</br>';	
echo 'yer:'.$row[3].'</br>';	
echo 'ISBN:'.$row[4].'</br>';
echo '</br>';	
}
?>
	