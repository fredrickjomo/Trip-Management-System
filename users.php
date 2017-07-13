<?php
include 'DbConnect.php';
session_start();



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
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body id="body">
       <div class="table"><div id="add">Users within the system</div><table border="1" width="700">
                <tr>
                    <th>User Name</th>
                    <th>User Contact</th>
                    <th><div class="delete">Remove</div></th>
                </tr>
       <?php
     
        $query="select *from users";
        $result= $mysqli->query($query);
       
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc()) {
           $username=$row['user_name'];
           $user_contact=$row['user_contact'];
            echo "<tr><div class='tableCols'>
                    <td>$username</td>
                    <td>$user_contact</td>
                        </div>
                    <td><a href='delete.php? delete=$row[user_name]' id=deleteButton>Delete User</a></td>
                </tr>";
        }
            
        }
        
        
        ?>
             </table></div>
        </br></br>
        <div class="alert"><?=$_SESSION['admin'];?></div>
    </body>
</html>
