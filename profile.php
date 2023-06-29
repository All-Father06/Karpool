<?php
session_start();
include ('conn.php'); 
$name=$_SESSION["user"];
$q="SELECT * from `user` where `Username` like '$name'";
$e=mysqli_query($conn,$q);
$d0=mysqli_fetch_assoc($e);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>My Profile</title>
    <meta name="author" content="Codeconvey" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"><link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" href="css/demo.css" />
    
	    <link rel="stylesheet" href="css/style.css">
</head>
<body>
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
            background-image:url("driver.jpg");
            background-size: cover;
            background-repeat: no-repeat;
        }
        .form-box{
            position: absolute;
            left:540px;
            width: 560px;
            height:120px;
            position: relative;
            /* margin: 6% auto; */
            backdrop-filter: blur(2px);
            border-radius: 15px;
            padding :5px;
            overflow: hidden;
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
            background: transparent;
        }
        .input-field, textarea {
    
        background-color : #00000080; 
    
    }
        .submit-btn{
            position: absolute;
            top:50px;
            left:320px;
            width:65%;  
            padding :10px 30px;
             cursor: pointer;
             display: block;
             margin: auto;
             background: #027693;
             border:0;
             outline:none;
             color: aliceblue;
             border-radius: 25px;
        }
        </style>
<div class="topnav" id="myTopnav" style="font-family:'Times New Roman';background-color: maroon;color:azure;height: 50px;position:relative; width:98%;vertical-align: middle;border-radius:5px;padding-top:10px;">
<div class="rt-container">    
    <form action="lout.php">
                  <button type="submit" style="position:absolute;right:20px;background:transparent;color: aliceblue;border:none;">Logout</button>
                </form>     
                <a href="editpage.php">
                  <button type="submit" style="position:absolute;right:100px;background:transparent;color: aliceblue;border:none;">Edit profile</button> </a>
        <div class="col-rt-2">
            <ul>
            <a href ="home.php" style="text-decoration:none;color:aliceblue;">Back to Home</button></a>
            </ul>
        </div>
		</div>
</div>
<section>
    <div class="rt-container">
          <div class="col-rt-12">
              <div class="Scriptcontent">
              
<!-- Student Profile -->
<div class="student-profile py-4">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent text-center">
            <h3><?php echo $name?></h3>
          </div>
          <div class="card-body">
            <p class="mb-0"><strong class="pr-1">User Name:</strong><?php echo $d0['Username']?></p>
            <p class="mb-0"><strong class="pr-1">Gender:</strong><?php echo $d0['Gender']?></p>
            <?php 
            $v=$_SESSION['v']; 
            if($v != ""){
              ?>
            <p class="mb-0"><strong class="pr-1">Vehicle: <?php echo $d0['Vehicle'] ?></strong></p>
            <p class="mb-0"><strong class="pr-1">Numplate: <?php echo $d0['numplate'] ?></strong></p>
            <?php } ?>
            <p class="mb-0"><strong class="pr-1">Phone:</strong><?php echo $d0['Phone']?></p>
            <p class="mb-0"><strong class="pr-1">Email:</strong><?php echo $d0['Email']?></p>
      </div>
        </div>
      </div>
      
      <div class="col-lg-10">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>User Trips</h3>
          </div>
          <div class="card-body pt-0">
          <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Startpoint</th>
      <th scope="col">Endpoint</th>
      <th scope="col">Waypoint</th>
      <th scope="col">Booked</th>
      <th scope="col">Cost</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include ('conn.php');
    $user= $_SESSION['user'];
    $q="SELECT * from `trips` where `Driver` like '$name'"; 
    $e=mysqli_query($conn,$q);
    $n=mysqli_num_rows($e);
    if($n>0){
      while($d=mysqli_fetch_assoc($e)){
    ?>
    <tr>
      <th scope="row"><?php echo $d['Id'] ?></th>
      <td><?php echo $d['Date'] ?></td>
      <td><?php echo $d['Time'] ?></td>
      <td><?php echo $d['Startpoint'] ?></td>
      <td><?php echo $d['Endpoint'] ?></td>
      <td><?php echo $d['waypoint'] ?></td>
      <td><?php echo $d['Booked'] ?></td>
      <td><?php echo $d['Cost'] ?></td>
      <td><form method="post" action="trip.php"><button type ="submit" name="id" value="<?php echo $d['Id'] ?>">Details</button>
      </form>
      <form method="post" action="edit.php"><button type ="submit" name="id" value="<?php echo $d['Id'] ?>">Edit</button></form></td>
    </tr>
    <?php } 
    } 
    ?>
            </tbody>
            </table>
          </div>
        </div>
        </div>
        <div class="col-lg-10">
        <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Booked Trips</h3>
          </div>
          <div class="card-body pt-0">
          <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Startpoint</th>
      <th scope="col">Endpoint</th>
      <th scope="col">Waypoint</th>
      <th scope="col">Cost</th>
      <th scope="col">Details</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include ('conn.php');
    $user= $_SESSION['user'];
    $q="SELECT * from `trips`"; 
    $e=mysqli_query($conn,$q);
    $n=mysqli_num_rows($e);
    if($n>0){
      while($d=mysqli_fetch_assoc($e)){
        $id=$d['Id'];
        $user=$_SESSION["user"];
        $q0="SELECT * from `$id` where `User` like '$name' and `Type` like 'Passenger'";
        $ex=mysqli_query($conn,$q0);  
        $num=mysqli_num_rows($ex);
        if($num > 0){
    ?>
    <tr>
      <th scope="row"><?php echo $d['Id'] ?></th>
      <td><?php echo $d['Date'] ?></td>
      <td><?php echo $d['Time'] ?></td>
      <td><?php echo $d['Startpoint'] ?></td>
      <td><?php echo $d['Endpoint'] ?></td>
      <td><?php echo $d['waypoint'] ?></td>
      <td><?php echo $d['Cost'] ?></td>
      <td><form method="post" action="trip.php"><button type ="submit" name="id" value="<?php echo $d['Id'] ?>">Details</button>
      </td>
  

    </tr>
    <?php 
      }
    } 
    } 
    ?>
            </tbody>
            </table>
          </div>
        </div>
        </div>
  </ul>
	</body>
</html>