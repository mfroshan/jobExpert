<?php 
include('../db/connection.php');

$email = $_POST['email'];

$sql = "select * from login where username='$email'";
$ret = $conn->query($sql);
$result = $ret->fetch_assoc();
if(($ret->num_rows) > 0){
    if($result['username']!=$email){
      echo 1;
      echo $email;
    }else{
      echo -1;
    }
 }else{
    echo 0;
 }
 
?>