<?php 
session_start();
?>
<!DOCTYPE html>
<title>Home Page</title>
<style>
    *{
        text-decoration: none;
    }
    .content{
        position:absolute;
        top: 80px;
    }
    body{
        height:100%;
        width:100%;
        overflow-x:hidden;
        background-color:#fdf4cd;
    }
    .form-box{
        position: absolute;
        left:540px;
        width: 660px;
        height:250px;
        position: relative;
        /* margin: 6% auto; */
        backdrop-filter: blur(50px);
        border-radius: 15px;
        padding :5px;
        overflow: hidden;
        box-shadow: 5px 5px 10px 10px lightgray;
        background-color:transparent;
    }
    .input-group{
        top:10px;
        position: absolute;
        width: 280px;
        transition: .5s;
    }
    ::placeholder{
        color:rgb(255, 255, 255);
        position:absolute;
        left:15px;
    }
    #bt1{   
            background-color: rgb(255, 200, 0);
            border-radius: 15px;
        }
        #bt2{
            background-color: rgb(72, 255, 0);
            border-radius:15px;
        }
    .input-field{
        width:100%;
        padding : 10px 0;
        margin:5px 0;
        background-color: rgb(6, 90, 164);
        border-radius:15px;
        text-indent: 15px;
        border-left: 1px solid #ffff;
        border-top:1px solid #ffff;
        border-right:1px solid #ffff;
        font-size: 20px;
        border-bottom:1px solid #ffff;
        color:rgb(255, 255, 255);
        outline:none;
        background:transparent;
    }
    #p{
        position:absolute;
        top:0px;
        left:5px;   
    }
    #d{
        position:absolute;
        top:0px;
        left:355px;
    }
    #da{
        position:absolute;
        top:75px;
        height:20px;
        left:5px;
    }
    #ti{
        position:absolute;
        top:75px;
        height:20px;
        left:355px;
    }
    .input-field, textarea {

    background-color : #00000080; 

}
    .submit-btn{
        position: absolute;
        top:180px;
        left:175px;
        width:100%;
        height:50px;  
        padding :10px 30px;
         cursor: pointer;
         display: block;
         margin: auto;
         background: maroon;
         border:0;
         outline:none;
         color: aliceblue;
         border-radius: 25px;
         font-size: large;
    }

    /*.bvideo{
        position: absolute;
        right: 0;
        bottom: 0;
        z-index: -1;
        
    }

    @media (min-aspect-ratio: 16/9){
        .bvideo{
            width: 100%;
            height: 100%;
        }
    }*/
    </style>

<body>
    <div class="topnav" id="myTopnav" style="font-family:'Times New Roman';background-color: maroon ;color:azure;height: 50px;position:relative;top:0;width:98%;vertical-align: middle !important;border-radius:0px">
        <!-- <img src="logo.jpeg" style="height: 40px; width: 75px;left:0px" alt="Site logo"> -->   
        <p style="float:left;margin-left:5px;margin-top: 10px !important;font-size:20px;"><b style="color: white;">WELCOME , <?php echo $_SESSION['user']; ?></b></p>
        <a href="lout.php" title="Logout" style="float:right;margin-right:5px;margin-top: 12px !important;font-size:20px"><b style="color: white;">Logout</b></a>
        
        <?php 
        $v= $_SESSION['v'];
        if($v != ""){ ?>
        <a href="cr.html" title="Create" style="float:right; margin-right:5px;margin-top: 12px !important;"><b  style="color: white;margin-right: 10px;font-size:20px">Create Trip</b></a>
        <?php } ?>
        <a href="profile.php" title="profile" style="float:right; margin-right:5px;margin-top: 12px !important;"><b  style="color: white;margin-right: 10px;font-size:20px">My Profile</b></a>
        <!-- <a href="student/update/updateprofile-anon.php" title="UPDATE" style="float:right;margin-right:7px;margin-top: 12px !important;"><b style="color: white;font-size:20px;">PROFILE</b></a> -->

		</div>	
        <div class="content">
        <div class="form-box">
        <form id="Login" class="input-group" action="#" method="post">
            <input type="text" class="input-field" placeholder="Pick up" id="p" name ="p" required>
            <input type="text" class="input-field" placeholder="Drop off" id="d" name="d" required>
            <input type="date" class="input-field" name="da" id="da" required>
            <input type="time" class="input-field" name="ti" id="ti" required>
            <button type="submit" class="submit-btn" name="submit"><b>SEARCH</b></button>
        </form>
        
</div>
    <div id="result" style="position:absolute;top:280px;left:25%;">
        <?php
        include ('conn.php');
        if(isset($_POST["submit"])){
        $st=$_POST["p"];
        $ep=$_POST["d"];
        $ti=$_POST["ti"];
        $da=$_POST["da"];
        $u=$_SESSION["user"];
        $_SESSION["st"]=$st;
        $_SESSION["ep"]=$ep;
        $q="SELECT * FROM trips where `Driver` not like '$u' and `Date` like '$da' and `Time` <= '$ti' or `Time` > '$ti' and `startpoint` like '$st' or `waypoint` like '$st' AND `endpoint` like '$ep' or `waypoint` like '$ep'";
        $e=mysqli_query($conn,$q);
        $n=mysqli_num_rows($e);
        if($n>0){
            while($row1=mysqli_fetch_assoc($e)){
        ?>
    <div clas="card" id="c1" style="position:absolute;left:0px;border:1px solid #121212;width: 1350px;height:210px;background-color:rgba(255, 255, 255, 0.7);font-size:20px;font-family:lucinda fax;margin-top:5px;box-shadow: 5px 5px 1px 1px lightgray;border-radius:25px">   
    <b>         
    <div class="box" id="b1" style="position:absolute;left:10px;width:480px;top:0px;border:none;">          
        <h5>Driver Name: <?php echo $row1['Driver'] ?></h5>
        <h5>Vehicle :  <?php echo $row1['Vehicle'] ?></h5>
        <h5>Numplate : <p> <?php echo $row1['Numplate'] ?></h5>
    </div>      
    <div class="box" id="b1" style="position:absolute;left:200px;width:480px;top:0px;border:none;">      
    <h5>Start Location : <?php echo $row1['Startpoint'] ?></h5>
        <h5>End Location :  <?php echo $row1['Endpoint'] ?></h5>
        <?php 
        $w=$row1['waypoint'];
        if ($w !=""){ ?>
        <h5>Waypoint Location :  <?php echo $row1['waypoint'] ?></h5>
        <?php } ?>
    </div>
    <div class="box" id="b2" style="position:absolute;left:485px;width:380px;top:1px;">
        <h5>Booking done :  <?php echo $row1['Booked'] ?> /  <?php echo $row1['Capacity'] ?></h5>
        <h5 style="padding-top: 2px;">Date:  <?php echo $row1['Date']?></h5>
        <h5 style="padding-top:2px">Timing:  <?php echo $row1['Time']  ?></h5>
</div> 
        <div class="box" id="b3" style="position:absolute;left:800px;width:180px;top:10px">
        <h5 style="padding-top:2px">Cost : Rs. <?php echo $row1['Cost'] ?></h5>
        <h5 style="padding-top:2px">Possible alternate pickup: <?php echo $row1['ap']  ?></h5>
        <?php
        $id=$row1['Id'];
        $user=$_SESSION["user"];
        $q0="SELECT * from `$id` where `User` like '$user'";
        $ex=mysqli_query($conn,$q0);
        $num=mysqli_num_rows($ex);
        if($num > 0){
            $da=mysqli_fetch_assoc($ex);
            $t=$da['Type'];
        }
        if($num == 0){
        $c=$row1['Capacity'];
        $b=$row1['Booked'];
        if($b < $c){ ?>
        <form action="book.php" method="post">
        <button id="bt1" name="id" style="height:50px;width:100% ;font-size: 20px;" value="<?php echo $row1["Id"] ?>">Book</button>
        </form>
        <?php
        }
        else {
            ?>
            <button id="bt1" name="id" style="height:50px;width:100% ;font-size: 20px;">Booking ended</button>
<?php } 
}
else{
    if($t == 'Passenger'){
?>
<button id="bt1" name="id" style="height:50px;width:100% ;font-size: 30px;">Booked</button>
<?php } 
}?>
    </div>
    <?php
    echo "<div class='map' style='position:absolute;left:1000px;width:680px;top:10px'>";
 
 $origin = urlencode($row1["Startpoint"]);
 $destination = urlencode($row1["Endpoint"]);
$waypoints=urlencode($row1['waypoint']);
if($waypoints !=""){
 $src = "https://www.google.com/maps/embed/v1/directions?key=AIzaSyDZDNstAoeoNej3xtlCKZwT-Jl5IlK3wBE&origin=$origin&destination=$destination&waypoints=$waypoints";
}
else{
    $src = "https://www.google.com/maps/embed/v1/directions?key=AIzaSyDZDNstAoeoNej3xtlCKZwT-Jl5IlK3wBE&origin=$origin&destination=$destination";
}
 $iframe = "<iframe width=\"320\" height=\"180\" frameborder=\"0\" style=\"border:0\" src=\"$src\" allowfullscreen></iframe>";
 echo $iframe;
echo "</div>";
?>
</b>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php 
} 

        }
} else {
echo "No results found.";
}
echo "</div>";
?>
</div>
</div>
</div>

<img src="logo.jpeg" style="position:fixed;bottom:0;right:0;height:72px;">
</body> 
</html>