<?php
session_start();
include ('conn.php'); 
$id=$_POST['id'];
$_SESSION["tid"]=$id;
$q="SELECT * from `trips` where `Id` like $id";
$e=mysqli_query($conn,$q);
$q1="SELECT * from `$id`";
$ex=mysqli_query($conn,$q1);
$d0=mysqli_fetch_assoc($e);
?>
<html>
    <head>
        <title>Edit</title>
    </head>
<style>
    *{
        margin: 0;
        padding: 0;
    }

    .hero1{
        height: 100vh;
        width: 100%;
        background-image: url(sky.jpg);
        background-size: cover;
        background-position: center;
        position: relative;
        overflow-x: hidden;

    }

    .highway{
        height: 200px;
        width: 500%;
        display: block;
        background-image: url(road.jpg);
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1;
        background-repeat: repeat-x;
        animation: highway 5s linear infinite;
    }
    @keyframes highway
    {
        100%{
            transform: translateX(-3400px)
        }
    }

    .city{
        height: 200px;
        width: 500%;
        display: block;
        background-image: url(city.png);
        position: absolute;
        bottom: 200px;
        left: 0;
        right: 0;
        z-index: 1;
        background-repeat: repeat-x;
        animation: city 20s linear infinite;
    }
    @keyframes city
    {
        100%{
            transform: translateX(-1400px)
        }
    }

    .car{
        width: 400px;
        left: 50%;
        bottom: 100px;
        transform: translateX(-50%);
        position: absolute;
        z-index: 2;

    }

    .car img{
        width: 100%;
        animation: car 1s linear infinite;
    }
    @keyframes car{
        100%{
            transform: translateY(-1px);
        }
        50%{
            transform: translateY(-1px);
        }
        0%{
            transform: translateY(-1px);
        }
    }

    .wheel{
        left: 50%;
        bottom: 178px;
        transform: translateX(-50%);
        position: absolute;
        z-index: 2;
    }

    .wheel img{
        width: 72px;
        height: 72px;
    }

    .fwheel{
        left: 80px;
        position: absolute;
    }

    .bwheel{
        left: -165px;
        position: absolute;
    }
    .hero{
        height:100%;
        width:100%;
        background-position: center;
        background-size: cover;
        position: absolute;
    }
    .form-box{
        width: 360px;
        height:500px;
        position: relative;
        top: 40px;
        left:40%;
        margin-right: 80px;
        backdrop-filter: blur(2px);
        border-radius: 15px;
        box-shadow: 0 0 5px 0 ;
        padding :5px;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.8);
    }
    .button-box{
        width :300px;
        left:45px;
        margin:35px auto;
        position: absolute;
        border-radius: 30px;
    }
    .toggle-btn{
        padding: 10px 10px;
        width:45%;
        left:10px;
        cursor: pointer;
        border-radius:20px;
        background: transparent;
        border:0;
        outline:none;
        position:relative;
        background-color: blanchedalmond;
    }
    .input-group{
        top:120px;
        position: absolute;
        width: 280px;
        transition: .5s;
    }
    ::placeholder{
        color:rgb(255, 255, 255)
    }
    .input-field{
        width:100%;
        padding : 10px 0;
        margin:5px 0;
        border-left: 0;
        border-top:0;
        border-right:0;
        font-size: 20px;
        border-bottom:1px solid #ffff;
        color:rgb(81, 255, 0);
        outline:none;
        background: transparent;
    }
    .submit-btn{
        width:85%;
        padding :10px 30px;
         cursor: pointer;
         display: block;
         margin: auto;
         background: rgb(192, 76, 76);
         border:0;
         outline:none;
         color: white;
         border-radius: 25px;
    }
    #Login{
        left:50px;
        
    }
    #Register{
        left:450px;
        top: 80px;
    }
    #f2{
        position: absolute;
        top:75px;
        height:535px;
        left:350px;
    }
    #f3{
        position: absolute;
        top:75px;
        left:750px;
        width:500px;
        color:white;
        height:175px;
    }
    body{
        height:100%;
        width:100%;
        overflow-x:hidden;
        background-color:#fdf4cd;
    }
</style>
    <body>
    <div class="topnav" id="myTopnav" style="font-family:'Times New Roman';background-color: maroon;color:azure;height: 50px;position:relative; width:98%;vertical-align: middle;border-radius:5px;padding-top:20px;">
<div class="rt-container">    
    <form action="lout.php">
                  <button type="submit" style="position:absolute;right:20px;background:transparent;color: aliceblue;border:none;">Logout</button>
                </form>     
                <a href="profile.php">
                  <button type="submit" style="position:absolute;right:100px;background:transparent;color: aliceblue;border:none;">Profile</button> </a>
        <div class="col-rt-2">
            <ul>
            <a href ="home.php" style="text-decoration:none;color:aliceblue;">Back to Home</button></a>
            </ul>
        </div>
		</div>
</div>
            <div class="hero">  
    <div class="form-box" id="f2">
            <form action="edit2.php" method="post">
                <input type="text" class="input-field" placeholder="Startpoint" name="sp" value="<?php echo $d0["Startpoint"] ?>" required>
                <input type="text" class="input-field" placeholder="Endpoint" name="ep" value="<?php echo $d0["Endpoint"] ?>" required>
                <input type="text" class="input-field" placeholder="Waypoint" name ="wp" value="<?php echo $d0["waypoint"] ?>" required>
                <input type="text" class="input-field" placeholder="Waypoint" name ="ap" value="<?php echo $d0["ap"] ?>" required>
                <input type="date" class="input-field" name="da" value="<?php echo $d0["Date"] ?>" required>
                <input type="time" class="input-field" name="ti" value="<?php echo $d0["Time"] ?>" required>            
                <input type="number" class="input-field" placeholder="Capacity" name="num" value="<?php echo $d0["Capacity"] ?>">
                <input type="number" class="input-field" placeholder="Cost" name="co" value="<?php echo $d0["Cost"] ?>">
                <button class="submit-btn" type ="submit" name="id" value="<?php echo $d0['Id'] ?>">Edit</button>
            </form>
            <br>
            <form action="delete.php" method="post">
            <button class="submit-btn" type ="submit" name="id" value="<?php echo $d0['Id'] ?>">Delete</button>
            </form>
        </div>
        <div class="form-box" id="f3">
            <table class="table table-striped table-bordered" style="width:500px;color:white;text-align:center;">
  <thead>   
    <tr>
      <th scope="col">User</th>
      <th scope="col">Type</th>
      <th scope="col">Startpoint</th>
      <th scope="col">Endpoint</th>
      <th scope="col-span-2">Mobile</th>
      <th scope="col-span-2">Gender</th>
      <th scope="col-span-2"></th>
      <th scope="col-span-2"></th>
    </tr>
  </thead>
  <tbody>
  <?php
        while($d1=mysqli_fetch_assoc($ex)){
    ?>
    <tr>
      <?php $u=$_SESSION['user'];
      $us=$d1['User'];
      if($u==$us){
        ?>
      <th scope="row">You</th>
      <?php } 
      else {?>
          <th scope="col-span-2"><?php echo $us?></th>
      <?php }?>
      <td><?php echo $d1['Type'] ?></td>
      <td><?php echo $d1['Startpoint'] ?></td>
      <td><?php echo $d1['Endpoint'] ?></td>
      <td><?php echo $d1['Mobile'] ?></td>
      <td><?php echo $d1['Gender'] ?></td>
      <?php
      $na=$d1['User'];
        if($na != $u){ ?>
      <td><form action="#" method="post"><button type ="submit" name="id" value="<?php echo $d1['User'] ?>">Chat</button></form></td>
      <?php
        }
      $ty=$d1['Type'];
        if($ty != "Driver"){ ?>
      <td><form action="remove.php" method="post"><button type ="submit" name="id" value="<?php echo $d1['User'] ?>">Remove</button></form></td>
      <?php ?>
    </tr>
    <?php 
      }
    }
    ?>

            </tbody>
            </table>
          </div>
        </div>
        </div>
        </div>
        </div>
    </body>
</html>
