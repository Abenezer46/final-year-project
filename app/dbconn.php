<?php
 $sName = 'localhost';
 $uName = 'root';
 $pass = '';
 $db_name = 'financial managment system';

$con = new mysqli($sName,$uName, $pass, $db_name);

if(!$con){
   die(mysqli_error($con));
}
?>