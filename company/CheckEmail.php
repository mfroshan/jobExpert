<?php 
include('../db/connection.php');

$email = $_POST['email'];
$old =  $_POST['oldusername'];

$sql = "select username from login where username='$email'";
$ret = $conn->query($sql);
$result = $ret->fetch_assoc();
$cnt = $ret->num_rows;
$username = $result['username'];
if( $cnt > 0){
    if($username == $old){
        echo 1;
    }else{
        echo -1;
    }
 }else{
    echo 0;
 }
 
?>