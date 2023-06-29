<?php
session_start();
include ("conn.php");
$user=$_POST["uname"];
$pwd=$_POST["pwd"];
$q="SELECT * FROM `user` WHERE `Username` like '$user' and `Password` like '$pwd'";
$e=mysqli_query($conn,$q);
$n=mysqli_num_rows($e);
if($n==1){
    $d=mysqli_fetch_assoc($e);
    echo('<script>alert("Login success")</script>');
    echo('<script>window.location="home.php"</script>');
    $_SESSION['user']=$d['Username'];
    $_SESSION['v']=$d['Vehicle'];
    $_SESSION['n']=$d['numplate'];
    $_SESSION['e']=$d['Email'];
    $_SESSION['p']=$d['Phone'];
    $_SESSION['g']=$d['Gender'];
}
else{
    echo('<script>alert("Check Login credentials")</script>');
    echo('<script>window.location="index.html"</script>'); 
}
?>