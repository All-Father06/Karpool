<?php
include ("conn.php");
session_start();
$sp=$_POST["sp"];
$ep=$_POST["ep"];
$wp=$_POST["wp"];
$ap=$_POST["ap"];
$da=$_POST["da"];
$ti=$_POST["ti"];
$ca=$_POST["num"];
$id=$_POST["id"];
$co=$_POST["co"];
$query="UPDATE `trips` SET `Startpoint`='$sp',`Endpoint`='$ep',`Capacity`=$ca,`Cost`= $co,`Date`='$da',`Time`='$ti',`ap`='$ap',`waypoint`='$wp' WHERE `Id` like '$id'";
mysqli_query($conn,$query);
  echo('<script>alert("Trip updated")</script>');
    echo('<script>window.location="profile.php"</script>'); 
?>