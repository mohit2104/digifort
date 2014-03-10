

<?php
//check whether the task is done.
include("../config.php");

echo "
<h1>Talk to someone </h1>
<br>
<h2>Chat service</h2>
<h3>The other user is online but currently inactive. Can u get the password of the other user? Comment the password after getting it.</h3>";
if(!isset($_GET['set'])){
echo '<script>document.cookie="password=helawesome,expires=Thu, 18 Jan 1970 00:00:00 GMT"
"expires=Thu, 18 Jan 1970 00:00:00 GMT";window.location="return.php?set=1";</script>';
}
if($_GET['set']>=2)return;
$con=mysql_connect($server,$username,$password);
if(!$con)die('cannot connect wuth the server');
if(!mysql_select_db($database,$con))die('database not found');
session_start();$_SESSION['username']="abhi";
$a=$_SESSION['username'];
if(isset($_POST['del'])){
$query="DELETE FROM `xss_injection`.`xss3` WHERE `xss3`.`username` = '$a';";
mysql_query($query);
}
if(isset($_POST['submit'])){
$yt=$_POST['text'];
$my=[$yt];
if(preg_grep("/(w*)uaresuchagenius(w*)/", $my))
{echo "Congrats! task completed. ";
//tell the database that the task is completed.
return ; 
}
if($yt!=' ' && $yt!=''){
$query="INSERT INTO  `$database`.`xss3` (
`username` ,
`comment`
)
VALUES (
'$a',  '$yt'
);";
mysql_query($query);
}}
$ct=$_GET['set'];
echo "<form action='return.php?set=$ct' name='myform' method='post'><textarea name='text' id='text' rows=5 cols=65></textarea><br><input type='submit' name='submit' value='Send Message'></input></form>";
$query= "select * from `xss3` WHERE `username`='$a'";
$r=mysql_query($query,$con);
$i=0;
echo "<div style='position:absolute;left:20px;top:330px;'>";
while($row=mysql_fetch_row($r))
{
echo "<div style='border-bottom:1px solid black;width:500px;font-family:cursive;padding:20px;background:rgba(213,213,213,0.3)'>";

$b=$row[2];
echo $b;
echo "</div>";

}


echo "</div>";
echo "<form action='' method='post' style='position:absolute;left:650px;top:200px;'><input type='submit' name='del'  value='clear chat'></input></form>";
mysql_close($con); 

?>

