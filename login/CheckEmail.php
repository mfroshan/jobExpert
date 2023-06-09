<?php 
include('../db/connection.php');

$email = $_POST['email'];

$sql = "select * from login where username='$email'";
$ret = $conn->query($sql);

if(($ret->num_rows) > 0){
    echo 1;
 }else{
    echo 0;
 }
 
?>