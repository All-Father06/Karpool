<?php
include ("conn.php");
session_start();
$id=$_POST["id"];
$query="DELETE FROM `trips` WHERE `Id` like '$id'";
$q1="DROP TABLE `$id`";
mysqli_query($conn,$query);
mysqli_query($conn,$q1);
echo('<script>alert("Trip deleted")</script>');
echo('<script>window.location="profile.php"</script>'); 
?>