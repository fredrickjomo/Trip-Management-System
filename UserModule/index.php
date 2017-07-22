<?php
include 'DbConnect.php';
session_start();
$_SESSION['loginInfo']='';
$_SESSION['']='';
if($_SERVER['REQUEST_METHOD']=='POST'){
$username=  mysqli_real_escape_string($mysqli,$_POST['Username']);
$password=  mysqli_real_escape_string($mysqli,md5($_POST['Password']));/*
 * encrypting password before comparing it with the one in the database
 */
$query="select user_type from users where user_name='$username' and password='$password'";
$result= $mysqli->query($query);
if(!$row=$result->fetch_assoc()){
    $_SESSION['loginInfo']='Wrong Username or Password!';
}else {
    $user_type=$row['user_type'];
    if($user_type=='admin'){
        header("location:adminpage.php");
    }else{
          $_SESSION['loginInfo']='Welcome!';
   header("location:booking.php");
    }
  
}


}
?>
<!DOCTYPE html>


<html>
    <link rel="stylesheet" a href="usermodule.css">
    <head>
        <meta charset="UTF-8">
        <title>EUVBS</title>
    </head>
    <body id="body">
        <div class="loginpage">
            <form action="index.php" method="POST" autocomplete="off">
                <div id="title"><body><img src="images/egertonlogo.png" id="logo">Egerton University Vehicle Booking System(EUVBS): </br></br>Member Login</div>
                <input type="text" name="Username" placeholder="Username" size="30" required/><br><br></br>
                <input type="password" name="Password" placeholder="Password" size="30" required/><br><br></br>
            <input type="submit" value="Log in" name="login"/>
            </form></br>
            <div id="info" ><strong><?=$_SESSION['loginInfo']?></strong></div></br>
            <div id="register">Click here to <a href="SignUp.php">Register</a> an account</div></br>
            
        
        </div>
    </body>
</html>
