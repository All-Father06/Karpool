<?php
session_start();
include ('conn.php');
$id=$_POST["id"];
$g=$_SESSION["g"];
echo $s=$_SESSION["st"];
echo $e=$_SESSION["ep"];
echo $m=$_SESSION["p"];
echo $user=$_SESSION["user"];
$q="UPDATE `trips` set `booked` = `booked` +1 where `Id` like $id";
$q1="INSERT into `$id` (`User`, `Startpoint`, `Endpoint`, `Mobile`,`Gender`) VALUES ('$user','$s','$e','$m','$g')";
mysqli_query($conn,$q);
mysqli_query($conn,$q1);
echo('<script>alert("Booked successfully")</script>');
echo('<script>window.location="home.php"</script>');
?>