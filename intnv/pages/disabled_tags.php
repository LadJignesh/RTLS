<html>
<body>
<?php$username="root";$password="";$database="rtls1";
mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query="SELECT * FROM disabled_tags";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) 
{
$f1=mysql_result($result,$i,"Tag_No");
echo $f1;
$f2=mysql_result($result,$i,"description");
$f3=mysql_result($result,$i,"time");
$i++;
}
?>
</body>
</html>