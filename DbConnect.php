<?php
$mysqli=new mysqli('localhost','mogita','mogita','usermodule');
if(!$mysqli){
  die("Connection Failed:".mysql_error());
}