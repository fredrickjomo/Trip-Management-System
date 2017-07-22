<?php
include 'DbConnect.php';

session_start();
/*$time=  strtotime($_POST['fromDate']);
if($time!=FALSE){
    $new_date=  date('y-m-d',$time);
    echo $new_date;
   
    
}  else {
    echo 'invalid date:'.$_POST['fromDate'];    
} */
if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['drivers'])){
            $drivers=$_POST['drivers'];
            if(empty($drivers)){
                echo "Nothing To Process";
            }else{
       $driver_name=$mysqli->real_escape_string($_POST['drivers']);
       $vehicle_number=$mysqli->real_escape_string($_POST['vehicles']);
       
        
        $sql="update drivers set availability='no' where driver_name='$driver_name'";
        if($mysqli->multi_query($sql)){
            header("location:DriverAssign.php");
        }
 else {
            echo 'could not assign driver';
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
<html><link rel="stylesheet" href="usermodule.css">
    <div id="logout"><form action="AdminLogout.php" method="POST"><input type="submit" value="Log Out" name="logout"/>
            </form></div>
    <head>
        <meta charset="UTF-8"><div class="vehicleheader"><img src="images/egertonlogo.png" width="100" height="100" id="vehicleheader">Assignment of Drivers to Vehicles</div></br>
        <title></title>
    </head>
    <body id="body"><br><br>
        <table border="1" align="left" width="500">
            <thead>
                <tr>
                    <th>Driver Name</th>
                    <th>Assignment Status</th>
                    <th>Vehicle</th>
                </tr>
            </thead>
            <tbody>
               <?php
                $assignment='';
        $query="select * from drivers";
        $result= $mysqli->query($query);
         if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
           $driver_name=$row['driver_name'];
           $avail=$row['availability'];
           if($avail=='yes'){
               $assignment='Unassigned';
           }
           elseif ($avail=='no') {
            $assignment='Assigned';
       }else{
            $assignment='Undefined';
       }
            
               echo "<tr>
                    <td>$driver_name</td>
                    <td>$assignment</td>
                    <td></td>
                </tr>";
            }
         }
               ?> 
            </tbody>
        </table>
<br><br>
<div id="assign"><div id="add">Assign Drivers:</div></br><?php
//retrieving driver names within the database  for assignment
    echo '<form action="DriverAssign.php" method="POST">';
$sql="select driver_name from drivers";
$result=$mysqli->query($sql);
echo "<div id='label'><label for='drivers'>Driver:</label></div><select name='drivers'>";
echo "<option value=''>---Select Driver---</option>";
while ($row = $result->fetch_assoc()) {
    $driver_name=$row['driver_name'];
    echo "<option value='.$row[driver_id]'>".$driver_name."</option>";
}
echo "</select>";
echo "<br>";

//retrieving vehicle number_plates within the database for driver assignment
   $sql="select number_plate from vehicles";
$result=$mysqli->query($sql);
echo "<div id='label'><label for='drivers'>Vehicle:</label></div><select name='vehicles'></br>";
echo "<option value=''>---Select Vehicle---</option>";
while ($row = $result->fetch_assoc()) {
    $number_plate=$row['number_plate'];
    echo "<option value='.$row[vehicle_id]'>".$number_plate."</option>";//display number plates
}
echo "</select></br>";
echo '<div id="label"><label for="fromDate">From Date:</label><input type="date" name="fromDate" value="echo date("y-m-d")"/>';
echo '<br>';
echo '<div id="label"><label for="toDate">To Date:</label></><input type="date" name="toDate" value="echo date("y-m-d")"/>';
echo '<br>';
echo '<input type="submit" value="Assign" name="assign" />';
echo '</form>';
    ?>     
</div>
    </body>
</html>
