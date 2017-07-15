<?php
include 'DbConnect.php';
session_start();
$_SESSION['message']='';
if($_SERVER['REQUEST_METHOD']=='POST'){
if(isset($_POST['perform'])){
    $task=$_POST['Tasks'];
    if(empty($task)){//checking whether an option has been chosen
       $_SESSION['message']='No Operation Chosen' ;
    }else{
                switch ($task) {
            case "vehicle":
                header("location:vehicleInfo.php");
                break;
            case "drivers":
                header("location:driversInfo.php");
                break;
            case "assignment":
                header("location:DriverAssign.php");
                break;
            case "maintenance":
                header("location:maintenance.php");
                break;
            case "bookings":
                header("location:confirmBooking.php");
                break;
            case "users":
                header("location:users.php");
                break;

            default:
                $_SESSION['message']='Invalid Choice Made';
                break;
        }
    }
    
}
}






?>
<!DOCTYPE html>
<html>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="usermodule.css" type="text/css">
    <title>Administrator page</title>
    <head><div class="head">Welcome<??> Administrator<div id="logout"><form action="AdminLogout.php" method="POST"><input type="submit" value="Log Out" name="logout"/>
            </form></div></div></head>
<body id="body">
    </br></br></br>
    <div id="bookings">
    <table border="1" align="center">
            
                <tr>
                    <th>Item</th>
                    <th>Totals</th>
                </tr>
            
            
                <tr>
                    <td>Bookings</td>
                    <td><div id="totals"><?php
     $sql="select count('bookings_id') from bookings";
        $result=$mysqli->query($sql);
        $row=  mysqli_fetch_array($result);
        echo "$row[0]";
                
        ?></div></td>
                </tr>
                <tr>
                    <td>Vehicles</td>
                    <td><div id="totals"><?php
         $sql="select count('vehicle_id') from vehicles";
        $result=$mysqli->query($sql);
        $row=  mysqli_fetch_array($result);
        echo "$row[0]";
                
        ?></div></td>
                </tr>
                <tr>
                    <td>Drivers</td>
                    <td><div id="totals"><?php
         $sql="select count('driver_id') from drivers";
        $result=$mysqli->query($sql);
        $row=  mysqli_fetch_array($result);
        echo "$row[0]";
                
        ?></div></td>
                </tr>
                <tr>
                    <td>Users</td>
                    <td><div id="totals"><?php 
        $sql="select count('user_id') from users";
        $result=$mysqli->query($sql);
        $row=  mysqli_fetch_array($result);
        echo "$row[0]";
        ?></div></td>
                </tr>
            
        </table><br><br>
    </div>
    <div class="tasks"> <form action="adminpage.php" method="POST">
            </br>  
            Select an Operation to Perform:
            <select name="Tasks" >
                <option value="">--Select an Operation---</option>
                <option value="vehicle">Add and Remove vehicles</option>
                <option value="drivers">Add and Remove Drivers</option>
                <option value="assignment">Assign Drivers to vehicles</option>
                <option value="maintenance">Mark vehicle(s) for maintenance</option>
                <option value="bookings">Confirm Bookings</option>
                <option value="users">Remove Users</option>
            </select>
            <input type="submit" value="Go" name="perform" id="submit" />
            </br>
            <span id="message">  <?=$_SESSION['message']?></span>
    </div>

</body>  
</html>

