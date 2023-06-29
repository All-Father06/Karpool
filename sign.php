<?php
include ("conn.php");
$user=$_POST["uname"];
$pwd=$_POST["pwd"];
$email=$_POST["mail"];
$phone=$_POST["phone"];
$vehicle=$_POST["vehicle"];
$num=$_POST["num"];
$g=$_POST["g"];
$q="INSERT INTO `user`(`Username`, `Password`, `Phone`, `Email`, `Vehicle`, `numplate`, `Gender`) VALUES ('$user','$pwd','$phone','$email','$vehicle','$num','$g')";
mysqli_query($conn,$q);
echo('<script>alert("Signup success")</script>');
echo('<script>window.location="index.html"</script>');
?>