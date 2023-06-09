<?php 
include('../db/connection.php');

$sts = $_POST['sts'];
$id = $_POST['id'];

$open = "update jobs set jstatus=0 where job_id='$id'";
$close = "update jobs set jstatus=1 where job_id='$id'";
if($sts == 1){
    $conn->query($open);
 }else{
    $conn->query($close);
 }
 
?>