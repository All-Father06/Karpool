<?php
session_start();
        include ('conn.php');
        echo $us=$_SESSION["user"];
        echo $mo=$_SESSION['p'];
        echo $st=$_POST["st"];
        echo $ep=$_POST["ep"];
        echo $wp=$_POST["wp"];
        echo $t=$_POST["t"];
        echo $d=$_POST["d"];
        $v=$_SESSION["v"];
        $n=$_SESSION["n"];
        $c=$_POST["c"];
        $co=$_POST["co"];
        $ap=$_POST["ap"];
        $g=$_SESSION['g'];
        $q1="INSERT INTO `trips` (`Driver`, `Vehicle`, `Numplate`, `Startpoint`, `Endpoint`, `Capacity`,`Cost`, `Date`, `Time`, `ap`, `waypoint`) VALUES ('$us','$v','$n','$st','$ep','$c',$co,'$d','$t','$ap','$wp')";
        mysqli_query($conn,$q1);
        $q="SELECT `Id` FROM `trips` WHERE `Driver` like '$us' and `Date` like '$d' and `Startpoint` like '$st' and `Endpoint` like '$ep'";
        $ex=mysqli_query($conn,$q);
        $da=mysqli_fetch_assoc($ex);
        echo $id=$da['Id'];
        $q2="CREATE TABLE `$id` (User VARCHAR(100), Type VARCHAR(20) default 'Passenger',Startpoint VARCHAR(500),Endpoint VARCHAR(500), Mobile  INT(200), Gender Varchar (20))";
        $q3="INSERT INTO `$id`(`User`, `Type`, `Startpoint`, `Endpoint`, `Mobile`,`Gender`) VALUES ('$us','Driver','$st','$ep',$mo,'$g')";
        mysqli_query($conn,$q2);
        mysqli_query($conn,$q3);
        echo('<script>alert("Trip Created")</script>');
        echo('<script>window.location="cr.html"</script>');   
?>