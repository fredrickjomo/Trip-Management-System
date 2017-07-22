<?php
session_start();
include 'DbConnect.php';

$_SESSION['message']='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['password']==($_POST['confirmP'])){
      $Username=$mysqli->real_escape_string($_POST['username']);
      $Contacts=$mysqli->real_escape_string($_POST['contact']);
      $Password=$mysqli->real_escape_string (md5($_POST['password']));
      $user_type='normal user';
      $query2="select *from users where user_name='$Username'";
      
          
      
      $sql="insert into users(user_name,user_contact,user_type,password) values('$Username','$Contacts','$user_type','$Password')";
    if($mysqli->multi_query($sql)==true){
        $_SESSION['message']='Registration Successful! <a href="index.php">Log in</a> with your credentials';
    }else if($mysqli->multi_query($query2)>0){
        $_SESSION['message']='Username Already Exists!';
      
    }
    }else{
        $_SESSION['message']='Two passwords do not match!';
}
}
?>
<html>
    <link rel="stylesheet" href="usermodule.css">
    <body id="body">
        <form action="SignUp.php" method="POST">
            
            <div class="signup">
             Registration</br>
        <input type="text" name="username" placeholder="Username" required /><br></br>
        <input type="text" name="contact" placeholder="Phone Number" required/><br></br>
        <input type="password" name="password" placeholder="Password" required /><br></br>
        <input type="password" name="confirmP" placeholder="Confirm Password" required /><br></br>
        <script>
            function ConfirmSubmit(){
                var x=confirm("Are you sure you want to submit your data");
                if(x)
                    return true;
                else
                    return false;
    }  </script>
        <input type="submit" name="register" value="SUBMIT" onclick="return ConfirmSubmit();"/><br></br>
                  
              </form></br></br>
           <div class="alert"><?=$_SESSION['message']?></div>
            </div>
        
    </body>  
    
</html>





