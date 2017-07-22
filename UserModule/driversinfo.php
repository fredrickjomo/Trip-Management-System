<?php
   include 'DbConnect.php';
        session_start();
        $_SESSION['message']='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['add_driver'])){
      $time=$_POST['availability']; 
       if(empty($time)){//checking whether an option has been chosen
       $_SESSION['message']='Choose availability' ;
 }
     else{
    

   
 $driver_id=$mysqli->real_escape_string($_POST['driver_id']);
 $driver_name=$mysqli->real_escape_string($_POST['driver_name']);
 $driver_contact=$mysqli->real_escape_string($_POST['driver_contact']);
 $availability=$mysqli->real_escape_string($_POST['availability']);

 $sql="insert into drivers(driver_id,driver_name,driver_contact,availability) values('$driver_id','$driver_name','$driver_contact','$availability')";
 
 if($mysqli->multi_query($sql)==true){
     $_SESSION['message']='Successfully added!';
 }else{
     $_SESSION['message']='Driver Not Added!';
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
    <head>
        <meta charset="UTF-8">
        <div class="vehicleheader"><img src="images/egertonlogo.png" width="100" height="100" id="vehicleheader">Driver Information and the related operations</div></br>
        <title></title>
    </head>
    <body id="body">
        
        
        
        
        
         <div class="table"><div id="add">Current Vehicles available</div><table border="1" width="700">
                <tr>
                    <th>Driver Id</th>
                    <th>Driver Name</th>
                    <th>Driver Contact</th>
                    <th>Availability</th>
                    <th><div class="delete">Remove</div></th>
                </tr>
       <?php
     
        $query="select *from drivers";
        $result= $mysqli->query($query);
       
       
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
           $driver_id=$row['driver_id'];
           $driver_name=$row['driver_name'];
           $driver_contact=$row['driver_contact'];
            $availability=$row['availability'];
            
            
            echo "<tr><div class='tableCols'>
                    <td>$driver_id</td>
                    <td>$driver_name</td>
                    <td>$driver_contact</td>
                    <td>$availability</td>
                   
                        </div>
                    <td><a href='delete.php? dele=$row[driver_id]' id=deleteButton>Delete</a></td>
                </tr>";
        }
            
        }
        
        
        ?>
             </table></div>
        <br><br><br>
        <div id="addvehicle">
            <div id="add">Register New Drivers</div></br>
        <form action="driversinfo.php" method="POST">
            <label for="driver_id" id="input">Driver Id:</label><input type="text" name="driver_id" value="" placeholder="Driver Id" /></br></br>
            <label for="driver_name" id="input">Driver Name:</label><input type="text" name="driver_name" value="" placeholder="Driver Name" /></br></br>
            <label for="driver_contact"id="input">Driver Contact:</label><input type="text" name="driver_contact" value="" placeholder="Driver Contact" /></br></br>
            <label for="availablity" id="input"> Availability:</label><select name="availability">
              <option value="">--Choose Availabity--</option>
        <option value="yes">Yes</option>
        <option value="no">No</option>
    </select></br></br>
            <input type="submit" value="Add Driver" name="add_driver" id="addV" /></br></br>
        <?=$_SESSION['message'];?>
        </form>
        </div>
        </body>
</html>
