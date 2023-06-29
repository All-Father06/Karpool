<?php
include ("conn.php");
session_start();
$pwd=$_POST["pwd"];
$p=$_POST["p"];
$m=$_POST["m"];
$v=$_POST["v"];
$num=$_POST["num"];
$g=$_POST["g"];
//$n=$_POST["na"];
$name=$_SESSION["user"];
$query1="UPDATE `user` SET `Password`='$pwd',`Phone`=$p,`Email`='$m',`Vehicle`='$v',`numplate`='$num',`Gender`='$g' WHERE `Username` like '$name'";
mysqli_query($conn,$query1);
echo('<script>alert("Profile updated")</script>');
echo('<script>window.location="profile.php"</script>'); 
?>