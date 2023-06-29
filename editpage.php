<?php
session_start();
include ('conn.php'); 
$name=$_SESSION["user"];
$q="SELECT * from `user` where `Username` like '$name'";
$e=mysqli_query($conn,$q);
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
        font-size:20px;
        width:55%;
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
        height:435px;
        left:750px;
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
            <form action="editp2.php" method="post">
                <input type="text" class="input-field" placeholder="Password" name="pwd" value="<?php echo $d0["Password"] ?>" required>
                <input type="text" class="input-field" placeholder="Phone" name="p" value="<?php echo $d0["Phone"] ?>" required>
                <input type="text" class="input-field" placeholder="Email" name ="m" value="<?php echo $d0["Email"] ?>" required>
                <input type="text" class="input-field" placeholder="Vehicle" name ="v" value="<?php echo $d0["Vehicle"] ?>" required>
                <input type="text" class="input-field" placeholder="Numplate" name="num" value="<?php echo $d0["numplate"] ?>">
                <input type="text" class="input-field" placeholder="Gender" name="g" value="<?php echo $d0["Gender"] ?>">
                <br>
                <br>
                <button class="submit-btn" type ="submit" name="id" value="<?php echo $d0['Username'] ?>">Edit</button>
</form> 
        </div>
        </div>
        </div>
        </div>
    </body>
</html>