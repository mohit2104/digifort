

<?php

include("../config.php");

//setting cookie of dummy client

echo '<script>document.cookie="password=uaresuchagenius,expires=Thu, 18 Jan 1970 00:00:00 GMT"
"expires=Thu, 18 Jan 1970 00:00:00 GMT";</script>';

//echo the form

echo "
<form name='myform' id='myform' action='' method='post'><textarea id='text' name='text' rows=5 cols=65></textarea><br><input type='submit' name='submit' value='Send Message'></input></form></div>";

//database connection

$con=mysql_connect($server,$username,$password);
if(!$con)die('cannot connect wuth the server');
if(!mysql_select_db($database,$con))die('database not found');

//getting the username from session

session_start();$_SESSION['username']="abhi";
$a=$_SESSION['username'];

//submission of msg to database

if(isset($_POST['submit'])){
$query= "select * from `xss3` where `username`='$a' order by `id` desc LIMIT 0,1";
$r=mysql_query($query,$con);
while($row=mysql_fetch_row($r))
{
$b=$row[2];
}

$yt=$_POST['text'];
$my=[$yt];
if((!preg_grep("/(w*)$b(w*)/", $my)) && $yt!=' ' && $yt!='')
{
$query="INSERT INTO  `$database`.`xss3` (
`username` ,
`comment`
)
VALUES (
'$a',  '$yt'
);";
mysql_query($query); 
}}




$query= "select * from `xss3` WHERE `username`='$a'";
$r=mysql_query($query,$con);
while($row=mysql_fetch_row($r))
{
$b=$row[2];
echo $b;
}

mysql_close($con); 
?>



