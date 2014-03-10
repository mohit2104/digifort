

<?php
//check whether the task is done.
include("../config.php");
$rob=array("hey!","gd .nm. wassup?","Can i know your password?","Enter your password if you want to talk to me.","I am not talking to you until you enter your password.","password");
echo "
<h1>Talk to someone </h1>
<br>
<h2>Chat service</h2>";
if(!isset($_GET['set'])){
echo '<script>document.cookie="password=helawesome,expires=Thu, 18 Jan 1970 00:00:00 GMT"
"expires=Thu, 18 Jan 1970 00:00:00 GMT";window.location="xss.php?set=1";</script>';
}
$con=mysql_connect($server,$username,$password);
if(!$con)die('cannot connect wuth the server');
if(!mysql_select_db($database,$con))die('database not found');
session_start();$_SESSION['username']="abhi";
$a=$_SESSION['username'];
if(isset($_POST['del'])){
$query="DELETE FROM `xss_injection`.`xss2` WHERE `xss2`.`username` = '$a';";
mysql_query($query);
}
if(isset($_POST['submit'])){
$yt=$_POST['text'];
$my=[$yt];
if(preg_grep("/(w*)helawesome(w*)/", $my))
{echo "Congrats! task completed. ";
//tell the database that the task is completed.
return;
}
if($yt!='' && $yt!=' '){
$query="INSERT INTO  `$database`.`xss2` (
`username` ,
`comment`
)
VALUES (
'$a',  '$yt'
);";
mysql_query($query);
}}

$query= "select * from `xss2` WHERE `username`='$a'";
$r=mysql_query($query,$con);
$i=0;
echo "<div style='position:absolute;left:50px;top:200px;'>";
while($row=mysql_fetch_row($r))
{
echo "<div style='border-bottom:1px solid black;width:500px;font-family:cursive;padding:20px;background:rgba(213,213,213,0.3)'>";
echo "<span style='color:red' >You -</span><br>";
$b=$row[2];
echo $b;
echo "</div>";
echo "<div style='border-bottom:1px solid black;width:500px;font-family:cursive;padding:20px;background:rgba(213,213,213,0.3)'>";
echo "<span style='color:blue' >Unknown -</span><br>";
if($i<5)
echo $rob[$i]; 
else { $rob[5]; for($j=5;$j<=$i;$j++) echo "?";}
echo "</div>"; 
$i++;
}


echo "<form action='' method='post'><textarea name='text' rows=5 cols=65></textarea><br><input type='submit' name='submit' value='Send Message'></input></form></div>";
echo "<form action='' method='post' style='position:absolute;left:650px;top:200px;'><input type='submit' name='del'  value='clear chat'></input></form>";
if(preg_grep("/(w*)helawesome(w*)/", $my))
{echo "<script>alert('Congrats! task completed. ')</script>";
//tell the database that the task is completed.
return;
}
mysql_close($con); 

?>

