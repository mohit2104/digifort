

<?php
//check whether the task is done.
include("../config.php");

echo "
<h1>Talk to someone </h1>
<br>
<h2>Chat service</h2>
<h3>The other user is online but currently inactive. Can u get the password of the other user? Comment the password after getting it.</h3>";
 
//setting cookie
if(!isset($_GET['set'])){
echo '<script>document.cookie="password=helawesome,expires=Thu, 18 Jan 1970 00:00:00 GMT"
"expires=Thu, 18 Jan 1970 00:00:00 GMT";window.location="return.php?set=1";</script>';
}


//database connection
$con=mysql_connect($server,$username,$password);
if(!$con)die('cannot connect wuth the server');
if(!mysql_select_db($database,$con))die('database not found');

//take username from session 
session_start();$_SESSION['username']="abhi";
$a=$_SESSION['username'];


//clear chat history

if(isset($_POST['del'])){
$query="DELETE FROM `xss_injection`.`xss3` WHERE `xss3`.`username` = '$a';";
mysql_query($query);
}

//storing message
if(isset($_POST['submit'])){
$yt=$_POST['text'];
$my=[$yt];
if(preg_grep("/(w*)uaresuchagenius(w*)/", $my))
{
echo "Congrats! task completed. ";

//tell the database that the task is completed.
return ; 
}
/*$query= "select * from `xss3` where `username`='$a' order by `id` desc LIMIT 0,1";
$r=mysql_query($query,$con);
while($row=mysql_fetch_row($r))
{
$b=$row[2];
}

$yt=$_POST['text'];
$my=[$yt];
if((!preg_grep("/(w*)$b(w*)/", $my)) && $yt!=' ' && $yt!='')
{  */

//checking whether the user already exists . accordingly update or insert the msg

$query= "select * from `xss3` where `username`='$a' ";
$r=mysql_query($query,$con);
if(mysql_num_rows($r)==0){
$query="INSERT INTO  `$database`.`xss3` (
`username` ,
`comment`
)
VALUES (
'$a',  '$yt'
);";}
else
{
$query="UPDATE  `xss_injection`.`xss3` SET  `comment` =  '$yt' WHERE  `xss3`.`username` ='$a';"
}
mysql_query($query);
}

//echo the clear chat form . to prevent error by below messages

echo "<form action='' method='post' style='position:absolute;left:650px;top:200px;'><input type='submit' name='del'  value='clear chat'></input></form>";

//echo the form

echo "<form action='' name='myform' method='post'><textarea name='text' id='text' rows=5 cols=65></textarea><br><input type='submit' name='submit' value='Send Message'></input></form>";


//echo the msg

$query= "select * from `xss3` WHERE `username`='$a'";
$r=mysql_query($query,$con);

echo "<div style='position:absolute;left:20px;top:330px;'>";
while($row=mysql_fetch_row($r))
{
echo "<div style='border-bottom:1px solid black;width:500px;font-family:cursive;padding:20px;background:rgba(213,213,213,0.3)'>";

$b=$row[2];
echo $b;
echo "</div>";

}
echo "</div>";

//close connection

mysql_close($con); 

?>

