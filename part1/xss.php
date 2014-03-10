

<?php
//check whether the talk is done
include("config.php");
$con=mysql_connect($server,$username,$password);
if(!$con)die('cannot connect wuth the server');
if(!mysql_select_db($database,$con))die('database not found');
session_start();$a="mohit";
//$a=$_SESSION['username'];



if(isset($_POST['del'])){
$query="DELETE FROM `xss_injection`.`xss1` WHERE `xss1`.`username` = '$a';";
mysql_query($query);
}

echo "<script src='mohit.js'></script>
<script>var active='off'</script>
<h1>Can you make the two robots meet in a single move? </h1>
<image id='robot' src='robot.jpg' style='position:absolute;top:60px;'></image>
<image id='destination' src='destination.jpg' style='position:absolute;left:600px;top:200px;'>
<image  src='heart.jpg' id='heart' style='position:absolute;left:550px;top:260px;display:none'>";
echo "<script>
function move(){
if(active=='on')

{

$('#robot').animate({left:200,top:180},1000).animate({left:350},1000,dis);

function dis(){document.getElementById('heart').style.display='block';};

}}

active='off'; move();

</script>";
echo "<form action='' method='post' style='position:absolute;left:950px;top:5px;'><input type='submit' name='del'  value='Delete all the comments'></input></form>";



if(isset($_POST['submit'])){
$yt=$_POST['text'];
$my=[$yt];
if(preg_grep("/.*<script>.*active.*on.*move().*/", $my))
{echo "<script>alert('Congrats . task completed!');active='on';move();</script>";
//tell the database that the task is completed.
}
else {
$query="INSERT INTO  `$database`.`xss1` (
`username` ,
`comment`
)
VALUES (
'$a',  '$yt'
);";
mysql_query($query);
}}

$query= "select * from `xss1` WHERE `username`='$a'";
$r=mysql_query($query,$con);
echo "<div style='position:absolute;left:820px;top:20px;'><h2>Comments</h2>";
while($row=mysql_fetch_row($r))
{
echo "<div style='border-bottom:1px solid black;width:500px;font-family:cursive;padding:20px;background:rgba(213,213,213,0.3)'>";
$b=$row[2];
echo $b;
echo "</div>";
}
echo "<form action='' method='post'><textarea name='text' rows=5 cols=65></textarea><input type='submit' name='submit' value='Post Your comment'></input></form></div>";
mysql_close($con); 

?>

