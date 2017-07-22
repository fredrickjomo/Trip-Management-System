<?php

include 'DbConnect.php';
session_start();
$_SESSION['admin']='';
if(isset($_GET['del'])){
    $id=$_GET['del'];
    $query="delete from vehicles where vehicle_id='$id'";
    if($mysqli->multi_query($query)){
        echo 'delete successful';
        header("location:vehicleInfo.php");
    }else{
        echo 'delete unsuccessful';
    }
}
else if(isset ($_GET['dele'])){
    $driver_id=$_GET['dele'];
     $query1="delete from drivers where driver_id='$driver_id'";
     if($mysqli->multi_query($query1)){
        echo 'delete successful';
        header("location:driversinfo.php");
    }else{
        echo 'delete unsuccessful';
    }
}else if(isset ($_GET['delete'])){
    $user=$_GET['delete'];
    $que="delete from users where user_name='$user'";
     if($user=='admin') {
     $_SESSION['admin']='Administrator account cannot be deleted!'; 
     header("location:users.php");
         }
    else if($mysqli->multi_query($que)){
         echo 'delete successful';
         header("location:users.php");

    }else{
       echo 'delete unsuccessful'; 
    }
    
}
?> 
