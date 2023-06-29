<?php
include ("conn.php");
session_start();
$id=$_SESSION["tid"];
$na=$_POST["id"];
$query="DELETE FROM `$id` WHERE `User` like '$na'";
$query1="UPDATE `trips` SET `Booked`=`Booked`-1 WHERE `Id` like '$id'";
mysqli_query($conn,$query);
mysqli_query($conn,$query1);
echo('<script>alert("Passenger removed")</script>');
echo('<script>window.location="profile.php"</script>'); 
?>