<?php
require_once'login.php';
$db_server=mysql_connect("$db_hostname","root","");
if(!$db_server)die("unable to connect mysql".mysql_error());
mysql_select_db($db_database)or die("unble to select db" .mysql_error());
if(isset($_POST['delete'])&&isset($_POST['ISBN']))
{
	$ISBN=get_post('ISBN');
	$query="delete from classics where ISBN='$ISBN'";
	if(!mysql_query($query,$db_server))
		echo "delete failed:$query <br/>".mysql_error()."</br></br>";
}
if(isset($_POST['author'])&&isset($_POST['title'])&&isset($_POST['category'])&&isset($_POST['yer'])&&isset($_POST['ISBN'])&&isset($_POST['id']))
{
	$author=get_post('author');
	$title=get_post('title');
	$category=get_post('category');
	$yer=get_post('yer');
	$ISBN=get_post('ISBN');
	$id=get_post('id');
	$query="INSERT INTO classics VALUES('$author','$title','$category',$yer,'$ISBN','$id')";
	if(!mysql_query($query,$db_server))
		echo "insert failed:$query<br>".mysql_error()."</br></br>";
}
echo <<<_end
<form action="sqltest.php" method="post">
<pre><table>
<tr><td>author</td><td><input type="text" name="author"/></td></tr>
<tr><td>title</td><td><input type="text" name="title"/></td></tr>
<tr><td>category</td><td><input type="text" name="category"/></td></tr>
<tr><td>yer</td><td><input type="text" name="yer"/></td></tr>
<tr><td>ISBN</td><td><input type="text" name="ISBN"/></td></tr>
<tr><td></td><td><input type="submit" value="add record"></td></tr>
<tr><td>Id</td><td><input type="text" name="id"/></td></tr>
</pre></table>
</form>
_end;
$query="select *from classics";
$result=mysql_query($query);
if(!$result)die("unable to ccess".mysql_error());
$rows=mysql_num_rows($result);
for($j=0;$j<$rows;++$j)
{
	$row=mysql_fetch_row($result);
	echo <<<_end
<pre>
	author $row[0];
	title $row[1];
	category $row[2];
	yer $row[3];
	ISBN $row[4];
	id $row[5];
</pre>

<form action="sqltest.php" method="post">
<pre>
<input type="hidden" name="delete" value="yes"/>
	<input type="hidden" name="ISBN" value="$row[4]"/>
	<input type="submit" value="delete record"/>
</pre>
</form>
_end;
}
function get_post($var)
{
return mysql_real_escape_string($_POST[$var]);	
}

?>




