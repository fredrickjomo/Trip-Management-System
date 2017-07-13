<?php
include 'DbConnect.php';
session_start();
$_SESSION['message']='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['AddVehicle'])){
      $time=$_POST['vehicle_type']; 
      $avail=$_POST['availability'];
       if(empty($time)){//checking whether an option has been chosen
       $_SESSION['message']='Choose Vehicle Type' ;
 }
 else if(empty($avail)){
      $_SESSION['message']='Choose Availabilty';
 }
     else{
    

   
 $vehicle_type=$mysqli->real_escape_string($_POST['vehicle_type']);
 $number_plate=$mysqli->real_escape_string($_POST['number_plate']);
 $driver_id=$mysqli->real_escape_string($_POST['driver_id']);
 $capacity=$mysqli->real_escape_string($_POST['capacity']);
 $availability=$mysqli->real_escape_string($_POST['availability']);

 $sql="insert into vehicles(vehicle_type,number_plate,driver_id,capacity,availability) values('$vehicle_type','$number_plate','$driver_id','$capacity','$availability')";
 
 if($mysqli->multi_query($sql)==true){
     $_SESSION['message']='Successfully added!';
 }else{
     $_SESSION['message']='New Vehicle Not Added!';
 }
 }
    
    }

    
}


?>



<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <link rel="stylesheet" href="usermodule.css">
    <div id="logout"><form action="AdminLogout.php" method="POST"><input type="submit" value="Log Out" name="logout"/>
            </form></div>
    <head><div class="vehicleheader"><img src="images/egertonlogo.png" width="100" height="100" id="vehicleheader">Vehicle Information and the related operations</div>
        <meta charset="UTF-8">
        <title>Vehicle Information</title></br>
    </head></br></br>
    <body id="body">
        <div class="table"><div id="add">Current Vehicles available</div><table border="1" width="700">
                <tr>
                    <th>Vehicle Id</th>
                    <th>Vehicle Type</th>
                    <th>Number Plate</th>
                    <th>Driver Id</th>
                    <th>Capacity</th>
                    <th>Availability</th>
                    <th><div class="delete">Remove</div></th>
                </tr>
       <?php
        
        $query="select *from vehicles";
        $result= $mysqli->query($query);
       
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
           $vehicle_id=$row['vehicle_id'];
            $vehicle_type=$row['vehicle_type'];
           $number_plate=$row['number_plate'];
           $driver_id=$row['driver_id'];
           $capacity=$row['capacity'];
            $availability=$row['availability'];
            
            
            echo "<tr><div class='tableCols'>
                    <td>$vehicle_id</td>
                    <td>$vehicle_type</td>
                    <td>$number_plate</td>
                    <td>$driver_id</td>
                    <td>$capacity</td>
                    <td>$availability</td>
                        </div>
             
                    <td><a href='delete.php? del=$row[vehicle_id]' id=deleteButton>Delete</a></td>
                </tr>";
        }
            
        }
        
        
        ?>
              
                
            
        </table>
        </div>
<div id="addvehicle">
    
    <div id="add">Register New Vehicle</div>
    <form action="vehicleInfo.php" method="POST">
    <label for="vehicle_type" id="input">Vehicle Type</label> <select name="vehicle_type">
        <option value="">--Choose Vehicle Type--</option>
        <option value="bus">Bus</option>
        <option value="mini-bus">Mini-Bus</option>
    </select></br></br>
    <label for="vehicle" id="input"> Number Plate:</label><input type="text" name="number_plate" value="" placeholder="Number Plate" required/></br></br>
    <label for="driver_id" id="input">Driver Id:  </label><input type="text" name="driver_id" value="" placeholder="Driver Id" required /></br></br>
    <label for="capacity"id="input">Capacity:</label><input type="text" name="capacity" value="" placeholder="Capacity" /></br></br>
    <label for="availablity" id="input"> Availability:</label><select name="availability">
        <option value="">--Choose Availabity--</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select></br></br>
    <script>
            function ConfirmSubmit(){
                var vehicle=confirm("Add new Vehice?");
                if(vehicle)
                    return true;
                else
                    return false;
    }  </script>
    <input type="submit" value="Add Vehicle" name="AddVehicle" id="addV" onclick="return ConfirmSubmit();"/>
    </br>
    <div class="alert"><?=$_SESSION['message'];?></div>
    </form>
</div>
        
    </body>
</html>
